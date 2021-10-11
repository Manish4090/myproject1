<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
	protected $fillable = [
        'parent_id',
        'cat_name',
        'image',
        'status',
        'additional_des',
        'created_at',
        'updated_at',
    ];
}
