<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenUsers extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function absen() {
        return $this->belongsTo(Absen::class, 'absen_id');
    }
    
    protected $table = 'absen_users';

    protected $fillable = [
        'work',
        'task',
        'task_desc',
        'status',
        'status_desc',
        'absen_id',
        'user_id',
        'created_at',
    ];
}
