<?php
namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

/**
 * 百度编辑器
 * Class WangEditor
 * @package App\Admin\Extensions
 */
class uEditor extends Field
{
    // 定义视图
    protected $view = 'admin::form.uEditor';

    // css资源
//    protected static $css = [
//        '/ueditor/lang/zh-cn/zh-cn.min.css'
//    ];

    // js资源
    protected static $js = [
        '/ueditor/ueditor.config.js',
        '/ueditor/ueditor.all.min.js',
        '/ueditor/lang/zh-cn/zh-cn.js'
    ];

    public function render()
    {
        $this->script = <<<EOT
        var ue = UE.getEditor('ueditor'); //用辅助方法生成的话默认id是ueditor
        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
EOT;
        return parent::render();
    }
}