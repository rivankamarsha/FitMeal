<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu'; 

    protected $fillable = [
        'category_menu_id',
        'nama_menu',
        'image',
        'deskripsi',
        'kalori'
    ];
    
    public function categoryMenu(): BelongsTo
    {
        return $this->belongsTo(CategoryMenu::class, 'category_menu_id');
    }
}
