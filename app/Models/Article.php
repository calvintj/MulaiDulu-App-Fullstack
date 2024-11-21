<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['judul', 'penulis', 'isi_article', 'post_date', 'image'];
}
