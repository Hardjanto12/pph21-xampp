<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpjs extends Model
{
    protected $fillable = [
        'bpjs',
        'name',
        'awal',
        'akhir',
        'tarif',
        'penanggung',
        'pengurangpph21',
        'chtime',
        'chuser'
    ];
    protected $table = 'bpjs';
    protected $primaryKey = 'bpjs';
    public $incrementing = false;
    public $timestamps = false;

    public function kry()
    {
        return $this->hasMany(kry::class, 'kry', 'kry');
    }
}