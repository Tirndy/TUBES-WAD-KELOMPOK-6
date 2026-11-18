<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    protected $table = 'ekspedisi';

    protected $fillable = [
        'nama_ekspedisi',
        'layanan',
        'zona',
        'tarif',
        'estimasi'
    ];
}
