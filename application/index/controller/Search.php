<?php
namespace app\index\controller;
use\think\Controller;
class Search extends Controller
{
	public function index()
	{
		$this->assign(['name'=>'mingchuan',
						'search'=>'觉悟-_-']);
		return $this->fetch('search');
	}
}