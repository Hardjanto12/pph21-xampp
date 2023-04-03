<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jbt extends Model
{
    use HasFactory;

    protected $fillable = ['jbt', 'name', 'chtime', 'chuser'];
    protected $table = 'jbt';
    protected $primaryKey = 'jbt';
    public $incrementing = false;
    public $timestamps = false;

    public function kry()
    {
        return $this->hasMany(kry::class, 'kry', 'kry');
    }
}