<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $fillable = ['nama', 'tgl_lahir', 'alamat'];

    protected $guarded = ['id'];

    public function scopeFind($query)
    {
        // 
    }
}
