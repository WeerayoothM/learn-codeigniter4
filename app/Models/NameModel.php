<?php namespace App\Models;
use CodeIgniter\Model;

class NameModel extends Model{
    protected $table = 'names';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name','email'];

    protected $beforeInsert = ['checkName'];
    // afterInsert
    // beforeUpdate
    // afterUpdate
    // afterFind
    // afterDelete

    public function checkName(array $data) {
        $newNames = $data['data']['name'].' Extra Features';
        $data['data']['name'] = $newNames;

        return $data;
    }

}