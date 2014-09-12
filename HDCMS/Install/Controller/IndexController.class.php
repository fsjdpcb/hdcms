<?php

/**
 * HDCMS安装模块
 * Class IndexController
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class IndexController extends Controller
{
    //步骤
    private $step;

    //构造函数
    public function __init()
    {
        if (is_file(MODULE_PATH . 'Lock.php')) {
            $this->isLock();
        }
        //验证Temp目录
//        if (!is_writable(ROOT_PATH)) {
//            $this->checkTempDir();
//        }
        $this->step = Q('step', 1, 'intval');
    }

    //验证Temp目录
    public function checkTempDir()
    {
        header("Conent-type:text/html;charset=utf-8");
        echo '请修改 <strong>'.ROOT_PATH.'</strong>目录为可写权限';
        exit;
    }

    //安装锁定
    public function isLock()
    {
        $this->display();
        exit;
    }

    //欢迎页
    public function index()
    {
        $this->display();
    }

    //介绍
    public function introduce()
    {
        $this->display();
    }

    //版权
    public function copyright()
    {
        $this->display();
    }

    //环境检测
    public function environment()
    {
//        $this->allow_url_fopen = (ini_get('allow_url_fopen') ? '<span class="dir_success">On</span>' : '<span class="dir_success">Off</span>');
        $this->safe = (ini_get('safe_mode') ? '<span class="dir_error">Off</span>' : '<span class="dir_success fatal">On</span>');
        $this->gd = extension_loaded('GD') ? '<span class="dir_success">On</span>' : '<span class="dir_error fatal">Off</span>';
        $this->curl = extension_loaded('CURL') ? '<span class="dir_success">On</span>' : '<span class="dir_error ">Off</span>';
        $this->mysqli = function_exists("mysqli_connect") ? '<span class="dir_success">On</span>' : '<span class="dir_error fatal">Off</span>';
        $this->mb_substr = function_exists("mb_substr") ? '<span class="dir_success">On</span>' : '<span class="dir_error fatal">Off</span>';
        //检测目录
        $this->dirctory = array(
            ROOT_PATH, //网站根目录
            APP_COMMON_PATH . "Config", //配置目录
            APP_COMMON_PATH . "Config/config.inc.php", //数据库配置文件
            APP_COMMON_PATH . "Config/db.inc.php", //数据库配置文件
            APP_PATH . 'Install', //安装目录
        );
        $this->display();
    }

    //设置数据库
    public function database()
    {
        if (IS_POST) {
            //================================= 连接服务器 =================================
            if (!@mysql_connect($_POST['DB_HOST'], $_POST['DB_USER'], $_POST['DB_PASSWORD'])) {
                $this->error('无法连接数据库');
            }
            //数据库不存在时创建数据库
            if (!@mysql_query("CREATE DATABASE IF NOT EXISTS " . $_POST['DB_DATABASE'] . " CHARSET UTF8")) {
                $this->error('创建数据库失败');
            }
            //================================= 设置配置文件 =================================
            $config = <<<str
<?php if (!defined('HDPHP_PATH'))exit;
return array (
    'DB_DRIVER' => 'mysqli',
    'DB_HOST' => '{$_POST['DB_HOST']}',
    'DB_PORT' => 3306,
    'DB_USER' => '{$_POST['DB_USER']}',
    'DB_PASSWORD' => '{$_POST['DB_PASSWORD']}',
    'DB_DATABASE' => '{$_POST['DB_DATABASE']}',
    'DB_PREFIX' => '{$_POST['DB_PREFIX']}',
    'WEB_MASTER' => '{$_POST['ADMIN']}',
);
?>
str;
            if (!file_put_contents(APP_COMMON_PATH . 'Config/db.inc.php', $config)) {
                $this->error('创建配置文件失败');
            }
            //================================= 导入数据 =================================
            //加载数据库配置
            C(require APP_COMMON_PATH . 'Config/db.inc.php', $config);
            //导入数据
            $db_prefix = $_POST['DB_PREFIX'];
            $db = M();
            //创建结构
            require MODULE_PATH . "/Data/structure.php";
            foreach (glob(MODULE_PATH . "Data/*") as $f) {
                if (preg_match('@\d+.php@', $f)) {
                    require $f;
                }
            }
            //================================= 更新基本数据如网站名称===============================
            $db = M("config");
            $db->where(array('name' => array('EQ', 'WEBNAME')))->save(array('name' => $_POST['WEBNAME']));
            $db->where(array('name' => array('EQ', 'EMAIL')))->save(array('name' => $_POST['EMAIL']));
            //站长信息
            $db = M('user');
            $code = substr(md5(mt_rand() . time()), 0, 10);
            $data = array(
                'uid' => 1,
                'rid' => 1,
                'username' => $_POST['ADMIN'],
                'nickname' => $_POST['ADMIN'],
                'email' => $_POST['EMAIL'],
                'regtime' => time(),
                'code' => $code,
                'password' => md5($_POST['PASSWORD'] . $code)
            );
            if ($db->save($data)) {
                go(U('Complete'));
            }
        } else {
            $this->display();
        }
    }

    //安装完成
    public function Complete()
    {
        $this->display();
        touch(MODULE_PATH . 'Lock.php');
    }

}