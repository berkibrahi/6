<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
    public $register = [
        'first_name' => [
         
           
            'rules' => 'required|alpha_space|min_length[2]',
            'errors' => [
                'required' => 'Ad alanı zorunludur.',
                'alpha_space' => 'Ad sadece harf ve boşluk içerebilir.',
                'min_length' => 'Ad en az 2 karakter uzunluğunda olmalıdır.'
            ]
        ],
        'sur_name' => [
           
            'rules' => 'required|alpha_space|min_length[2]',
            'errors' => [
                'required' => 'Soyad alanı zorunludur.',
                'alpha_space' => 'Soyad sadece harf ve boşluk içerebilir.',
                'min_length' => 'Soyad en az 2 karakter uzunluğunda olmalıdır.'
            ]
        ],
        'email' => [
            
           
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email alanı zorunludur.',
                'valid_email' => 'Geçerli bir email adresi girin.'
            ]
        ],
        'password' => [
           
           
           
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'Şifre alanı zorunludur.',
                'min_length' => 'Şifre en az 6 karakter uzunluğunda olmalıdır.'
            ]
        ],
        'password2' => [
          
            
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => 'Şifre doğrulama alanı zorunludur.',
                'matches' => 'Şifreler eşleşmiyor.'
            ]
        ]
    ];

public $forgot=[
    'email' => [
            
           
        'rules' => 'required|valid_email',
        'errors' => [
            'required' => 'Email alanı zorunludur.',
            'valid_email' => 'Geçerli bir email adresi girin.'
        ]
    ],
];
    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
