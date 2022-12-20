<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarKompetensi extends Model
{
    use HasFactory;
    protected $table = "standarkompetensi";
    protected $fillable = [
        'standarkompetensi',
        'kdbidstudi'
    ];

    public function bidangstudi()
    {
        return $this->belongsTo(BidangStudi::class, 'kdbidstudi', 'id');
    }
}
