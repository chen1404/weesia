<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'name',
        'version',
        'image',
        'link',
        'category',
    ];
}
