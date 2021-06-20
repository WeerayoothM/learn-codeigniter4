<?php namespace App\Controllers;

use App\Models\CustomModel;

class Dbs extends BaseController {
    public function index() {
        
        $db1 = db_connect();
        $model1 = new CustomModel($db1);
        
        $db2 = db_connect('anotherDb');
        $model2 = new CustomModel($db2);

        // The db is ci4_db
        echo '<pre>';
            print_r($model1->getUsers(3));
        echo '<pre><hr>';
     
        echo '<pre>';
            print_r($model2->getAnotherUsers(3));
        echo '<pre><hr>';
        
        // The db has change to ci4_login
        echo '<pre>';
            print_r($model1->getUsers(3));
        echo '<pre>';
    }

}