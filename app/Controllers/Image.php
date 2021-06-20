<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Image extends Controller {
    public function index(){
        // load include helper form eg. validataion lib
        helper(['form', 'image']);
        $data =[];

        if ($this->request->getMethod() == 'post'){
            $rules = [
                // ! file is the global file variable we cannot use required rule | max_size in kilo byte
                // 'theFile'=>[
                //     'rules'=>'uploaded[theFile]|max_size[theFile,1024]|is_image[theFile]|max_dims[theFile,200,200]|ext_in[theFile,jpg,png]',
                //     'label'=>'The File'
                // ]
                // multiple uploaded

                //! uploaded[theFile.0] check at least 1 file uploaded
                'theFile'=>[
                    'rules'=>'uploaded[theFile.0]|is_image[theFile]',
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
                 $path = './uploads/images/manipulated/';
                 $files = $this->request->getFiles();

                 $imageService = service('image');
                 foreach ($files['theFile'] as $file ){
                    if ($file->isValid() && !$file->hasMoved()){

                        $file->move($path);
                        $fileName = $file->getName();
                        $data['image'] = $fileName;

                        $this->imageManipulation($path,'thumbs',$fileName,$imageService);
                        $data['folders'][] = 'thumbs';

                        $this->imageManipulation($path,'flip',$fileName,$imageService);
                        $data['folders'][] = 'flip';

                        $this->imageManipulation($path,'rotate',$fileName,$imageService);
                        $data['folders'][] = 'rotate';

                        // if (!file_exists($path . 'thumbs/')){
                        //     mkdir($path . 'thumbs/',0777); // 755 is the permission
                        // }
                        // $image->withFile(src($fileName))
                        //     ->fit(150,150,'center')
                        //     ->save($path . 'thumbs/' . $fileName); // save method not create directory

                        // fit => crop method

                        //! if want to insert the name of the file to db you should 
                        //! always use the getName method after move the file to new location

                    }
                 }
                 
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
        return view('pages/auth/image',$data);
    }

    private function imageManipulation($path , $folder, $fileName,$imageService){
        $savePath = $path . '/' . $folder;

        if (!file_exists($savePath)){
            mkdir($savePath,0777); // 0777 is the permission
        }
        $imageService->withFile(src($fileName));
        
        switch($folder){
            case 'thumbs':
                $imageService->fit(150, 150);
                break;
            case 'flip':
                $imageService->flip('horizontal');
                $imageService->fit(150, 90,'top-right');
                break;
            case 'rotate':
                $imageService->rotate(90);
                break;

        }
        return $imageService->save($savePath . '/' . $fileName);
    }

}