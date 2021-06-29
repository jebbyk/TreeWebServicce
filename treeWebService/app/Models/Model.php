<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model as Base;

/**
 * Class Model
 * @package App\Models
 *
 * @mixin Eloquent
 */
class Model extends Base
{
    /**
     * @var bool
     */
    public $timestamps = false;
}
