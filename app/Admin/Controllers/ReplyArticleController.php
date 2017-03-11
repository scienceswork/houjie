<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\DeleteRow;
use App\Admin\Extensions\EditRow;
use App\Models\Article;
use App\Models\ReplyArticle;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ReplyArticleController extends Controller
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
            $content->description('审核查看社区评论');

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

            $content->header('编辑评论');

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
        return Admin::grid(ReplyArticle::class, function (Grid $grid) {
            // 修改排序
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
            $grid->article()->title('帖名')
                ->limit(30)
                ->display(function ($title) {
                return '<a href="' . route('web.community.show', $this->id) . '" target="_blank">' . $title . '</a>';
            });
            $grid->column('content', '评论内容')
                ->limit(30);
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
        return Admin::form(ReplyArticle::class, function (Form $form) {
            $form->textarea('content', '评论内容');
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
                $reply = ReplyArticle::findOrFail($id);
                // 文章评论数-1
                $article = Article::findOrFail($reply->article_id);
                // 减1
                $article->rep_count--;
                $article->save();
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
