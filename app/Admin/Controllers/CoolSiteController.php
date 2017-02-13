<?php

namespace App\Admin\Controllers;

use App\Models\CoolSite;

use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CoolSiteController extends Controller
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

            $content->header('酷站审核');
            $content->description('用户在前台提交的酷站申请审核，管理员通过检查质量判断是否予以通过');

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
        return Admin::grid(CoolSite::class, function (Grid $grid) {
            // 只显示未审核的酷站，且按照申请日期降序
            $grid->model()->where('verified', false)->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->user()->name('申请人');
            $grid->column('name', '酷站名称')->display(function ($name) {
                return '<a href="' . $this->url . '" target="_bank">' . $name . '</a>';
            });
            $grid->column('url', '酷站网址');
            $grid->created_at('申请时间');
            // 操作
            $grid->actions(function ($actions) {
                // 关闭删除
                $actions->disableDelete();
                // 添加查看
                $actions->append('<a href="' . route('cool_sites.show', 4) . '"><i class="fa fa-eye"></i></a>');
            });
            // 禁用查询过滤器
            $grid->disableFilter();
            // 禁用创建按钮
            $grid->disableCreation();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(CoolSite::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
