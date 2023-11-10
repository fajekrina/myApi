<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineBrand extends Model
{
    use HasFactory;

    protected $table = 'machine_brands';
    protected $primaryKey = 'id';
    protected $fillable = [
        'brand_name',
        'country_of_origin',
        'contact_information_email',
        'contact_information_phone',
        'created_at',
        'updated_at',
    ];

    public function machineBrands(){
        return $this->hasMany(Machine::class);
    }
}
