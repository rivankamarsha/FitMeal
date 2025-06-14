<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program'; 

    protected $fillable = [
        'nama_program',
        'slug',
        'deskripsi',
        'harga_normal',
        'harga_diskon',
        'is_popular',
        'image',
    ];    

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (!$program->slug) {
                $program->slug = Str::slug($program->nama_program);
            }
        });

        static::updating(function ($program) {
            if ($program->isDirty('nama_program') && !$program->isDirty('slug')) {
                $program->slug = Str::slug($program->nama_program);
            }
        });
    }
}
