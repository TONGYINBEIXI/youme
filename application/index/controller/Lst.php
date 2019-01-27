<?php
namespace app\index\controller;
use\think\Controller;
class Lst extends Controller
{
    public function index()
    {
    	$this->assign([
    		'name'=>'mingchuan',
    		'lst'=>'大生活']);
        return $this->fetch('lst');
    }
}
