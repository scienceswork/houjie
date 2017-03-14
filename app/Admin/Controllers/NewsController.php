<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\News;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NewsController extends Controller
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

            $content->header('新闻列表');
            $content->description('查看所有新闻');

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

            $content->header('发表新闻');

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
        return Admin::grid(News::class, function (Grid $grid) {
            // 禁用导出按钮
            $grid->disableExport();
            // 修改数据顺序
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->column('author', '作者');
            $grid->column('title', '标题')->display(function ($title) {
                return "<a href='" . route('web.news.show', $this->id) . "' target='_blank'>$title</a>";
            });
            $grid->category()->title('分类');
            $grid->column('view_count', '浏览次数');
            $grid->column('reply_count', '评论条数');
            $grid->column('is_block', '是否锁定')->display(function ($is_block) {
                if ($is_block) {
                    return "<span class='label label-danger'>是</span>";
                } else {
                    return "<span class='label label-success'>否</span>";
                }
            });
            $grid->created_at('发布时间');
//            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(News::class, function (Form $form) {

//            $form->display('id', 'ID');
            $form->text('title', '新闻标题');
            $form->text('author', '作者');
            $form->select('category_id', '分类')->options(getCategory());
            $form->editor('content', '内容');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
