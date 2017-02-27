<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\DeleteRow;
use App\Admin\Extensions\EditRow;
use App\Models\Express;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ExpressController extends Controller
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

            $content->header('情书列表');
            $content->description('情书列表仅展示在前台展示的情书');

            $content->body($this->grid());
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

            $content->header('编辑情书');
            $content->description('编辑审核用户情书');

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
        return Admin::grid(Express::class, function (Grid $grid) {
            // 行的操作
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                $actions->append(new EditRow($actions->getResource(), $actions->getKey()));
                $actions->append(new DeleteRow($actions->getResource(), $actions->getKey()));
            });
            $grid->model()->where('is_show', true)->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->column('receiver', '收件人');
            $grid->column('sender', '发件人');
            $grid->column('password', '专属密码');
            $grid->column('content', '情书')->limit(30);
            $grid->column('ip', 'Ip地址')->label('success');
            $grid->created_at('发布时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Express::class, function (Form $form) {

//            $form->display('id', 'ID');
            $form->text('receiver', '收件人');
            $form->text('sender', '发件人');
            $form->textarea('content', '情书');
            $form->text('password', '专属密码');
            $form->display('ip', 'Ip地址');
            $form->display('created_at', '发布时间');
//            $form->display('updated_at', 'Updated At');
        });
    }
}
