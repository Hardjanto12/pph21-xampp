<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class mUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'mUser';
    protected $primaryKey = 'muserID';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'muserID',
        'muserName',
        'muserPwd',
        'muserLocked',
        'mguserCode',
        'muserLastNo',
        'muserCreateDate',
        'muserCreateUser',
        'muserModiDate',
        'muserModiUser'
    ];

    public function getAuthPassword()
    {
        return $this->muserPwd;
    }
}
