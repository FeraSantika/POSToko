<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;
    public $table = 'data_user';
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

    public function role(){
        return $this->belongsTo(DataRole::class, 'Role_id', 'Role_id');
    }
}
