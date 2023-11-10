<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineMutation extends Model
{
    use HasFactory;

    protected $table = 'machine_mutations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'barcode_id',
        'mutation_description',
        'previous_warehouse_location',
        'previous_station_location',
        'previous_floor_location',
        'new_warehouse_location',
        'new_station_location',
        'new_floor_location',
        'created_at',
        'updated_at',
    ];

    public function machineMutation(){
        return $this->belongsTo(Machine::class, 'barcode_id');
    }
}
