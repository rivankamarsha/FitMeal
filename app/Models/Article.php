<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $table = 'artikel'; 

    protected $fillable = [
        'judul',
        'slug',
        'image',
        'sumber',
        'link_sumber',
        'deskripsi'
    ]; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            $slug = Str::slug($artikel->judul);
            $count = Article::where('slug', 'like', "$slug%")->count();

            $artikel->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::updating(function ($artikel) {
            $artikel->slug = Str::slug($artikel->judul);
        });
    }
}
