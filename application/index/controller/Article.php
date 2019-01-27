<?php
namespace app\index\controller;
use\think\Controller;
class Article extends Controller
{
	public function index()
	{
		
			   $this->assign('name','mingchuan内容');
		return $this->fetch('article');
	}
}