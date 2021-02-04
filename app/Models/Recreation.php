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
        'start_day',
        'finins_day',
        'price',
        'quote',
        'status'
    ];

    public function images()
    {
        return $this->hasMany(RecreationImage::class, 'recreation_id');
    }
}
