<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster_question extends Model
{
    use HasFactory;
    protected $table="disater_question";
    protected $primaryKey="id_disater_question";
    protected $fillable=['disater_id', 'question_id'];
    
}
