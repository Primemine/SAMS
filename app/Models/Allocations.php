<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocations extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'index_no','full_name','sex','registration_no','reg_no','collage','course','yos','account_number','ma','books_stationary',
        'tution_free','field','research','srf','total'
    ];
}
