<?php

namespace App\Admin\Controllers;

use App\Models\CategoryCommunity;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Tree;

class CategoryCommunityController extends Controller
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
            $content->description('社区发文分类管理，文章分类请不要随意删除！');

            $content->body($this->tree());
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

            $content->header('修改分类');

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

            $content->header('新增分类');

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
        return Admin::grid(CategoryCommunity::class, function (Grid $grid) {
            // 修改数据来源
            
            // 禁用导出按钮
            $grid->disableExport();
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
        return Admin::form(CategoryCommunity::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '名称')->help('如: 韩师新闻，分类名称必须唯一，用于定义新闻分类');
            $form->select('parent_id', '父级')->options(CategoryCommunity::selectOptions());;
            $form->text('slug', '缩略名')->help('如: sport，缩略名必须唯一，用于检索文章');
            $form->textarea('description', '描述')->help('简单描述分类，非必填，如为SEO优化，请填写');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }


    public function tree()
    {
        return CategoryCommunity::tree(function (Tree $tree) {

            $tree->branch(function ($branch) {

                return "{$branch['id']} - {$branch['title']} | 文章总数:{$branch['news_count']}";

            });

        });
    }
}
