<?php
namespace app\index\controller;
use\think\Controller;
class Tags extends Controller
{
	public function index()
	{
		$this->assign(['name'=>'mingchuan','tags'=>'大生活tags']);
		return $this->fetch('tags');
	}
}