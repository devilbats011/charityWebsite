<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactfooter extends Model
{
    protected $fillable = [
        'address', 'contactnumber', 'other1', 'other2'
    ];
}
