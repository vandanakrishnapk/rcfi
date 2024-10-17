<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DifferentlyAbled extends Model
{
    use HasFactory; 
    protected $table ='differently_abled';
    protected $guarded =[];
    protected $primaryKey ='diffId';
}
