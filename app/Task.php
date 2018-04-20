<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['developerId', 'projectId', 'date', 'hours','overtime','description',];
}
