<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
