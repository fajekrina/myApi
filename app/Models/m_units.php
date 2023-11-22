<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class m_units extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'm_units';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'name',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'string';

    public function Departments(){
        return $this->hasMany(m_departments::class);
    }
}
