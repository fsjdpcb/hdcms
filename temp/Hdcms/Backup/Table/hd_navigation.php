<?php if(!defined('HDPHP_PATH'))exit;
return array (
  'nid' => 
  array (
    'field' => 'nid',
    'type' => 'mediumint(8) unsigned',
    'null' => 'NO',
    'key' => true,
    'default' => NULL,
    'extra' => 'auto_increment',
  ),
  'title' => 
  array (
    'field' => 'title',
    'type' => 'char(30)',
    'null' => 'NO',
    'key' => false,
    'default' => '菜单名称',
    'extra' => '',
  ),
  'pid' => 
  array (
    'field' => 'pid',
    'type' => 'mediumint(8) unsigned',
    'null' => 'NO',
    'key' => false,
    'default' => '0',
    'extra' => '',
  ),
  'target' => 
  array (
    'field' => 'target',
    'type' => 'enum(\'_self\',\'_blank\')',
    'null' => 'NO',
    'key' => false,
    'default' => '_self',
    'extra' => '',
  ),
  'state' => 
  array (
    'field' => 'state',
    'type' => 'tinyint(1)',
    'null' => 'NO',
    'key' => false,
    'default' => '1',
    'extra' => '',
  ),
  'list_order' => 
  array (
    'field' => 'list_order',
    'type' => 'mediumint(100)',
    'null' => 'NO',
    'key' => false,
    'default' => '100',
    'extra' => '',
  ),
  'link' => 
  array (
    'field' => 'link',
    'type' => 'varchar(255)',
    'null' => 'NO',
    'key' => false,
    'default' => '',
    'extra' => '',
  ),
);
?>