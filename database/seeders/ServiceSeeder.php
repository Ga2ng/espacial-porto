<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Pemetaan & Survey',
                'slug' => 'pemetaan-survey',
                'description' => 'Layanan kajian dan survey profesional untuk kebutuhan bisnis Anda dengan akurasi tinggi dan data terpercaya.',
                'long_description' => 'Kami menyediakan layanan pemetaan dan survey yang komprehensif untuk berbagai kebutuhan bisnis. Tim ahli kami menggunakan teknologi terkini untuk menghasilkan data yang akurat dan dapat diandalkan.',
                'icon' => 'fas fa-map-marked-alt',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Develop Website',
                'slug' => 'develop-website',
                'description' => 'Pengembangan website modern, responsif, dan user-friendly dengan teknologi terbaru untuk meningkatkan kehadiran digital Anda.',
                'long_description' => 'Kami mengembangkan website yang tidak hanya menarik secara visual, tetapi juga fungsional dan mudah digunakan. Dari website perusahaan hingga e-commerce, kami siap membantu mewujudkan visi digital Anda.',
                'icon' => 'fas fa-laptop-code',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Mobile Apps',
                'slug' => 'mobile-apps',
                'description' => 'Pengembangan aplikasi mobile untuk iOS dan Android dengan performa optimal dan user experience yang luar biasa.',
                'long_description' => 'Aplikasi mobile kami dirancang untuk memberikan pengalaman pengguna yang mulus di berbagai platform. Kami mengembangkan aplikasi native dan cross-platform yang sesuai dengan kebutuhan bisnis Anda.',
                'icon' => 'fas fa-mobile-alt',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Consultant IT',
                'slug' => 'consultant-it',
                'description' => 'Konsultasi IT profesional untuk membantu Anda membuat keputusan teknologi yang tepat dan strategis untuk bisnis.',
                'long_description' => 'Tim konsultan IT kami memiliki pengalaman luas dalam membantu berbagai perusahaan mengoptimalkan infrastruktur teknologi mereka. Dari perencanaan hingga implementasi, kami siap mendampingi Anda.',
                'icon' => 'fas fa-user-tie',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
