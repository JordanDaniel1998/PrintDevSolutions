<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Information::insert([
            'address' => 'Av. Aramburú 1506',
            'inside' => 'Oficina 404 - Piso 4',
            'district' => 'Miraflores',
            'city' => 'Lima',
            'country' => 'Perú',
            'cellphone' => '+51 987654321',
            'office_phone' => '+51 987654321' ,
            'email' => 'hola@hola.com',
            'facebook' => 'www.facebook.com',
            'instagram' => 'www.instagram.com',
            'youtube' => 'www.youtube.com',
            'twitter' => 'www.twitter.com',
            'linkedin' => 'www.linkedin.com',
            'tiktok' => 'www.tiktok.com',
            'whatsapp' => '987654123' ,
            'check_in' => '9:00 am',
            'check_out' => '8:00 pm',
            'message_whatsapp' => 'Hola estamos atentos a lo que ud desee',
            'aboutUs' => 'Hola, somos una empresa que se dedica ......'
        ]);
    }
}