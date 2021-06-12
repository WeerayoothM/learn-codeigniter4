<?php namespace App\Controllers;

use App\Models\NameModel;
use CodeIgniter\Controller;

class NamesCrud extends Controller {

    //show name list
    public function index(){
        $NameModel = new NameModel();
        $data['users'] = $NameModel->orderBy('id','DESC')->findAll();
        return view('pages/namelist/namelist',$data);
    }

    // add name form
    public function create(){
        return view('pages/namelist/addname');
    }

    // add data
    public function store(){
        $NameModel = new NameModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'=> $this->request->getVar('email')
        ];
        $NameModel->insert($data);
        return $this->response->redirect(site_url('/namelist'));  //site_url == your url website
    }

    // show single name
    public function singleUser($id = null){
        $NameModel = new NameModel();
        $data['user_obj'] = $NameModel->where('id',$id)->first();
        return view('pages/namelist/editname',$data);
    }

    // update name data
    public function update(){
        $NameModel = new NameModel();
        $id = $this->request->getVar('id');
        $data = [
            'name'=>$this->request->getVar('name'),
            'email'=>$this->request->getVar('email')
        ];
        $NameModel->update($id,$data);
        return $this->response->redirect(site_url('/namelist'));
    }

    // delete name
    public function delete($id  = null){
        $NameModel = new NameModel();
        $data['user'] = $NameModel->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/namelist'));
    }
}