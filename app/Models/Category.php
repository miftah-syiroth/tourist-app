<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = [
        'category',
    ];

    /**
     * relasi many to many dengan artikel. banyak kategori yang dimiliki oleh banyak artikel
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
