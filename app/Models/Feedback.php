<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = ['comment', 'rating', 'start_date', 'target', 'source'];

    public function scopeImported(Builder $query): void
    {
        $query->where('source', '!=', 'webApp');
    }
}
