<?php

/**
 * 缓存管理
 * Class CacheControl
 */
class CacheControl extends AuthControl
{

    //构造函数
    public function __init()
    {
        parent::__init();

    }

    /**
     * 更新所有缓存
     */
    public function update_all()
    {
        $this->_model();
        $this->_field();
        $this->_category();
        $this->_Field();
        //删除编译文件
        Dir::del(TEMP_PATH);
        $this->ajax(array('state' => 1, 'message' => '全站缓存更新成功'));
    }

    /**
     * 更新模型缓存
     */
    private function _model()
    {
        import('Model.Model.ModelModel');
        $db = K('Model');
        return $db->update_cache();
    }

    /**
     * 更新字段缓存
     */
    private function _Field()
    {
        $model = F('model');
        foreach ($model as $mid => $m) {
            $_REQUEST['mid'] = $mid;
            import('Field.Model.FieldModel');
            $db = K('Field');
            $db->update_cache();
        }
        return true;
    }

    /**
     * 更新栏目缓存
     */
    private function _Category()
    {
        import('Category.Model.CategoryModel');
        $db = K('Category');
        return $db->update_cache();
    }

    /**
     * 更新内容属性缓存
     */
    private function _Flag()
    {
        import('Flag.Model.FlagModel');
        $db = K('Flag');
        return $db->update_cache();
    }
}