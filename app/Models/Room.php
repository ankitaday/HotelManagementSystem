<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model {
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type',
        'floor',
        'bed_count',
        'view',
        'has_balcony',
        'max_occupancy',
        'ac_type',
        'price',
        'status',
        'availability',
        'description'
    ];
}
