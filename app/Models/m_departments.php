<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class m_departments extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'm_departmens';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'id',
        'unit_id',
        'name',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'string';

    public function unit(){
        return $this->belongsTo(m_units::class, 'unit_id');
    }
}
