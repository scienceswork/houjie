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

class ArticleController extends Controller
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

            $content->header('社区-帖子');
            $content->description('社区帖子管理');

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

            $content->header('编辑文章');

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
        return Admin::grid(Article::class, function (Grid $grid) {
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
            // 降序
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->user()->name('发帖人');
            $grid->column('title', '帖子名称')
                ->limit(30)
                ->display(function ($title) {
                    return '<a href="' . route('web.users.show', $this->id) . '" target="_blank">' . $title . '</a>';
                });
            $grid->column('rep_count', '回复数')->sortable();
            $grid->column('view_count', '浏览数')->sortable();
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
        return Admin::form(Article::class, function (Form $form) {
            $form->text('title', '标题');
            $form->editor('content', '内容');
            $form->display('created_at', '发布时间');
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
                $that->form()->destroy($id);
                // 删除文章的评论
                ReplyArticle::where('article_id', $id)->delete();
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
