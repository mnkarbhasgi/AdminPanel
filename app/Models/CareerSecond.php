<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //add this line

class CareerSecond extends Model
{
    use SoftDeletes; //add this line
    use HasFactory;
    protected $dates = [ 'deleted_at' ];
}
