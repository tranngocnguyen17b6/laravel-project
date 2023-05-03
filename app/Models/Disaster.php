<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    use HasFactory;
    protected $table="disater_category";
    protected $primaryKey="disater_id";
    protected $fillable=["disater_tiltle", "disater_status"];
    
}
