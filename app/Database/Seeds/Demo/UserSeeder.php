<?php namespace App\Database\Seeds\Demo;

use CodeIgniter\Database\Seeder;


class UserSeeder extends Seeder
{
    public function run()
    {
        helper('text');
        
        $faker = \Faker\Factory::create('tr_TR');
       
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'group_id' => null,
                
                'first_name' => $faker->firstName,
                'sur_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'verify_key' => random_string('alpha', 64),
                'verify_code' => random_int(100000, 999999),
                'bio' => 'Ben İbrahim Berk, yazılım mühendisliği 3. sınıf öğrencisiyim. Yazılım geliştirme, problem çözme ve yeni teknolojiler öğrenme konularında tutkuluyum. Özellikle web ve mobil uygulama geliştirme alanlarında projeler üzerinde çalışıyorum. Ayrıca algoritma ve veri yapıları konularında güçlü bir bilgi birikimine sahibim. Gelecekte teknoloji dünyasında yenilikçi çözümler üretmeyi hedefliyorum.',
                'status' => USER_ACTIVE,
            ];
            $this->db->table('users')->insert($data);
        }
    }
}
