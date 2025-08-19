<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    Protected $fillable = [
        'umur',
        'bio',
        'alamat',
    ];

    public function users()
    {
        return $this->hasone(User::class);
    }
}
