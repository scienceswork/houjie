<?php
namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

/**
 * 轻量级编辑器wangEditor
 * Class WangEditor
 * @package App\Admin\Extensions
 */
class WangEditor extends Field
{
    // 定义视图
    protected $view = 'admin::form.wangEditor';

    // css资源
    protected static $css = [
        '/assets/wangEditor/dist/css/wangEditor.min.css'
    ];

    // js资源
    protected static $js = [
        '/assets/wangEditor/dist/js/wangEditor.min.js'
    ];

    public function render()
    {
        $this->script = <<<EOT
            var editor = new wangEditor('{$this->id}');
            // 禁止吸顶
            editor.config.menuFixed = false;
            // 默认代码
            editor.config.codeDefaultLang = 'javascript';
            // 普通的自定义菜单
            editor.config.menus = [
                'source', '|', 'bold', 'underline', 'italic', 'strikethrough', 'eraser',
                'forecolor', 'bgcolor', '|', 'quote', 'fontfamily', 'fontsize', 'head',
                'unorderlist', 'orderlist', 'alignleft', 'aligncenter', 'alignright',
                '|', 'link', 'unlink', 'table', '|', 'img', 'location', 'insertcode',
                '|', 'undo', 'redo', 'fullscreen'
             ];
            editor.create();
EOT;
        return parent::render();
    }
}