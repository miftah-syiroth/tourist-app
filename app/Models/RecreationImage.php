<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecreationImage extends Model
{
    use HasFactory;

    protected $table = 'recreation_images';
    protected $fillable = [
        'recreation_id',
        'image',
    ];

    public function recreation()
    {
        return $this->belongsTo(Recreation::class, 'recreation_id');
    }
}
