<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    public $primaryKey = 'id_reg';
    public $table = 'customers';

    public $guarded = [];

    public $timestamps = false;  

    public function commune(){
        return $this->hasOne('App\Models\Commune', 'id_com', 'id_com');
    }
    public function region(){
        return $this->hasOne('App\Models\Region', 'id_reg', 'id_reg');
    }
}
