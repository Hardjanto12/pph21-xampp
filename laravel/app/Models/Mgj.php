<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mgj extends Model
{
    use HasFactory;

    protected $fillable = ['mgj', 'ktg', 'name', 'chtime', 'chuser'];
    protected $table = 'mgj';
    protected $primaryKey = 'mgj';
    public $incrementing = false;
    public $timestamps = false;

    public function ktg()
    {
        return $this->belongsTo(ktg::class, 'ktg', 'ktg');
    }
}