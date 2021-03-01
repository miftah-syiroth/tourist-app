<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = [
        'recreation_id',
        'name',
        'slug',
        'start_date',
        'finish_date',
        'image',
        'description',
        'price',
        'status',
    ];

    /** ubah format start_date ke yg lebih enak dibaca */
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($this->attributes['start_date'])->isoFormat('D  MMM Y');
    }

    public function getFinishDateAttribute($value)
    {
        return Carbon::parse($this->attributes['finish_date'])->isoFormat('D  MMM Y');
    }

    /**ambil sisa hari dari start_date dan finish_date */
    public function dateDifferential()
    {
        if (Carbon::now()->lessThan(Carbon::parse($this->start_date))) {
            return Carbon::parse($this->start_date)->diffInDays(Carbon::now()) . ' hari lagi';
        } elseif (Carbon::now()->lessThanOrEqualTo(Carbon::parse($this->finish_date))) {
            return 'sedang berlangsung';
        } else {
            return Carbon::parse($this->finish_date)->diffInDays(Carbon::now()) . ' hari yang lalu';
        }
    }

    /** UNTUK RELASI */

    /**relasi one to many reserved */
    public function recreation()
    {
        return $this->belongsTo(Recreation::class, 'recreation_id');
    }
}
