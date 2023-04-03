<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asr extends Model
{
    use HasFactory;

    protected $fillable = ['asr', 'name', 'chtime', 'chuser'];
    protected $table = 'asr';
    protected $primaryKey = 'asr';
    public $incrementing = false;
    public $timestamps = false;

    public function kry()
    {
        return $this->hasMany(kry::class, 'kry', 'kry');
    }
}