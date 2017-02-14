<?php

namespace App\Admin\Controllers;

use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Layout\Row;
use Encore\Admin\Tree;

class CategoryController extends Controller
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

            $content->header('分类管理');
            $content->description('新闻分类管理');
            $content->row(function (Row $row) {
                $row->column(6, $this->tree());
                $row->column(6, $this->form());
            });
//            $content->body($this->tree());
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
        return Admin::grid(Category::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Category::class, function (Form $form) {
            
            $form->display('id', 'ID');
            $form->text('title', '名称')->help('如: 韩师新闻，分类名称必须唯一，用于定义新闻分类');
            $form->select('parent_id', '父级')->options(Category::selectOptions());;
            $form->text('slug', '缩略名')->help('如: sport，缩略名必须唯一，用于检索文章');
            $form->textarea('description', '描述')->help('简单描述分类，非必填，如为SEO优化，请填写');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

    /**
     * 分类树状图
     * @return Tree
     */
    protected function tree()
    {
        return Category::tree(function (Tree $tree) {

            $tree->branch(function ($branch) {
                $src = config('admin.upload.host') . '/' ;

                return "{$branch['id']} - {$branch['title']} | 文章总数:{$branch['news_count']}";

            });

        });
    }

}
