<?php

namespace App\Models\Corporate;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Designation extends Authenticatable
{

    protected $table = 'designations';
    protected $connection = 'mysql-main';
}
