<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

// join data table
class CustomModel{

    protected $db;

    // get the reference of the db instance : &$db
    public function __construct(ConnectionInterface &$db){
        $this->db = &$db;
    }

    function all(){
        // "SELECT * FROM news";
        return $this->db->table('news')->get()->getResult();
    }
    
    function where(){
        // method that build up your query should be defined before get method
        return $this->db->table('news')
                        ->where(['id >'=>90])
                        ->where(['id <'=>95])
                        ->where(['id !='=> 92])
                        ->orderBy('id','DESC')
                        ->get()
                        ->getResult();

        // if not use get method yet it can be add other method eg. $this->db->where
    }
    
    function join(){
        // method that build up your query should be defined before get method
        return $this->db->table('news')
                        ->where('id >',50)
                        ->where('id <',60)
                        ->join('users','news.news_author = users.user_id','left') // default inner /left / right
                        ->get()
                        ->getResult();

        // if not use get method yet it can be add other method eg. $this->db->where
    }

    function like(){
        // look like search
        return $this->db->table('news')
                        ->like('body','new','both') // %string%. %string after,  string% before
                        ->join('users','news.news_author = users.user_id','left') // default inner /left / right
                        ->get()
                        ->getResult();

    }

    function grouping(){
        // SELECT * FROM news where (id = 25 AND news_date < '2000-01-01 00:00:00') OR news_author =10;
    
        return $this->db->table('news')
                        ->groupStart() // opening a parenthesis
                            ->where(['id >'=>25 , 'news_created_at <' => '2000-01-01 00:00:00'])
                        ->groupEnd() // closing a parenthesis
                        ->orWhere('news_author',10)
                        ->join('users','news.news_author = users.user_id','left') // default inner /left / right
                        ->get()
                        ->getResult();

    }
    
    function wherein(){

        $emails = ['weerayooth.ma@gmail.com','princess.hilpert@example.org','hollie55@example.com'];
    
        return $this->db->table('news')
                        ->groupStart() // opening a parenthesis
                            ->where(['id >'=>25 , 'news_created_at <' => '2000-01-01 00:00:00'])
                        ->groupEnd() // closing a parenthesis
                        ->orWhereIn('user_email',$emails) // 'or' means alternative query
                        ->join('users','news.news_author = users.user_id','left') // default inner /left / right
                        ->limit(5 ,5) // (limit , offset)
                        ->get()
                        ->getResult();

    }

    function getNews(){
        //query builder 
        $builder = $this->db->table('news'); 
        $builder->join('users','news.news_author = users.user_id');
        $news = $builder->get()->getResult();
        return $news;
        
    }

    function getUsers($limit = false){
        $builder = $this->db->table('users'); 

        if ($limit )
            $builder->limit($limit);
        

        $news = $builder->get()->getResult();
        return $news;

    }

    function getAnotherUsers($limit = false){
        $this->db->setDatabase('ci4_login');
        $builder = $this->db->table('users'); 

        if ($limit )
            $builder->limit($limit);
        

        $news = $builder->get()->getResult();
        return $news;

    }

    function createUser(){
        $rand = rand(0,10000);

        $this->db->transStart();

        $data = [
            'user_name'=>'My name is '. $rand,
            'user_email'=>'test'.$rand.'@test.com',
            'user_password' => sha1(time().''.$rand)
        ];

        $builder = $this->db->table('users');
        $id = $builder->insert($data); // or $id = $this->db->insertID

        $postData = [
            'title'=>'Test Title'.$rand,
            'body'=>'News description whatever',
            'news_author'=>$id
        ];

        $builder = $this->db->table('news');
        $id = $builder->insert($postData);
        $this->db->transComplete();

        $this->db->setDatabase('ci4_login');
        $builder = $this->db->table('users');
        $id = $builder->insert($data); // or $id = $this->db->insertID



    }
}