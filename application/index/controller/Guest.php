<?php
namespace app\index\controller;
use\think\Controller;
class Guest extends Controller
{
	public function index()
	{
			   $this->assign('name','mingchuan留言板');
		return $this->fetch('guest');
	}
}