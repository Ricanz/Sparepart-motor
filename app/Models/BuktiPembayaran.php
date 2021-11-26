<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;
    protected $table = 'bukti_pembayaran';
    protected $fillable = [
        'transaksi_id',
        'bukti',
        'status',
    ];

    protected $primaryKey = 'id';

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}
