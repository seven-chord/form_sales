<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FromCompany extends Model
{
    protected $table = 'from_companies';


    protected $fillable = ['id', 'name'];

}
