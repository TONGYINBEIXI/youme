<?php
namespace app\index\controller;
use\think\Controller;
class Index extends Controller
{
    public function index()
    {
    	$this->assign('name','mingchuan首页');
        return $this->fetch();
    }
}
