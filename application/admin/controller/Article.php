<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Loader;

Class Article extends Controller
{
    /**
     * 文章列表展示
     * @return [type] [description]
     */
    public function lst()
    {

        $artres = Db::name('article')->alias('a')->join('cate c', 'c.id = a.cateid', 'LEFT')->field('a.*,c.catename,c.keywords,c.desc,c.type')->order("time desc")->paginate(6);
        $this->assign('artres', $artres);
        return $this->fetch('lst');
    }

    /**
     * 新增文章
     */
    public function add()
    {
        if (request()->isPost()) {
            $data = [
                'title' => input('title'),
                'keywords' => input('keywords'),
                'desc' => input('desc'),
                'cateid' => input('cateid'),
                'content' => input('content'),
                'time' => time(),
            ];
            //$_FILES检查图片是否上传
            if ($_FILES['pic']['tmp_name']) {
                //获取表单上传文件
                // 获取表单上传文件
                $file = request()->file('pic');

                // 移动到框架应用根目录/public/uploads/ 目录下
                if ($file) {
                    $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                    if ($info) {
                        // 成功上传后 获取上传信息
                        $data['pic'] = config('base_url') . 'public/static/uploads/' . date('Ymd') . '/' . $info->getFilename();
                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        // echo $info->getFilename(); die;
                    } else {
                        // 上传失败获取错误信息
                        return $this->error($file->getError());
                    }
                }

            }
            $validate = Loader::validate('article');
            if ($validate->check($data)) {
                $db = Db::name('article')->insert($data);
                if ($db) {
                    return $this->success('添加文章成功!', 'lst');
                } else {
                    return $this->error('添加文章失败!');
                }
            } else {
                return $this->error($validate->getError());
            }
            return;
        }
        $cateres = db('cate')->select();
        // print_r($cateres);die;
        $this->assign('cateres', $cateres);
        $this->assign(['name' => 'mingchuan', 'add' => '添加页']);
        return $this->fetch();
    }

    /**
     *edit修改文章
     *
     */
    public function edit()
    {
        if (request()->isPost()) {

            $data = [
                'id' => input('id'),
                'title' => input('title'),
                'keywords' => input('keywords'),
                'desc' => input('desc'),
                'cateid' => input('cateid'),
                'content' => input('content'),
                'time' => time(),
            ];

            //$_FILES检查图片是否上传
            if ($_FILES['pic']['tmp_name']) {
                //获取表单上传文件
                // 获取表单上传文件
                $file = request()->file('pic');
                // 移动到框架应用根目录/public/uploads/ 目录下
                if ($file) {
                    $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                    if ($info) {
                        // 成功上传后 获取上传信息
                        $data['pic'] = config('base_url') . 'public/static/uploads/' . date('Ymd') . '/' . $info->getFilename();
                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        // echo $info->getFilename(); die;
                    } else {
                        // 上传失败获取错误信息
                        return $this->error($file->getError());
                    }
                }
            }

            $validate = Loader::validate('article');
            if ($validate->check($data)) {
                $db = Db::name('article')->update($data);
                if ($db) {
                    return $this->success('修改文章成功!', 'lst');
                } else {
                    return $this->error('修改文章失败!');
                }
            }else{
                return $this->error($validate->getError());
            }
        } else {
            $id = input('id');
            // $arts = Db::name('article')->where('id',$id)->find();
            $artres = Db::name('article')->alias('a')->join('cate c', 'c.id = a.cateid', 'LEFT')->field('a.*,c.catename,c.keywords,c.desc,c.type')->where('a.id', $id)->find();
            $cateres = db('cate')->select();
            $this->assign(['name' => '    mingchuan', 'edit' => '修改文章']);
            $this->assign('arts', $artres);
            $this->assign('cateres', $cateres);
            return $this->fetch();
        }

    }

    /*
     * del删除文章
     */
    public function del()
    {
        //id input获取id,下面执行删除
        $id = input('id');
        if (db('article')->delete($id)) {
            return $this->success('删除文章成功', 'lst');
        } else {
            return $this->error('删除文章失败!');
        }

    }
}
