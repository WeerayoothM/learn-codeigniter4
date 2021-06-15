<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';

    protected $allowedFields = ['user_name','user_email','user_password','user_created_at'];


    protected $beforeInsert = ['hashPassword'];

    public function hashPassword(array $data){
        $data['data']['password'] = password_hash($data['data']['password'],PASSWORD_DEFAULT);

        return $data;
    }
}