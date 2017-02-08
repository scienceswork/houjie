<?php

namespace App\Admin\Controllers;

use App\Models\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('用户管理');
            $content->description('查看所有用户列表');

            $content->body($this->grid());
        });
    }

    public function show($id)
    {
        dd($id);
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('新建用户');
            $content->description('管理员新建用户');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name', '用户名');
            $grid->column('phone', '手机号');
            $grid->column('email', '电子邮箱');
            $grid->created_at('注册时间');
            $grid->updated_at('更新时间');
            $grid->column('verified', '是否激活')->display(function ($verified) {
                if ($verified) {
                    return '<span class="label label-success">已激活</span>';
                } else {
                    return '<span class="label label-danger">未激活</span>';
                }
            })->sortable();
            // 操作
            $grid->actions(function ($actions) {
                // 关闭删除
                $actions->disableDelete();
                // 添加查看
                $actions->append('<a href=""><i class="fa fa-eye"></i></a>');
            });
            // 添加查询过滤器
            $grid->filter(function ($filter) {
                // 使用模态框弹出过滤器
                $filter->useModal();
                // 用户名过滤器
                $filter->like('name', '用户名');
                // 手机号过滤器
                $filter->like('phone', '手机号');
                // 电子邮箱过滤器
                $filter->like('email', '邮箱');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {
            $form->tab('基本信息', function (Form $form) {
//                $form->display('id', 'ID');
                $form->text('name', '用户名')->rules('required|min:2');
                $form->email('email', '邮箱')->rules('required');
                $form->password('password', '密码')->rules('required|min:6|confirmed');
                $form->password('password_confirmation', '确认密码');
//                $form->display('created_at', '注册时间');
//                $form->display('updated_at', '更新时间');
            })->tab('校园信息', function (Form $form) {
                $form->url('url', '个人主页');
            });
        });
    }
}
