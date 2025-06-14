<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryMenu extends Model
{
    use HasFactory;

    protected $table = 'category_menu';
    
    protected $fillable = [
        'nama_kategori',
        'nama_menu',
        'kalori',
        'deskripsi',
        'image'
    ];

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'category_menu_id');
    }
}