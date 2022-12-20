<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangStudi extends Model
{
    use HasFactory;

    protected $table = 'bidangstudi'; // Menentukan Nama Tabel
    protected $fillable = [
        'bidangstudi'
    ];
}
