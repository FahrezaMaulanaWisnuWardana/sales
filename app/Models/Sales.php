<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = "sales";
    protected $fillable = ['customer_id', 'total_sales', 'tanggal_transaksi'];
    public $timestamps = false;
}
