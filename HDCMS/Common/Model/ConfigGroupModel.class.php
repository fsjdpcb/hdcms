<?php

/**
 * 配置组管理模型
 * Class ConfigGroupModel
 * @author 后盾向军 <2300071698@qq.com>
 */
class ConfigGroupModel extends Model
{
    public $table = 'config_group';//表

    public function __init()
    {

    }

    //自动验证
    public $validate = array(
        array('cgname', 'nonull', '组名不能为空', 2, 3),
        array('cgtitle', 'nonull', '组标题不能为空', 2, 3)
    );

    /**
     * 获取组列表
     * @param int $ishsow 组类型（1显示，0不显示)
     * @return mixed
     */
    public function getGroup($ishsow = 0)
    {
        return $this->where(array('isshow' => $ishsow))->all();
    }

    /**
     * 添加配置组
     */
    public function addConfigGroup()
    {
        if ($this->create()) {
            if ($this->add()) {
                return true;
            } else {
                $this->error = '添加失败';
            }
        }
    }

    /**
     * 修改配置组
     */
    public function editConfigGroup()
    {
        if ($this->create()) {
            if ($this->save()) {
                return true;
            } else {
                $this->error = '添加失败';
            }
        }
    }

    //删除配置组
    public function delConfigGroup()
    {
        $cgid = Q('cgid', 0, 'intval');
        $map['cgid'] = array('EQ', $cgid);
        if ($this->where($map)->del()) {
            //删除配置项
            M('config')->where("cgid=$cgid")->del();
            return true;
        } else {
            $this->error('删除失败，配置组不存在');
        }
    }

    //获取配置组
    public function getCgName()
    {
        $cgid = Q('cgid', 0, 'intval');
        if ($group = $this->find($cgid)) {
            return $group;
        } else {
            $this->error = '配置组不存在';
        }
    }
}