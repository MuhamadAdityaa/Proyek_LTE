<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class casts extends Model
{
    // use HasFactory;
    use hasFactory;

    public $timestamps = false;

    // protected $table = 'casts';
    protected $fillable = [
        'name',
        'umur',
        'bio'
    ];

    public function perans()
    {
        return $this->hasMany(Peran::class);
    }
    
}
