<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\JobCreated;

class Job extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'email'
    ];

    /**
     * Model events
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => JobCreated::class
    ];

    /**
     * Get owner of the job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User')->withTrashed();
    }

    /**
     * Get jobs of approved users only
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeApproved($query) {
        return $query->whereHas('user', function($q) {
            $q->where('approved', true);
        })->get();
    }
}
