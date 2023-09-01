<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    public function AbsenUser() {
        return $this->hasMany(AbsenUsers::class);
    }

    protected $table = 'absens';

    protected $fillable = [
        'date',
        'count_clone',
        'count_bot',
        'count_alpha',
        'created_at',
    ];
}
