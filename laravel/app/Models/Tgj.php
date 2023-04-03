<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tgj extends Model
{
    use HasFactory;

    protected $fillable = [
        'nojnl',
        'date',
        'masa',
        'tahun',
        'kry',
        'nik',
        'name',
        'chuser',
        'chtime'
    ];
    protected $table = 'tgj';
    protected $primaryKey = 'nojnl';
    public $incrementing = false;
    public $timestamps = false;

    public function tgd()
    {
        return $this->hasMany(tgd::class, 'nojnl', 'nojnl');
    }
}