<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class UserEntity extends Entity
{
    
    protected $id;
    protected $group_id;
    protected $first_name;
    protected $sur_name;
    protected $email;
    protected $password;
    protected $verify_key;
    protected $verify_code;
    protected $bio;
    protected $status;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function getID()
    {
        return $this->attributes['id'];
    }

    public function getGroupID()
    {
        return $this->attributes['group_id'];
    }

    public function getFirstName()
    {
        return $this->attributes['first_name'];
    }

    public function getSurName()
    {
        return $this->attributes['sur_name'];
    }

    public function getFullName()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['sur_name'];
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }
    public function getVerifyToken(){
       $token= $this->attributes["id"]. ".". $this->attributes["verify_key"];
       return $token;
    }

    public function getVerifyKey()
    {
        return $this->attributes['verify_key'];
    }

    public function getVerifyCode()
    {
        return $this->attributes['verify_code'];
    }

    public function getBio()
    {
        return $this->attributes['bio'];
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function getCreatedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['created_at']);
            return $date->humanize();
        }

        return $this->attributes['created_at'];
    }

    public function getUpdatedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['updated_at']);
            return $date->humanize();
        }

        return $this->attributes['updated_at'];
    }

    public function getDeletedAt($humanize = false)
    {
        if($humanize){
            $date = Time::parse($this->attributes['deleted_at']);
            return $date->humanize();
        }

        return $this->attributes['deleted_at'];
    }

    public function setGroupID( $group_id){
        $this->attributes['group_id'] = $group_id;
    }

    public function setFirstName( $first_name)
    {
        $this->attributes['first_name'] = $first_name;
    }

    public function setSurName( $sur_name)
    {
        $this->attributes['sur_name'] = $sur_name;
    }

    public function setEmail( $email)
    {
        $this->attributes['email'] = $email;
    }

    public function setVerifyKey()
    {
        helper('text');
        $this->attributes['verify_key'] = random_string('alpha', 64);
    }

    public function setVerifyCode()
    {
        $this->attributes['verify_code'] = random_int(100000, 999999);
    }

    public function setBio( $bio)
    {
        $this->attributes['bio'] = $bio;
    }

    public function setStatus($status = USER_PENDING){
        $this->attributes['status'] = $status;
    }

    public function setDeletedAt()
    {
        $this->attributes['deleted_at'] =  date('Y-m-d H:i:s');
    }

    public function setPassword( $password)
    {
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }
 }