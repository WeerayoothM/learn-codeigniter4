<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller {
    public function index(){
        // load include helper form eg. validataion lib
        helper(['form']);
        $data =[];

        $data['categories']= [
			'Student',
			'Teacher',
			'Principle'
		];

        if ($this->request->getMethod() == 'post'){
            $rules = [
                'email'=>[
                    'rules'=>'required|valid_email',
                    'label'=>'Email',
                    'errors'=>[
                        'required'=>'Hey, Email is a required filed',
                        'valid_email'=>'Oh, man, really?? Pls, add a valid email'
                    ]

                ],
                'password'=>'required|min_length[6]',
                'category' => 'in_list[Student, Teacher]', // accept 2 cat and ignore principle from harm input
                'date'=>[
                    'rules'=>'required|check_date',
                    'label'=>'Date',  // eg. name, email, password label in error message
                    'errors'=>[
                        'check_date'=>'You can not add a date before today'
                    ]
                ] // check_date is a custom validator in Validations folder
            ];
            if ($this->validate($rules)){
                // then do database insertion
                // Login user
            }else{
                $data['validation']= $this->validator;
            }
        }

        // if ($_POST) {
        //     echo '<pre>';
        //         print_r($_POST);
        //     echo '<pre>';
        // }
        echo view('pages/auth/login',$data);
    }

    public function auth(){
        // ถ้าไม่มี session ห้ามไป หน้า dashboard
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('user_email',$email)->first();
        if ($data){
            $pass = $data['user_password'];
            $verify_password = password_verify($password,$pass);
            if ($verify_password){
                $ses_data = [
                    'user_id' => $data['user_id'],
                    'user_name' => $data['user_name'],
                    'user_email' => $data['user_email'],
                    'logged_in' => true,
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            }else {
                $session->setFlashdata('msg','Wrong password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg','Email not found');
            return redirect()->to('/login');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');

    }
}