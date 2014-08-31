<?php

/**
 * 模型字段管理
 * Class FieldController
 * @author 后盾向军 <houdunwangxj@gmail.com>
 */
class FieldController extends AuthController
{
    //模型mid
    private $mid;
    //模型缓存
    private $model;
    //字段缓存
    private $field;
    //模型
    private $db;

    //构造函数
    public function __init()
    {
        //模型mid
        $this->mid = Q("mid", 0, "intval");
        //验证模型mid
        if (!$this->mid) {
            $this->error("模型不存在！");
        }
        $this->model = S("model");
        $this->field = S('field' . $this->mid);
        $this->db = K('Field');
    }

    //字段列表
    public function index()
    {
        //不允许删除字段
        $this->assign('noallowdelete', FieldModel::$NoAllowDelete);
        //不允许禁用字段
        $this->assign('noallowforbidden', FieldModel::$NoAllowForbidden);
        //分配当前模型的字段数据
        $this->assign('field', M('field')->where(array('mid'=>array('IN',array($this->mid))))->order('fieldsort ASC')->all());
        $this->display();
    }

    //更新字段排序
    public function updateSort()
    {
        $orders = Q("fieldsort");
        foreach ($orders as $k => $v) {
            $this->db->save(array("fid" => $k, "fieldsort" => $v));
        }
        $this->db->updateCache();
        $this->success("排序成功");
    }

    //添加字段
    public function add()
    {
        if (IS_POST) {
            if ($this->db->addField()) {
                $this->success('添加字段成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $this->assign('model', $this->model[$this->mid]);
            $this->display();
        }
    }

    //修改字段
    public function edit()
    {

        if (IS_POST) {
            if ($this->db->editField()) {
                $this->success('修改成功');
            } else {
                $this->error($this->db->error);
            }
        } else {
            $fid = Q('fid', 0, 'intval');
            $field_name = M('field')->where("fid=$fid")->getField('field_name');
            $field = $this->field[$field_name];
//            p($this->field);exit;
            $this->assign('field', $field);
            $this->assign('model_name', $this->model[$this->mid]['model_name']);
            $this->display();
        }
    }

    //验证字段是否已经存在
    public function fieldIsExists()
    {
        $field_name = Q('field_name');
        $table = $this->model[Q('mid')]['table_name'];
        $state = M()->fieldExists($field_name, $table) ? 0 : 1;
        if ($state) {
            $state = M()->fieldExists($field_name, $table . '_data') ? 0 : 1;
        }
        $this->ajax($state);
    }

    //选择字段类型模板
    public function getFieldTpl()
    {
        //模板类型如add edit
        $tpl_type = Q("post.tpl_type");
        //字段类型如input textarea
        $field_type = Q("post.field_type");
        $this->assign('field_type', $field_type);
        ob_start();
        require CONTROLLER_VIEW_PATH . "field/{$field_type}/form_{$tpl_type}.inc.php";
        echo ob_get_clean();
        exit;
    }

    /**
     * 删除字段
     */
    public function del()
    {
        $fid = Q('fid');
        if ($fid) {
            if ($this->db->delField())
                $this->success('字段删除成功');
        } else {
            $this->error($this->_db->error);
        }
    }

    //更新字段缓存
    public function updateCache()
    {
        if ($this->db->updateCache()) {
            $this->success('更新成功');
        } else {
            $this->error($this->db->error);
        }
    }

    //禁用字段
    public function forbidden()
    {
        $status = Q('status', 0, 'intval');
        $fid = Q('fid', 0, 'intval');
        M('field')->save(array('fid' => $fid, 'status' => $status));
        $this->updateCache();
        $this->success('设置成功');
    }
}
