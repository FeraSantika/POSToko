<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Authenticatable
{
    use HasFactory;
    protected $table = 'data_user';
    protected $fillable = [
        'User_id',
        'User_name',
        'User_email',
        'User_password',
        'User_gender',
        'User_photo',
        'Role_id',
        'User_token',
    ];

    protected $User_name = 'User_name';
    protected $User_password = 'User_password';

    public function role(){
        return $this->belongsTo(DataRole::class, 'Role_id', 'Role_id');
    }

}
