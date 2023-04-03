<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krd extends Model
{
    use HasFactory;

    protected $table = 'krd';
    protected $primaryKey = 'kry';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'kry',
        'mgj',
        'name',
        'ktg',
        'umk'
    ];
}