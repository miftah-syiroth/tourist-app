<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recreation extends Model
{
    use HasFactory;

    protected $table = "recreations";
    protected $fillable = [
        'name',
        'slug',
        'start_day',
        'finish_day',
        'price',
        'quote',
        'status'
    ];

    /**relasi one to many terhadap gambar rekreasi */
    public function images()
    {
        return $this->hasMany(RecreationImage::class, 'recreation_id');
    }

    /**relasi one to many terhadap event */
    public function events()
    {
        return $this->hasMany(Event::class, 'recreation_id');
    }
}
