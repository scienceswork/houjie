<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\DeleteRow;
use App\Admin\Extensions\EditRow;
use App\Models\ReplyTopic;

use App\Models\Topic;
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

            $content->header('修改评论');

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
            // 禁用创建按钮
            $grid->disableCreation();
            // 禁用导出按钮
            $grid->disableExport();
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
            $form->text('reply', '评论内容');

            $form->display('created_at', '评论时间');
        });
    }

    /**
     * 使用事务来删除
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $that = $this;
        try {
            // 使用事务来删除
            \DB::transaction(function () use ($that, $id) {
                // 删除该数据
                $reply = ReplyTopic::findOrFail($id);
                // 文章评论数-1
                $topic = Topic::findOrFail($reply->topic_id);
                // 减1
                $topic->rep_count--;
                $topic->save();
                $reply->delete();
            });
            return response()->json([
                'status' => true,
                'message' => trans('admin::lang.delete_succeeded'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => trans('admin::lang.delete_failed'),
            ]);
        }
    }
}
