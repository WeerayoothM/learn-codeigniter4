<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

// join data table
class CustomModel{

    protected $db;

    // get the reference of the db instance : &$db
    public function __construct(ConnectionInterface &$db){
        $this->db = &$db;
    }

    function getNews(){
        //query builder 
        $builder = $this->db->table('news');
        $builder->join('users','news.news_author = users.user_id');
        $news = $builder->get()->getResult();
        return $news;
        
    }
}