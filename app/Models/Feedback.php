<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $fillable = [
        'user_id',
        'message'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
