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
                /* 
                'email'=>[
                    'rules'=>'required|valid_email',
                    //? ------- Custom Validation  --------
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
                ] // check_date is a custom validator in Validations folder*/

                // ! file is the global file variable we cannot use required rule | max_size in kilo byte
                // 'theFile'=>[
                //     'rules'=>'uploaded[theFile]|max_size[theFile,1024]|is_image[theFile]|max_dims[theFile,200,200]|ext_in[theFile,jpg,png]',
                //     'label'=>'The File'
                // ]
                // multiple uploaded

                //! uploaded[theFile.0] check at least 1 file uploaded
                'theFile'=>[
                    'rules'=>'uploaded[theFile.0]|max_size[theFile,1024]|is_image[theFile]',
                    'label'=>'The File'
                ]
            ];
            if ($this->validate($rules)){
                /* single uploaded
                     $file = $this->request->getFile('theFile');
                    if ($file->isValid() && !$file->hasMoved()){
                    //? define our image name and then codeigniter will generate number of extension testName_1
                    // $file->move('./uploads/images', 'testName.'.$file->getExtension());
                    $file->move('./uploads/images', $file->getRandomName());
                    }
                 */

                 // multiple uploaded
                 $files = $this->request->getFiles();
                 foreach ($files['theFile'] as $file ){
                    if ($file->isValid() && !$file->hasMoved()){
                        echo $file->getName().' - Real name<br> ';
                        $file->move('./uploads/images/multiple');
                        echo $file->getName().' - New name <br> <hr>';
                        //! if want to insert the name of the file to db you should 
                        //! always use the getName method after move the file to new location

                    }
                 }
                 
                 exit();
                

                return redirect()->to('/login/success');
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

    public function success(){
        echo 'Hey, you have pass the validation Congrats!';
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