<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\DeleteRow;
use App\Admin\Extensions\EditRow;
use App\Models\Teacher;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TeacherController extends Controller
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

            $content->header('在线管理');
            $content->description('管理员审核申请的教师在线是否符合标准');
            $content->body($this->grid());
        });
    }

    /**
     * 教师在线
     * @return \Encore\Admin\Content
     */
    public function show_teacher()
    {
        return Admin::content(function (Content $content) {
            $content->header('教师在线');
            $content->body($this->show_grid());
        });
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

            $content->header('在线审核');
            $content->description('管理员认真核对信息并对信息进行合理地审核');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Teacher::class, function (Grid $grid) {
            // 行的操作
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                $actions->append(new EditRow($actions->getResource(), $actions->getKey()));
                $actions->append(new DeleteRow($actions->getResource(), $actions->getKey()));
            });
            $grid->id('ID')->sortable();
            $grid->user()->name('申请人');
            $grid->column('name', '在线名称');
            $grid->column('phone', '手机号码');
            $grid->column('email', '电子邮箱');
            $grid->created_at('申请时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Teacher::class, function (Form $form) {
            // 只显示未审核的教师在线
            $form->model()->where('is_audit', false);
            $form->tab('申请信息', function (Form $form) {
                $form->display('id', 'ID');
                $form->display('user.name', '申请人');
                $form->display('phone', '联系方式');
                $form->display('email', '电子邮箱');
                $form->textarea('reason', '申请理由');
                $form->display('created_at', '申请时间');
            })->tab('资质证明', function (Form $form) {
                $form->image('prove', '资质审核');
            })->tab('在线信息', function (Form $form) {
                $form->display('name', '在线名称');
                $form->text('description', '在线描述');
                $form->image('avatar', '在线封面');
                $form->number('order', '排序');
            })->tab('审核管理', function (Form $form) {
                $states = [
                    'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
                    'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
                ];
                $form->display('user_id', '审核人')->with(function ($id) {
                    return Admin::user()->name;
                });
                $form->textarea('message', '审核信息')
                    ->help('若不通过，请填写审核失败原因，如：未能证明教师资质');
                $form->switch('is_pass', '是否通过')->states($states);
            });
        });
    }
}
