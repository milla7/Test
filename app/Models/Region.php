<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public $primaryKey = 'id_reg';
    public $table = 'regions';

    public function communes(){
        return $this->hasMany('App\Models\Commune', 'id_reg');
    }

}
