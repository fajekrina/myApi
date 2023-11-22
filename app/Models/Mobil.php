<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobils';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'merek',
        'model',
        'nomor_plat',
        'tarif_harian',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Departments(){
        return $this->hasMany(Peminjaman::class);
    }
}
