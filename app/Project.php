<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['managerId','name', 'description', 'startDate', 'endDate',];
}
