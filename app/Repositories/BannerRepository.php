<?php
namespace App\Repositories;

use App\Models\Banner;

class BannerRepository extends Repository
{
    public function __construct(Banner $banner)
    {
        $this->model = $banner;
    }

    public function changeStatus($id)
    {
        $banner = $this->model->findOrFail($id);
        $banner->is_active == '0' ? $banner->fill(['is_active' => '1'])->save() : $banner->fill(['is_active' => '0'])->save();
        return $banner;
    }
}