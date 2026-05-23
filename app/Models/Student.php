<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student_tbl_';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fname',
        'lname',
        'midname',
        'age',
        'address',
        'zip'
    ];

}
