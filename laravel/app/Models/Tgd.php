<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tgd extends Model
{
    use HasFactory;

    protected $fillable = [
        'nojnl',
        'mgj',
        'name',
        'ktg',
        'umk',
    ];
    protected $table = 'tgd';
    protected $primaryKey = 'nojnl';
    public $incrementing = false;
    public $timestamps = false;

    public function mgj()
    {
        return $this->hasMany(mgj::class, 'mgj', 'mgj');
    }
}