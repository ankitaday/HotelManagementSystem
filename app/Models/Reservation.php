<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id', 'customer_name', 'customer_email', 'customer_phone',
        'check_in', 'check_out', 'guests', 'status'
    ];
    protected static function boot()
{
    parent::boot();

    static::creating(function ($reservation) {
        $checkInDate = Carbon::parse($reservation->check_in)->timezone(config('app.timezone')); // Ensure timezone

        // Check if the status is 'confirmed' before updating the room status
        if ($reservation->status == 'confirmed' && $checkInDate->isToday()) {
            $reservation->room->update(['status' => 'occupied']);
        }
    });

    static::updating(function ($reservation) {
        // Check if the status is 'confirmed' before updating the room status
        $checkInDate = Carbon::parse($reservation->check_in)->timezone(config('app.timezone')); // Ensure timezone

        // Update room status based on the check-in date and reservation status
        if ($reservation->status == 'confirmed') {
            if ($checkInDate->isToday()) {
                $reservation->room->update(['status' => 'occupied']);
            } elseif ($checkInDate->isPast()) {
                $reservation->room->update(['status' => 'available']);
            } else {
                $reservation->room->update(['status' => 'available']);
            }
        }
    });

    static::deleting(function ($reservation) {
        // If a reservation is deleted, make the room available
        $reservation->room->update(['status' => 'available']);
    });
}

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' is the foreign key
    }
}

