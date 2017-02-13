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
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Table;

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

            $content->header('header1');
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

    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('酷站审核详情');
            $content->description('description');
            $headers = ['Keys', 'Values'];
            $rows = [
                'name'   => 'Joe',
                'age'    => 25,
                'gender' => 'Male',
                'birth'  => '1989-12-05',
            ];
            $rows = CoolSite::findOrFail($id)->toArray();
            $rows['img_url'] = '<img src="' . avatar_min($rows['img_url']) . '">';

            $table = new Table($headers, $rows);

            $content->row((new Box('表格', $table))->style('success')->solid());
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
//                $actions->disableDelete();
                // 添加查看
//                $actions->append(viewRow($this->getResource(), $this->getKey()));
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
            $form->text('name', '酷站名称');
            $form->image('img_url', '酷站展示');
            $form->url('url', '酷站网址');
            $form->textarea('description', '酷站描述');
            $form->display('created_at', '申请时间');
//            $form->display('updated_at', 'Updated At');
        });
    }

    protected function table()
    {
        return Admin::table(CoolSite::class, function (Form $form) {
            $form->text('name', '酷站名称');
        });
    }
}
