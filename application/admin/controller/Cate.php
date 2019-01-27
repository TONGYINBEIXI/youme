<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Loader;
class Cate extends Controller
{
	/**
	 * lst 列表展示
	 * 
	 */
	public function lst()
	{
		$cateres=Db::name('cate')->select();
		$this->assign('cateres',$cateres);
		// $this->assign([
		// 	'name'=>'mingchuan',
		// 	'lst'=>'后台列表页',
		// 	'cateres'=>cateres]);
		return $this->fetch('lst');
	} 
	/**
	 * add 新增栏目 
	 */  
	public function add()
	{
		if(request()->isPost()){ 
			$data=[
				'catename'=>input('catename'),
				'keywords'=>input('keywords'), 
				'desc'=>input('desc'),
				'type'=>input('type')?input('type'):0,
				];
		$validate = Loader::validate('Cate');
		if($validate->check($data)){		
			$db=Db::name('cate')->insert($data);
			if($db){
				return $this->success('添加栏目成功!','lst');
			}else{
				return $this->error('添加栏目失败!');
			}
		}else{
			return $this->error($validate->getError());
		}
			return;
		}
		
		
		$this->assign(['name'=>'mingchuan','add'=>'添加页']);
		return $this->fetch('add');
	}
	/**
	 * edit 修改栏目
	 * 
	 */
	public function edit()
	{
		if(request()->isPost()){
			$data=[
				'id'=>input('id'),
				'catename'=>input('catename'),
				'keywords'=>input('keywords'),
				'desc'=>input('desc'),
				'type'=>input('type'),
			];
		$validate = Loader::validate('Cate');
			if($validate->check($data)){		
			if($db=Db::name('cate')->update($data)){
				return $this->success('修改栏目成功!','lst');
			}else{
				return $this->error('修改栏目失败!'); 
				}
			}else{
				return $this->error($validate->getError());
			}
			return;
		}
 
		$id=input('id');
		$cates=db('cate')->where('id',$id)->find();
		// print_r($cates);die;
		$this->assign('cates',$cates);
		return $this->fetch('edit');
	} 


	/**
	 * del 删除栏目
	 * 
	 */
	public function del()
	{
		$id=input('id');
		if(db('cate')->delete($id)){
			return $this->success('删除栏目成功!','lst');
		}else{
			return $this->error('删除栏目失败!','lst');
		}
	}

} 