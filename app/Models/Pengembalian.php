<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalians';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'peminjaman_id',
        'tgl_kembali',
        'durasi',
        'total_tarif',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
}
