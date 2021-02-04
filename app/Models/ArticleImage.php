<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    use HasFactory;

    protected $table = "article_images";
    protected $fillable = [
        'image',
        'article_id',
    ];

    /**relasi banyak ke satu, banyak image dimiliki oleh satu artikel */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
