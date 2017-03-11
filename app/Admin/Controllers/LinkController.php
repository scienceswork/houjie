<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\DeleteRow;
use App\Admin\Extensions\EditRow;
use App\Models\Link;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Request;

class LinkController extends Controller
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

            $content->header('友情链接');
            $content->description('友情链接管理');

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

            $content->header('修改链接');

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

            $content->header('新建链接');
            $content->description('新建友情链接');

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
        return Admin::grid(Link::class, function (Grid $grid) {
            $states = [
                'on' => ['text' => 'YES'],
                'off' => ['text' => 'NO'],
            ];
            // 行的操作
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
                $actions->append(new EditRow($actions->getResource(), $actions->getKey()));
                $actions->append(new DeleteRow($actions->getResource(), $actions->getKey()));
            });
            // 可排序的表格
            $grid->model()->ordered(); // 降序
            $grid->id('ID')->sortable();
            $grid->column('title', '链接名称')->editable();;
            $grid->column('link', '链接地址')->editable();;
            $grid->order('排序')->orderable();
            $grid->column('is_closed', '状态')->display(function ($is_closed) {
                if ($is_closed) {
                    return '<span class="label label-danger">已关闭</span>';
                } else {
                    return '<span class="label label-success">已开启</span>';
                }
            })->sortable();
            $grid->created_at('创建时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Link::class, function (Form $form) {
            $states = [
                'on' => ['text' => '关闭', 'color' => 'danger'],
                'off' => ['text' => '开启', 'color' => 'success'],
            ];
            $form->text('title', '链接名称')->help('如:怪咖科学');
            $form->url('link', '链接地址')->help('如:http://www.scienceswork.com');
            $form->number('order', '排序')->default(0)->help('越小越靠前');
            $form->switch('is_closed', '状态')->states($states);
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }

    public function is_close(Request $request)
    {
        foreach (Link::find($request->get('ids')) as $link) {
            $link->is_closed = $request->get('action');
            $link->save();
        }
    }
}
