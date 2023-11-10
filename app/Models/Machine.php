<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $table = 'machines';
    protected $primaryKey = 'barcode_id';
    protected $fillable = [
        'type_id',
        'brand_id',
        'machine_name',
        'machine_status',
        'purchase_price',
        'purchase_date',
        'manufacture_date',
        'warranty_expiry_date',
        'warehouse_location',
        'station_location',
        'floor_location',
        'created_at',
        'updated_at',
    ];

    public function machine_brand(){
        return $this->belongsTo(MachineBrand::class, 'id');
    }
    
    public function machine_type(){
        return $this->belongsTo(MachineType::class, 'id');
    }

    public function machine_mutation(){
        return $this->hasMany(MachineMutation::class);
    }
}
