<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Element
 * @package App\Models
 *
 * fields
 *
 * @property int $hidden
 * @property string $name
 * @property int $parent_id
 */

class Element extends Model
{
    protected $table = 'elements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'parent_id'
    ];


    //relations
    /**
     * @return HasOne
     */
    public function parent(): HasOne
    {
        return $this->hasOne(Element::class, 'id', 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Element::class, 'parent_id');
    }
}
