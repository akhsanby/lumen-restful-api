<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
	protected $table = 'fruits';
    protected $fillable = ['name', 'category', 'price', 'icon'];
}
