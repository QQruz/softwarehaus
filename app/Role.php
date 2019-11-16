<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * No need for timestamps
     *
     * @var boolean
     */
    public $timestamps = false;
}
