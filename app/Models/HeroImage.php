<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeroImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hero_images';
    protected $guarded = [];
}
