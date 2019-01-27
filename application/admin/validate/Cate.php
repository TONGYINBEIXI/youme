<?php
namespace app\admin\validate;
use think\Validate;
Class Cate extends Validate
{
	protected $rule =[
		'catename' =>'require|max:25|unique:cate',
		'keywords' =>'require',
		'desc'=>'require',
	];
	protected $message = [
		'catename.require' => '栏目名称不能为空',
		'catename.max'=>'栏目名称长度不能超过25个文字',
		'catename.unique' =>'栏目名称不能重复',
		'keywords' =>'关键词不能为空',
		'desc'=>'内容不能为空',
	];
} 