<?php namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\CustomModel;
use CodeIgniter\Controller;

class News extends Controller {
    public function index() {
        $model = new NewsModel();  // สร้าง object instance เพื่อเข้าถึง method ใน model
        
        $db = db_connect();
        $customModel = new CustomModel($db);
        echo '<pre>';
            print_r($customModel->getNews());
        echo '<pre>';

        $data = [
            'news' => $model->getNews(),
            'title' => 'News archive'
        ];

        // don't use lauout
        // echo view('templates/header',$data);
        // echo view('news/overview',$data);
        // echo view('templates/footer',$data);
        
        // use layout
        return view('news/overview',$data);
    }

    public function view($slug = null){
        $model = new NewsModel();
        $data['news'] = $model->getNews($slug);
        if (empty($data['news'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' .$slug);
        }
        
        $data['title'] = $data['news']['title'];
        // echo view('templates/header',$data);
        // echo view('news/view',$data);
        // echo view('templates/footer',$data);

        // use layout
        return view('news/view',$data);
    }
    public function create(){
        $model = new NewsModel();
        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required'
        ])){
            $model->save([
                'title'=>$this->request->getPost('title'),
                'slug' => url_title($this->request->getPost('title') , '-' , TRUE),
                'body'=> $this->request->getPost('body')
            ]);
            echo view('news/success');
        }else{
            // echo view('templates/header',['title' => 'Create a news item']);
            // echo view('news/create');
            // echo view('templates/footer');

            // use layout
            return  view('news/create',['title' => 'Create a news item']);
        }
    }
}