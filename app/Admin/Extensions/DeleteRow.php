<?php
namespace App\Admin\Extensions;

use Encore\Admin\Admin;

class DeleteRow
{
    protected $id;
    protected $resource;

    public function __construct($resource, $id)
    {
        $this->resource = $resource;
        $this->id = $id;
    }

    public function script()
    {
        $token = csrf_token();
        $confirm = trans('admin::lang.delete_confirm');
        $successMsg = trans('admin::lang.delete_succeeded');
        $faildMsg = trans('admin::lang.delete_failed');

        return <<<SCRIPT
$('.grid-row-delete').unbind('click').click(function() {
    var id = $(this).data('id');
    if(confirm("{$confirm}")) {
        $.post('/{$this->resource}/' + id, {_method:'delete','_token':'{$token}'}, function(data){

            $.pjax.reload('#pjax-container');

            if (typeof data === 'object') {
                if (data.status) {  
                    toastr.success('{$successMsg}');
                } else {
                    toastr.error('{$faildMsg}');
                }
            }
        });
    }
});

SCRIPT;
    }

    public function render()
    {
        Admin::script($this->script());

        return <<<EOT
<a class="btn btn-danger btn-xs grid-row-delete" href="javascript:void(0);" style="margin-left: 5px;" data-id="{$this->id}">
    删除
</a>
EOT;
    }

    public function __toString()
    {
        return $this->render();
    }
}