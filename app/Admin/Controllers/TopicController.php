<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\DeleteRow;
use App\Admin\Extensions\EditRow;
use App\Models\Topic;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TopicController extends Controller
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

            $content->header('帖子管理');
            $content->description('管理教师在线帖子');

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
        return Admin::grid(Topic::class, function (Grid $grid) {
            // 行的操作
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                $actions->append(new EditRow($actions->getResource(), $actions->getKey()));
                $actions->append(new DeleteRow($actions->getResource(), $actions->getKey()));
            });
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->user()->name('发帖人');
            $grid->column('name', '帖子名字');
            $grid->column('rep_count', '评论数')->sortable();
            $grid->column('is_close', '是否关闭');
            $grid->created_at('发帖时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Topic::class, function (Form $form) {
            $form->text('name', '帖子标题');
            $form->editor('content', '帖子内容');
            $form->display('created_at', '发帖时间');
            $form->display('updated_at', '修改时间');
        });
    }
}
