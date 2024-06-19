<?php

namespace App\Libraries;

class EmailTo
{
    protected $email;
    protected $user;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function settings()
    {
        $this->email->initialize([
            'protocol' => 'smtp',
            'SMTPHost' => 'sandbox.smtp.mailtrap.io', // SMTP Sunucusu
            'SMTPUser' => '485f26b8a0aff1', // SMTP Kullanıcı adı
            'SMTPPass' => '77d41327ff13a5', // SMTP Şifresi
            'SMTPPort' => 587, // SMTP Portu
            'SMTPTimeout' => 60, // Zaman aşımı
            'mailType' => 'html', // Mail tipi
            'newline' => "\r\n", // Satır sonu karakteri
            'crlf' => "\r\n", // Satır sonu karakteri
            'charset' => 'utf-8' // Karakter seti
        ]);
        $this->email->setFrom('ibo_reis', 'SDCMS Yazılım');
        return $this;
    }

    public function setUser($user)
    {
        $this->user = $user;
        $this->email->setTo($this->user->getEmail());
        return $this;
    }

    public function accountVerify()
    {
        $this->email->setSubject('Hesabınızı Doğrulayın');
        $this->email->setMessage(view('admin/email/account-verify', ['user' => $this->user]));
        return $this;
    }

    public function accountVerifySuccess()
    {
        $this->email->setSubject('Hesabınız Doğrulandı');
        $this->email->setMessage(view('admin/email/account-verify-success', ['user' => $this->user]));
        return $this;
    }

    public function forgotPassword()
    {
        $this->email->setSubject('Şifre Sıfırlama Talebi');
        $this->email->setMessage(view('admin/email/forgot-password', ['user' => $this->user]));
        return $this;
    }

    public function passwordChangeSuccess()
    {
        $this->email->setSubject('Şifre Sıfırlama Talebi');
        $this->email->setMessage(view('admin/email/password-change-success', ['user' => $this->user]));
        return $this;
    }

    public function send()
    {
        if (!$this->email->send()) {
            log_message('error', $this->email->printDebugger(['headers']));
            return false;
        }
        return true;
    }
}

