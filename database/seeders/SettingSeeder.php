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
            'company_phone_number' => '',
            'company_youtube_promo' => '',
            'company_facebook' => '',
            'company_instagram_1' => '',
            'company_instagram_2' => '',
            'company_address' => '',
            'company_vat' => '',
            'company_social_capital' => '',
            'company_email' => '',
            'company_newsletter_signup' => '',
            'company_business_hours' => '',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
