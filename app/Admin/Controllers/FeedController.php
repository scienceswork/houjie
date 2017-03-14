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

class FeedController extends Controller
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

            $content->header('聊天管理');
            $content->description('管理广场聊天');

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

            $content->header('编辑说说');
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

            $content->header('创建说说');

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
        return Admin::grid(Feed::class, function (Grid $grid) {
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
            $grid->user()->name('发布者');
            $grid->column('content', '说说内容');
            $grid->column('vote_up_count', '点赞数');
            $grid->column('rep_count', '评论数');
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
        return Admin::form(Feed::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->textarea('content', '聊天内容');
            $form->display('created_at', '发布时间');
            $form->display('updated_at', '更新时间');
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
                $feed = Feed::find($id);
                // 删除评论
                ReplyFeed::where('feed_id', $id)->delete();
                // 删除点赞
                VoteUpFeed::where('feed_id', $id)->delete();
                $feed->delete();

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
