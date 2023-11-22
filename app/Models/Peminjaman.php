<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'mobil_id',
        'tgl_awal',
        'tgl_akhir',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mobil(){
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    public function pengembalian(){
        return $this->hasOne(Pengembalian::class);
    }
}
