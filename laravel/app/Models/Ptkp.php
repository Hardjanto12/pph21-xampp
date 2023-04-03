<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ptkp extends Model
{
    protected $fillable = [
        'ptkp',
        'name',
        'val',
        'awal',
        'akhir',
        'val2',
        'grup',
        'chtime',
        'chuser'
    ];
    protected $table = 'ptkp';
    protected $primaryKey = 'ptkp';
    public $incrementing = false;
    public $timestamps = false;

    public function kry()
    {
        return $this->hasMany(kry::class, 'kry', 'kry');
    }
}