<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'title',
        'subtitle',
        'description',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
