<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvs extends Model
{
    use HasFactory;

    protected $table = 'dvs';
    protected $primaryKey = 'dvs';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['dvs', 'name', 'chtime', 'chuser'];

    public function kry()
    {
        return $this->hasMany(kry::class, 'kry', 'kry');
    }
}