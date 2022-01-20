<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    public $primaryKey = 'id_com';
    public $table = 'communes';

    function region()
	{
		return $this->belongsTo('App\Models\Region', 'id_reg');
	}
}
