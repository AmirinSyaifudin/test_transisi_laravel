<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{

    protected $table = 'employe';
    public $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
