<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'company_phone_number' => '+39 353 4404960',

            'company_youtube_promo' => 'https://www.youtube.com/watch?v=nGMYMoj4SIA',

            'company_facebook' => 'https://www.facebook.com/castellofossadalbero/',

            'company_instagram_1' => 'https://www.instagram.com/castellodifossadalbero/',

            'company_instagram_2' => 'https://www.instagram.com/ristorante_castellofossadalber/',

            'company_address' => 'via Aldo Chiorboli, 366, Fossadalbero (FE) - 44123',

            'company_vat' => '00668510381',

            'company_social_capital' => '€ 223.000',

            'company_email_address' => 'info@castellofossadalbero.it',

            'company_newsletter_signup' => 'https://lb.benchmarkemail.com//listbuilder/signupnew?5hjt8JVutE6J5e18QBfmDP5pwVnAjsSItBAEJYwxagrtO5iNRn8gS2fZoZVmvpkrNyIeD9VsXLU%253D',

            'company_business_hours' => 'gio-dom 12:00-15:00 / gio-sab 19:00-22:30',

            'company_wansport' => 'https://fossadalbero.wansport.com/',

            'tennis_promo' => 'La tariffa standard è 16€ dalle 9:00 alle 18:00 e 20€ dalle 18:00 alle 23:00. Per i soci del
            Castello, la tariffa è di 6€ e 10€ per le rispettive fasce orarie. In inverno i campi sono
            accessibili solamente durante il weekend.',

            'company_google_maps' => 'https://maps.app.goo.gl/eN48xHSjSArbX77k6',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
