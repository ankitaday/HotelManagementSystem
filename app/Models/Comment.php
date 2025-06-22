<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'reservation_id',
        'comment',
        'user_type',
        'document'
    ];
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
