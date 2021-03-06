<?php
return array(
	'tableName' => 'wwh_authority',    // 表名
	'tableCnName' => '权限',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 1,             // 是否无限级（递归）
	'diguiName' => 'auth_name',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'auth_id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('auth_name','module','controller','action','parent_id')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('auth_id','auth_name','module','controller','action','parent_id')",
	'validate' => "
		array('auth_name', 'require', '权限名称 不能为空！', 1, 'regex', 3),
		array('auth_name', '1,30', '权限名称 的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('module', '1,30', '模块的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('controller', '1,30', '控制器的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('action', '1,30', '操作方法的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('parent_id', 'number', '父级id必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'auth_name' => array(
			'text' => '权限名称 ',
			'type' => 'text',
			'default' => '',
		),
		'module' => array(
			'text' => '模块',
			'type' => 'text',
			'default' => '',
		),
		'controller' => array(
			'text' => '控制器',
			'type' => 'text',
			'default' => '',
		),
		'action' => array(
			'text' => '操作方法',
			'type' => 'text',
			'default' => '',
		),
		'parent_id' => array(
			'text' => '父级id',
			'type' => 'text',
			'default' => '0',
		),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(

	),
);