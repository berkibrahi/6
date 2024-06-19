<?php

namespace App\Controllers\Backend;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Libraries\EmailTo;

class Register extends BaseController
{
    protected $validation;
    protected $session;
    protected $userEntity;
    protected $userModel;
    

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->userEntity = new UserEntity();
        $this->userModel = new UserModel();
       
    }
    protected $helpers = ['form'];

    public function index()
    {
        if($this->request->is("post")){
            $data = [
                'first_name' => $this->request->getPost('first_name'),
                'sur_name' => $this->request->getPost('sur_name'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'password2' => $this->request->getPost('password2'),
            ];

            if(!$this->validation->run($data, 'register')){
                $this->session->setFlashdata(['errors' => $this->validation->getErrors()]);
                return redirect()->to(route_to('admin_register'));
            }

            $this->userEntity->setFirstName($data['first_name']);
            $this->userEntity->setSurName($data['sur_name']);
            $this->userEntity->setEmail($data['email']);
            $this->userEntity->setVerifyKey();
            $this->userEntity->setVerifyCode();
            $this->userEntity->setStatus(USER_PENDING);
            $this->userEntity->setPassword($data["password"]);

            $insert = $this->userModel->insert($this->userEntity);

            if($this->userModel->errors()){
                $this->session->setFlashdata(['errors' => $this->userModel->errors()]);
                return redirect()->to(route_to('admin_register'));
            }
            $email=new EmailTo();
            $user= $this->userModel->find($insert);
            $to=$email->settings()->setUser($user)->accountVerify()->send();
             
            if($to){
                $this->session->setFlashdata(['success' =>"Kayıt başarılı bir şekilde oluşturuldu ve E-posta adresine doğrulama maili gönderdik",
             
            ]);
                return redirect()->to(route_to('admin_register'));
            }
            // TODO: Email gönder sistemi yazıldığında bu alana eposta gönderme sistemi ekle

            $this->session->setFlashdata(['errors' => "email gönderiminde bir hata oluştu"]);
            return redirect()->to(route_to('admin_register'));

        }

        return view('admin/pages/auth/register');
    }
}

