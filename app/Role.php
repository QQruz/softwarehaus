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

    /**
     * Get users associated with the role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
