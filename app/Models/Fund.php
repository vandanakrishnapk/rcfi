<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory; 
    protected $guarded =[];
    protected $primaryKey = 'fundId';
    public function getPreviousCurrentAttribute($value)
    {
        // If the value is stored as JSON, decode it to an array
        return json_decode($value, true);
    }

    // Mutator for previous_current
    public function setPreviousCurrentAttribute($value)
    {
        // Encode the value as JSON before saving it to the database
        $this->attributes['previous_current'] = json_encode($value);
    } 


    public function getPreviousUpdatesAttribute($value)
    {
        // If the value is stored as JSON, decode it to an array
        return json_decode($value, true);
    }

    // Mutator for previous_current
    public function setPreviousUpdatesAttribute($value)
    {
        // Encode the value as JSON before saving it to the database
        $this->attributes['previous_updates'] = json_encode($value);
    }  
    protected $casts = [
        'previous_current' => 'array', 
        'previous_updates' => 'array', // Automatically cast to array
    ]; 

  
}
