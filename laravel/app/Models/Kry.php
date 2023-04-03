<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kry extends Model
{
    protected $table = 'kry';
    protected $primaryKey = 'kry';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'kry',
        'nik',
        'asr',
        'dvs',
        'jbt',
        'cbg',
        'ptkp',
        'bpjs',
        'name',
        'awal',
        'akhir',
        'alamat',
        'kota',
        'kel',
        'kec',
        'prop',
        'gender',
        'telp',
        'chtime',
        'chuser'
    ];

    public function dvs()
    {
        return $this->belongsTo(dvs::class, 'dvs', 'dvs');
    }
    public function asr()
    {
        return $this->belongsTo(asr::class, 'asr', 'asr');
    }
    public function jbt()
    {
        return $this->belongsTo(jbt::class, 'jbt', 'jbt');
    }
    public function ptkp()
    {
        return $this->belongsTo(ptkp::class, 'ptkp', 'ptkp');
    }
    public function bpjs()
    {
        return $this->belongsTo(bpjs::class, 'bpjs', 'bpjs');
    }
    public function cbg()
    {
        return $this->belongsTo(cbg::class, 'cbg', 'bpjs');
    }
}