<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $fillable = [
        'nilai', 'produk_id', 'user_id'
    ];

    protected $primaryKey = 'id';


    public function produk()
    {
        return $this->belongsTo(Kode::class, 'produk_id', 'id');
    }
}
