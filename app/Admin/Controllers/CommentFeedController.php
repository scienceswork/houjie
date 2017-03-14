<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\DeleteRow;
use App\Admin\Extensions\EditRow;
use App\Models\Feed;
use App\Models\ReplyFeed;

use App\Models\VoteUpFeed;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CommentFeedController extends Controller
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
            $content->description('管理广场说说评论');
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
        return Admin::grid(ReplyFeed::class, function (Grid $grid) {
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
            $grid->user()->name('评论人');
            $grid->column('content', '评论内容');
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
        return Admin::form(ReplyFeed::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
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
                $reply = ReplyFeed::find($id);
                // 说说留言数-1
                $feed = Feed::find($reply->feed_id);
                // 减1
                $feed->rep_count--;
                $feed->save();
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
