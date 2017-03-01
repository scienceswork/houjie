<?php
namespace App\Admin\Extensions;

use Encore\Admin\Admin;

class EditRow
{
    protected $id;
    protected $resource;

    public function __construct($resource, $id)
    {
        $this->resource = $resource;
        $this->id = $id;
    }

    public function render()
    {
        return <<<EOT
<a class="btn btn-primary btn-xs" href="/{$this->resource}/{$this->id}/edit">
    编辑
</a>
EOT;
    }

    public function __toString()
    {
        return $this->render();
    }
}