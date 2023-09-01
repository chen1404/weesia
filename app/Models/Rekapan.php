<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapan extends Model
{
    use HasFactory;
    
    protected $table = 'recaps';
    protected $fillable = [
        'title',
        'date',
        'link',
    ];
}
