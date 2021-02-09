<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = "articles";
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
    ];

    /**
     * relasi many to many dengan kategori. Banyak artikel memiliki banyak kategori
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_has_categories', 'article_id', 'category_id');
    }

    /**relasi banyak ke satu. Sebuah artikel hanyak dimiliki oleh satu user */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**relasi satu artikel memliki banyak gambar */
    public function images()
    {
        return $this->hasMany(ArticleImage::class, 'article_id');
    }
}
