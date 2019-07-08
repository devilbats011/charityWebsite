<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bankinfo extends Model
{
        protected $fillable = [
        'bankname', 'bankaccount',
    ];
}
