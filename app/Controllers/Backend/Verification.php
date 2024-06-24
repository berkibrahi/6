<?php
namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Entities\UserEntity;
use App\Models\UserModel;

class Verification extends BaseController{
    protected $userModel;
    protected $userEntity;
    public function __construct()
    {
        $this->userModel=new UserModel();
        $this->userEntity=new UserEntity();

        
    }

    public function account($token){
        $explode=explode(".",$token);
        if(!isset($explode[1]) || !isset($explode[0])){
            return view('admin/pages/verify/account-error');
        }
        $userId=$explode[0];
        $verifyKey=$explode[1];
       $user= $this->userModel->where([
            "id"=>$userId,
            "verify_key"=>$verifyKey,
            "status"=>USER_PENDING
        ])->first();
        if(!$user){
            return view("admin/pages/verify/account-error");
        }
        
        $this->userEntity->setStatus(USER_ACTIVE);
        $this->userEntity->setVerifyKey();
        $update=$this->userModel->update($userId,$this->userEntity);
        if(!$update){
            return view("admin/pages/verify/account-error");
        }
       return view("admin/pages/verify/account-success");
     //  print_r(base64_decode($token));
}
public function forgot($token){
    
 $explode=explode(".",$token);
 if(!isset($explode[1]) || !isset($explode[0])){
    return view('admin/pages/verify/account-error');
}
        $userId=$explode[0];
        $verifyKey=$explode[1];
       $user= $this->userModel->where([
            "id"=>$userId,
            "verify_key"=>$verifyKey,
           
        ])->first();
        if(!$user){
            return view("admin/pages/verify/password-error");
        }
        
      
        $this->userEntity->setVerifyKey();
        $update=$this->userModel->update($userId,$this->userEntity);
        if(!$update){
            return view("admin/pages/verify/password-error");
        }
        $session = session();

        // Geçici veriyi oturuma ayarlayın
        $session->setTempdata([
            'userId' => $userId,
            'verifyKey' => $this->userEntity->getVerifyKey()
        ], null, 300);
       return redirect()->to(route_to("admin_reset_password"));
}
}