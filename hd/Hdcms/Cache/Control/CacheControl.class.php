<?php
import('Field.Model.FieldModel');
import('Category.Model.CategoryModel');
import('Flag.Model.FlagModel');
import('Navigation.Model.NavigationModel');

/**
 * 缓存管理
 * Class CacheControl
 */
class CacheControl extends AuthControl
{


    /**
     * 更新全站所有缓存
     */
    public function update_all()
    {
        $this->_model();
        $this->_field();
        $this->_category();
        $this->_flag();
        $this->_navigation();
        $this->_ajax(1, '全站缓存更新成功');
    }

    /**
     * 更新模型缓存
     */
    private function _model()
    {
        import('Model.Model.ModelModel');
        return K('Model')->update_cache();
    }

    /**
     * 更新字段缓存
     */
    private function _field()
    {
        $model = cache('model');
        foreach ($model as $mid => $m) {
            $_REQUEST['mid'] = $mid;
            $db = K('Field');
            $db->update_cache();
        }
        return true;
    }

    /**
     * 更新栏目缓存
     */
    private function _category()
    {

        return K('Category')->update_cache();
    }

    /**
     * 更新内容属性缓存
     */
    private function _flag()
    {
        return K('Flag')->update_cache();
    }

    /**
     * 前台导航缓存
     * @return mixed
     */
    private function _navigation(){
        return K("Navigation")->update_cache();
    }
}