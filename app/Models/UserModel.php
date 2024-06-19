<?php


namespace App\Models;

use App\Entities\UserEntity;
use \CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $returnType = UserEntity::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'group_id',
        'first_name',
        'sur_name',
        'email',
        'password',
        'verify_key',
        'verify_code',
        'bio',
        'status',
        'deleted_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    /**
     * TODO: Group tablosu oluşturulduğunda group_id kuralları eklenecek;
     */
    protected $validationRules = [
        'first_name' => 'required|string|min_length[3]',
        'sur_name' => 'required|string|min_length[3]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required',
        'verify_key' => 'required|alpha',
        'verify_code' => 'numeric|min_length[6]',
        'status' => 'required'
    ];

    /**
     * TODO: Group tablosu oluşturulduğunda group_id mesajları eklenecek;
     */
    protected $validationMessages = [
        'first_name'    => [
            'required'  => 'User.model.validation.first_name.required',
            'string'    => 'User.model.validation.first_name.string',
            'min_length'    =>  'User.model.validation.first_name.min_length',
        ],
        'sur_name'      => [
            'required'  =>  'User.model.validation.sur_name.required',
            'string'    =>  'User.model.validation.sur_name.string',
            'min_length'    =>  'User.model.validation.sur_name.min_length',
        ],
        'email' => [
            'required' => 'User.model.validation.email.required',
            'valid_email'   =>  'User.model.validation.email.valid_email',
            'is_unique' =>  'User.model.validation.email.is_unique',
        ],
        'password'  =>  [
            'required'  =>  'User.model.validation.password.required',
        ],
        'verify_key' =>  [
            'required'  =>  'User.model.validation.verif_key.required',
            'alpha' =>  'User.model.validation.verif_key.alpha',
        ],
        'verify_code' => [
            'numeric'   =>  'User.model.validation.verif_code.numeric',
            'min_length'    =>  'User.model.validation.verif_code.min_length',
        ],
        'status'    =>  [
            'required'  =>  'User.model.validation.status.required',
        ]
    ];
}