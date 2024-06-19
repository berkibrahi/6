<?php
return [
    "model"=>[
        "validation"=>[
          
            'group_id' => [
            'integer' => 'Grup ID bir tamsayı olmalıdır.',
            'greater_than_equal_to' => 'Grup ID en az 1 olmalıdır.'
        ],
        'first_name' => [
            'required' => 'Ad alanı zorunludur.',
            'max_length' => 'Ad alanı en fazla 155 karakter olabilir.'
        ],
        'last_name' => [
            'required' => 'Soyad alanı zorunludur.',
            'max_length' => 'Soyad alanı en fazla 155 karakter olabilir.'
        ],
        'email' => [
            'required' => 'E-posta alanı zorunludur.',
            'valid_email' => 'Geçerli bir e-posta adresi girin.',
            'is_unique' => 'Bu e-posta adresi zaten kayıtlı.'
        ],
        'password' => [
            'required' => 'Şifre alanı zorunludur.',
            'min_length' => 'Şifre alanı en az 6 karakter olmalıdır.',
            'max_length' => 'Şifre alanı en fazla 255 karakter olabilir.'
        ],
        'verify_key' => [
            'required' => 'Doğrulama Anahtarı alanı zorunludur.',
            'max_length' => 'Doğrulama Anahtarı alanı en fazla 255 karakter olabilir.'
        ],
        'verify_code' => [
            'integer' => 'Doğrulama Kodu bir tamsayı olmalıdır.',
            'exact_length' => 'Doğrulama Kodu alanı 6 karakter olmalıdır.'
        ],
        'bio' => [
            'max_length' => 'Biyografi alanı en fazla 500 karakter olabilir.'
        ],
        'status' => [
            'required' => 'Durum alanı zorunludur.',
            'in_list' => 'Geçerli bir durum seçin.'
        ]
        ]
    ]
];