<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\DeleteRow;
use App\Admin\Extensions\EditRow;
use App\Models\ReplyTopic;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ReplyTopicController extends Controller
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

            $content->header('评论管理');
            $content->description('教师在线评论管理 ');

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
        return Admin::grid(ReplyTopic::class, function (Grid $grid) {
            // 修改数据来源
            $grid->model()->orderBy('id', 'desc');
            // 行的操作
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                $actions->append(new EditRow($actions->getResource(), $actions->getKey()));
                $actions->append(new DeleteRow($actions->getResource(), $actions->getKey()));
            });
            $grid->id('ID')->sortable();
            $grid->user()->name('用户');
            $grid->topic()->name('帖子名称')->display(function ($name) {
                return mb_substr($name, 0, 30);
            });
            $grid->column('reply', '评论')->display(function ($reply) {
                return mb_substr($reply, 0, 30);
            });
            $grid->created_at('评论时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(ReplyTopic::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
