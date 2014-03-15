<?php
import('UploadModel','hd.Hdcms.Upload.Model');

/**
 * 文件上传
 * Class IndexControl
 * @author hdxj<houdunwangxj@gmail.com>
 */
class UploadControl extends Control
{
    //模型
    protected $_db;

    public function __init()
    {
        if (!session('uid'))
            _404('非法请求');
        $this->_db = K("Upload");
    }

    //显示文件列表
    public function index()
    {
        //上传目录
        $dir = "./upload/" . Q("get.dir", "content") . "/" . date("Y") . '/' . date("m") . '/' . date("d") . '/';
        //上传数量
        $limit = Q("get.num", 1, "intval");
        //上传标签
        $upload = tag("upload",
            array(
                "name" => "hdcms",
                "dir" => $dir,
                "limit" => $limit,
                "width" => 88,
                "height" => 78)
        );
        $get = '';
        foreach ($_GET as $name => $v) {
            $get .= "var $name='$v';\n";
        }
        $this->get = $get;
        $this->upload = $upload;
        $this->display();
    }

    /**
     * Ueditor 编辑器图片上传处理方法
     */
    public function ueditor_upload()
    {
        //上传图片储存目录
        $imgSavePathConfig = array(C('EDITOR_SAVE_PATH'));
        //获取存储目录
        if (isset($_GET['fetch'])) {
            header('Content-Type: text/javascript');
            echo 'updateSavePath(' . json_encode($imgSavePathConfig) . ');';
            exit;
        }
        $upload = new Upload(C('EDITOR_SAVE_PATH'));
        $title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
        $file = $upload->upload();
        if (!$file) {
            echo "{'title':'" . $upload->error . "','state':'" . $upload->error . "'}";
        } else {
            $file = $file[0];
            $model = K("Upload");
            $model->insert_to_table($file);
            $file['url'] = __ROOT__ . '/' . $file['path'];
            $file["state"] = "SUCCESS";
            echo "{'url':'" . $file['url'] . "','title':'" . $title . "','original':'" . $file["filename"] . "','state':'" . $file["state"] . "'}";
        }
        exit;
    }

    /**
     * Uploadify上传文件处理
     */
    public function hd_uploadify()
    {
        $upload = new Upload(Q('post.upload_dir'), array(), array(), Q("water", null, "intval"));
        $file = $upload->upload();
        if (!empty($file)) {
            $file = $file[0];
            $data['stat'] = 1;
            $data['url'] = __ROOT__ . '/' . $file['path'];
            $data['path'] = $file['path'];
            $data['filename'] = $file['filename'];
            $data['basename'] = $file['basename'];
            $data['thumb'] = array();
            $data['isimage'] = $file['image'];
            //写入upload表
            $this->_db->insert_to_table($file);
        } else {
            $data['stat'] = 0;
            $data['msg'] = $upload->error;
        }
        echo json_encode($data);
        exit;
    }

    /**
     * 上传插件Ajax删除文件
     * 同时删除session中记录
     */
    public function hd_uploadify_del()
    {
        $file = array_filter(explode("@@", $_POST['file']));
        $this->_db->del_file($file);
        $this->ajax(1);
    }

    //站内图片
    public function site()
    {
        //只查找自己的图片
        $where = 'uid=' . $_SESSION['uid'];
        $count = $this->_db->where($where)->count();
        $page = new Page($count, 18, 8);
        $this->file = $this->_db->where($where)->limit($page->limit())->all();
        $this->page = $page->show();
        $this->display('pic_list');
    }

    //未使用的图片
    public function untreated()
    {
        //只查找自己的图片
        $where = 'uid=' . $_SESSION['uid'] . ' AND aid=0';
        $count = $this->_db->where($where)->count();
        $page = new Page($count, 18);
        $this->file = $this->_db->where($where)->limit($page->limit())->all();
        $this->page = $page->show();
        $this->display('pic_list');
    }

    //下载远程图片
    public function down_remote_pic($img)
    {
        //没有文件
        if (empty($img)) return $img;
        //已经是本服务器图片
        if (preg_match("@" . __ROOT__ . "@", $img)) return $img;
        error_reporting(E_ERROR | E_WARNING);
        //远程抓取图片配置
        $config = array(
            "savePath" => "upload/" . CONTROL . "/" . date("Y") . "/" . date("m") . "/" . date("d") . '/', //保存路径
            "allowFiles" => array(".gif", ".png", ".jpg", ".jpeg", ".bmp"), //文件允许格式
            "maxSize" => C("down_remote_pic"),
        );
        $uri = htmlspecialchars($img);
        $uri = str_replace("&amp;", "&", $uri);
        if ($data = $this->getRemoteImage($uri, $config)) {
            $data['image'] = 1;
            if ($id = $this->_db->insert_to_table($data)) {
                return __ROOT__ . '/' . $data['path'];
            } else {
                return $img;
            }
        } else {
            return $img;
        }
    }


    /**
     * 远程抓取
     * @param $imgUrl 图片url
     * @param $config 配置
     * @return bool
     */
    protected function getRemoteImage($imgUrl, $config)
    {
        C("SHOW_NOTICE", FALSE);
        {
            //http开头验证
            if (strpos($imgUrl, "http") !== 0) {
                array_push($tmpNames, "error");
                return false;
            }
            //获取请求头
            $heads = get_headers($imgUrl);
            //死链检测
            if (!(stristr($heads[0], "200") && stristr($heads[0], "OK"))) {
                array_push($tmpNames, "error");
                return false;
            }

            //格式验证(扩展名验证和Content-Type验证)
            $fileType = strtolower(strrchr($imgUrl, '.'));
            if (!in_array($fileType, $config['allowFiles']) || stristr($heads['Content-Type'], "image")) {
                array_push($tmpNames, "error");
                return false;
            }
            //打开输出缓冲区并获取远程图片
            ob_start();
            $context = stream_context_create(
                array(
                    'http' => array(
                        'follow_location' => false // don't follow redirects
                    )
                )
            );
            //请确保php.ini中的fopen wrappers已经激活
            readfile($imgUrl, false, $context);
            $img = ob_get_contents();
            ob_end_clean();
            //大小验证
            $uriSize = strlen($img); //得到图片大小
            $allowSize = 1024 * C("DOWN_REMOVE_PIC_SIZE"); //文件大小限制，单位KB
            if ($uriSize > $allowSize) {
                array_push($tmpNames, "error");
                return false;
            }
            //创建保存位置
            $savePath = $config['savePath'];
            if (!file_exists($savePath)) {
                Dir::create($savePath);
            }
            //写入文件
            $tmpName = $savePath . rand(1, 10000) . time() . strrchr($imgUrl, '.');
            try {
                $fp2 = @fopen($tmpName, "a");
                fwrite($fp2, $img);
                fclose($fp2);
                array_push($tmpNames, $tmpName);
                $info = pathinfo($tmpName);
                return array(
                    "size" => $uriSize,
                    "path" => $tmpName,
                    "basename" => $info['basename'],
                    'filename' => $info['filename'],
                    "ext" => substr(strrchr($imgUrl, '.'), 1),
                    "uptime" => time(),
                    "uid" => $_SESSION['uid']
                );
            } catch (Exception $e) {
                array_push($tmpNames, "error");
            }
            return false;
        }
    }
}























