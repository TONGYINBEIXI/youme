<?php
/**
 * Created by PhpStorm.
 * User: 痛瘾悲喜
 * Date: 2017/12/4
 * Time: 22:08
 */
namespace app\admin\controller;
use think\Controller;
class Index extends Controller{
    public function index()
    {
    	$this->assign([
    		'name'=>'mingchuan',
    		'admin'=>'后台管理'			
    					]);
        return $this->fetch('index');
    }
}