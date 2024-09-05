<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SweetWaterProject extends Model
{
    use HasFactory; 
    protected $guarded = [];
    protected $primaryKey ='sweetwaterId';
    
protected $casts = [
    'beneficiaries' => 'array',
];
}
