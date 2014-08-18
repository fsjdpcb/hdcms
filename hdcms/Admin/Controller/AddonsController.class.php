<?php

/**
 * 插件管理
 * Class Addon
 * @author hdxj <houdunwangxj@gmail.com>
 */
class AddonsController extends AuthController
{
    private $db;

    //构造函数
    public function __init()
    {
        $this->db = K('Addons');
    }

    //插件列表
    public function index()
    {
        $this->assign('data', $this->db->getAddonList());
        $this->display();
    }

    //禁用插件
    public function disabled()
    {
        if ($this->db->disabledAddon()) {
            $this->success('禁用成功','index');
        } else {
            $this->error($this->db->error);
        }
    }
    //启用插件
    public function enabled()
    {
        if ($this->db->enabledAddon()) {
            $this->success('启用成功','index');
        } else {
            $this->error($this->db->error);
        }
    }
    //创建插件
    public function add()
    {
        if (IS_POST) {
            $data = $_POST;
            $data['has_adminlist'] = isset($_POST['has_adminlist']) ? 1 : 0; //有后台
            $data['has_outurl'] = isset($_POST['has_outurl']) ? 1 : 0; //前台访问
            $data['config'] = isset($_POST['config']) ? 1 : 0; //有配置文件
            //-------------------检查必要信息
            $this->db->validate = array(
                array('name', 'nonull', '插件标识不能为空！', 2, 3),
                array('name', 'regexp:/^[a-zA-Z][a-zA-Z0-9_]+$/i', '插件标识只支持英文、数字', 2, 3),
                array('name', 'addonUniqueCheck', '该插件已经存在！', 2, 3),
                array('title', 'nonull', '插件名称不能为空！', 2, 3),
                array('version', 'nonull', '插件版本不能为空！', 2, 3),
                array('author', 'nonull', '插件作者不能为空！', 2, 3),
                array('description', 'nonull', '插件描述不能为空！', 2, 3),
            );
            if (!$this->db->validate($data)) {
                $this->error($this->db->error);
            }
            $data['name'] = ucfirst($data['name']);
            $addonDir = APP_ADDON_PATH . $data['name'] . '/'; //插件目录
            //验证安装目录
            if (!is_writable(APP_ADDON_PATH)) {
                $this->error(APP_ADDON_PATH . ' 不可写');
            }
            is_dir($addonDir) or dir::create($addonDir); //创建插件目录
            //-------------------创建配置文件
            if ($data['config']) {
                copy(HDPHP_PATH . 'Lib/Tpl/configAddon.php', $addonDir . 'config.php');
            }
            //-----------------控制器
            if ($data['has_adminlist'] || $data['has_outurl']) //创建控制器目录
                is_dir($addonDir . 'Controller') or Dir::create($addonDir . 'Controller');
            if ($data['has_adminlist']) {
                $controller = <<<str
<?php
/**
 * {$data['name']} 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */

class AdminController extends AddonController {

    public function index() {
        \$this->display();
    }
}
str;
                file_put_contents($addonDir . 'Controller/AdminController.class.php', $controller);
            }
            //创建前台访问控制器
            if ($data['has_outurl']) {
                $controller = <<<str
<?php
/**
 * {$data['name']} 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */

class IndexController extends AddonController {

    public function index() {
        \$this->display();
    }
}
str;
                file_put_contents($addonDir . 'Controller/IndexController.class.php', $controller);
            }
            $addonData = <<<str
<?php
/**
 * {$data['name']} 插件
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class {$data['name']}Addon extends Addon
{

    //插件信息
    public \$info = array(
        'name' => '{$data['name']}',
        'title' => '{$data['title']}',
        'description' => '{$data['description']}',
        'status' => 1,
        'author' => '{$data['author']}',
        'version' => '{$data['version']}',
        'has_adminlist' => {$data['has_adminlist']},
    );

    //安装
    public function install()
    {
        return true;
    }

    //卸载
    public function uninstall()
    {
        return true;
    }
str;
            if (isset($data['hooks'])) {
                foreach ($data['hooks'] as $hook) {
                    $addonData .= "
    //实现的{$hook}钩子方法
    public function {$hook}(\$param){
    }\n";
                }
            }
            $addonData .= '}';
            file_put_contents($addonDir . $data['name'] . 'Addon.class.php', $addonData);
            //创建View视图文件
            if ($data['has_adminlist']) {
                Dir::create($addonDir . 'View/Admin');
                copy(MODULE_PATH . 'Data/View/addonAdmin.php', $addonDir . 'View/Admin/index.php');
            }
            if ($data['has_outurl']) {
                Dir::create($addonDir . 'View/Index');
                copy(MODULE_PATH . 'Data/View/addonIndex.php', $addonDir . 'View/Index/index.php');
            }
            $this->success('创建成功', 'index');
        } else {
            $this->assign('hooks', K('Hooks')->all());
            $this->display();
        }
    }

    //安装插件
    public function install()
    {
        if ($this->db->installAddon()) {
            $this->success('安装成功', 'index');
        } else {
            $this->error($this->db->error);
        }
    }

    //卸载插件
    public function uninstall()
    {
        if ($this->db->uninstallAddon()) {
            $this->success('卸载成功', 'index');
        } else {
            $this->error($this->db->error);
        }
    }
}