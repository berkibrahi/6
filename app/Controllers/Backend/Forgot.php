<?php


namespace App\Controllers\Backend;

use \App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Libraries\EmailTo;
use App\Models\UserModel;
use Predis\Command\Argument\Server\To;

class Forgot extends BaseController
{
    protected $validation;
    protected $session;
    protected $userModel;
    protected $emailTo;
    protected $userEntity;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
        $this->emailTo = new EmailTo();
        $this->userEntity=new UserEntity();
    }

    public function index()
    {
        if($this->request->is("post")){

            $data = [
              'email' => $this->request->getPost('email')
            ];

            if(!$this->validation->run($data, 'forgot')){
                $this->session->setFlashdata(['errors' => $this->validation->getErrors()]);
                return redirect()->to(route_to('admin_forgot_password'));
            }

            $user = $this->userModel->where('email',$data['email'])->first();
            if (!$user){
                $this->session->setFlashdata(['errors' => 'Böyle bir kullanıcı bulunamadı.']);
                return redirect()->to(route_to('admin_forgot_password'));
            }

            $send = $this->emailTo->settings()->setUser($user)->forgotPassword()->send();
            if(!$send){
                $this->session->setFlashdata(['errors' => 'Email gönderilemedi, Lütfen daha sonra tekrar deneyin.']);
                return redirect()->to(route_to('admin_forgot_password'));
            }

            return view('admin/pages/verify/password-success');

        }

        return view('admin/pages/auth/forgot');
    }

    public function resetPassword()
    {
        $tempData=$this->session->getTempdata("userId");
        if($tempData){
            if($this->request->is("post")){
                $data = [
                    'password' => $this->request->getPost('password'),
                    'password2' => $this->request->getPost('password2')
                  ];
                  if(!$this->validation->run($data, 'resetPassword')){
                    $this->session->setFlashdata(['errors' => $this->validation->getErrors()]);
                    return redirect()->to(route_to('admin_reset_password'));
                }
                $this->userEntity->setVerifyKey();
                $this->userEntity->setPassword($data["password"]);
                $update=$this->userModel->update($tempData,$this->userEntity);
                if(!$update){
                    return redirect()->to(route_to("admin_reset_password"));
                }
                $this->session->destroy();
                return view("admin/pages/verify/reset-password-success");
            }
            return view("admin/pages/auth/reset-password");
        }
        return view("admin/pages/verify/reset-password-error");
       
    }


}