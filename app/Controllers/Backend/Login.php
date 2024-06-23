<?php
namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Login extends BaseController{
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
    public function index(){
        if($this->request->is("post")){

            $data = [
              'email' => $this->request->getPost('email'),
              'password' => $this->request->getPost('password')
            ];
            if(!$this->validation->run($data, 'login')){
                $this->session->setFlashdata(['errors' => $this->validation->getErrors()]);
                return redirect()->to(route_to('admin_login'));
            }
            $user = $this->userModel->where('email',$data['email'])->first();
            if (!$user){
                $this->session->setFlashdata(['errors' => 'Böyle bir kullanıcı bulunamadı.']);
                return redirect()->to(route_to('admin_login'));
            }
            if ($user->getStatus()==USER_PENDING){
                $this->session->setFlashdata(['errors' => 'e-posta doğrulaması gerekli']);
                return redirect()->to(route_to('admin_login'));
            }
            if ($user->getStatus()==USER_PASSIVE){
                $this->session->setFlashdata(['errors' => 'hesabınız pasif halde yönetici ile iletişime geçin']);
                return redirect()->to(route_to('admin_login'));
            }
        // TODO: İzin sistemi entegre edildiğinde session'a izinlerin eklenmesi gerekiyor.
        $this->session->set([
            'isLogin' => true,
            'userData' => [
                'id' => $user->id,
                'email' => $user->getEmail(),
                'name'  => $user->getFullName()
            ]
        ]);

        // TODO: Dashboard sayfası veya controller hazırlandığında kullanıcı oraya yönlendirilecek.
        return redirect()->to(route_to("admin_dashboard"));

    }
    return view('admin/pages/auth/login', [
        'time' => new Time('now')
    ]);
    }
    public function logout(){
        session()->destroy();
        return redirect()->to(route_to("admin_logout"));
    }
}