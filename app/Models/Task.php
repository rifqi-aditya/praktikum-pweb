<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title','subject', 'description', 'status', 'start_date', 'end_date', 'priority'];

    protected $dates = ['start_date', 'end_date'];
}
