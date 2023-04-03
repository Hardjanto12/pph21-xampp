<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cbg extends Model
{
    protected $fillable = [
        'cbg',
        'name',
        'alamat',
        'kel',
        'kec',
        'kota',
        'prov',
        'umk',
        'chtime',
        'chuser'
    ];
    protected $table = 'cbg';
    protected $primaryKey = 'cbg';
    public $incrementing = false;
    public $timestamps = false;

    public function kry()
    {
        return $this->hasMany(kry::class, 'kry', 'kry');
    }
}