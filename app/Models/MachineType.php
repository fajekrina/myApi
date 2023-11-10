<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    use HasFactory;

    protected $table = 'machine_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type_name',
        'type_description',
        'max_operating_capacity',
        'power_requirements',
        'safety_guidelines',
        'created_at',
        'updated_at',
    ];

    public function machineTypes(){
        return $this->hasMany(Machine::class);
    }
}
