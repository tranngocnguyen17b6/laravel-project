<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table="school";
    protected $primaryKey="school_id";
    protected $fillable=['school_name', 'school_phone', 'school-mail', 'school_note'];

}
