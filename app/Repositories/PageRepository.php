<?php
namespace App\Repositories;

use App\Models\Page;

class PageRepository extends Repository
{
    public function __construct(Page $page)
    {
        $this->model = $page;
    }

    public function changeStatus($id)
    {
        $page = $this->model->findOrFail($id);
        $page->is_active == '0' ? $page->fill(['is_active' => '1'])->save() : $page->fill(['is_active' => '0'])->save();
        return $page;
    }
}