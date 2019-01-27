<?php
namespace app\admin\validate;
use think\Validate;
Class Article extends Validate
{
	protected $rule =[
		'title' =>'require|max:100|unique:article',
		'keywords' =>'require',
		'desc'=>'require',
		// 'pic'=>'require'
	];
	protected $message = [
		'title.require' => '标题不能为空',
		'title.max'=>'标题长度不能超过100位',
		'title.unique' =>'标题不能重复',
		'keywords' =>'关键词不能为空',
		'desc'=>'内容不能为空',
		// 'pic'=>'请选择要上传的图片'
	];
}