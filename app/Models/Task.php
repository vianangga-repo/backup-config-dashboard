<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //kolom yg boleh diisi
    protected $fillable = ['title', 'is_completed'];
}
