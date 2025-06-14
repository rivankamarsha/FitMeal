<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        'nama_program', 
        'jumlah', 
        'catatan', 
        'harga_normal', 
        'total_harga', 
        'alamat', 
        'status', 
        'midtrans_order_id',
        'delivery_status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}