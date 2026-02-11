<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Framework & tools dari berbagai bahasa pemrograman.
     * Icon: Font Awesome (fab = brands, fas = solid).
     */
    public function run(): void
    {
        $tools = [
            // JavaScript / Node
            ['name' => 'Node.js', 'icon' => 'fab fa-node-js'],
            ['name' => 'React', 'icon' => 'fab fa-react'],
            ['name' => 'Vue.js', 'icon' => 'fab fa-vuejs'],
            ['name' => 'Angular', 'icon' => 'fab fa-angular'],
            ['name' => 'jQuery', 'icon' => 'fab fa-js'],
            ['name' => 'JavaScript', 'icon' => 'fab fa-js'],
            ['name' => 'TypeScript', 'icon' => 'fas fa-code'],
            ['name' => 'Express.js', 'icon' => 'fas fa-server'],
            ['name' => 'Next.js', 'icon' => 'fas fa-window-maximize'],
            ['name' => 'Nuxt.js', 'icon' => 'fab fa-vuejs'],
            ['name' => 'npm', 'icon' => 'fab fa-npm'],
            ['name' => 'Yarn', 'icon' => 'fas fa-box'],
            // PHP / Laravel
            ['name' => 'PHP', 'icon' => 'fab fa-php'],
            ['name' => 'Laravel', 'icon' => 'fab fa-laravel'],
            ['name' => 'Composer', 'icon' => 'fas fa-box'],
            ['name' => 'Symfony', 'icon' => 'fab fa-symfony'],
            // Python
            ['name' => 'Python', 'icon' => 'fab fa-python'],
            ['name' => 'Django', 'icon' => 'fas fa-bolt'],
            ['name' => 'Flask', 'icon' => 'fas fa-flask'],
            ['name' => 'FastAPI', 'icon' => 'fas fa-rocket'],
            // Database
            ['name' => 'MySQL', 'icon' => 'fas fa-database'],
            ['name' => 'PostgreSQL', 'icon' => 'fas fa-database'],
            ['name' => 'MongoDB', 'icon' => 'fas fa-database'],
            ['name' => 'Redis', 'icon' => 'fas fa-database'],
            ['name' => 'SQLite', 'icon' => 'fas fa-database'],
            // CSS / Frontend
            ['name' => 'Bootstrap', 'icon' => 'fab fa-bootstrap'],
            ['name' => 'Tailwind CSS', 'icon' => 'fas fa-palette'],
            ['name' => 'Sass', 'icon' => 'fab fa-sass'],
            ['name' => 'CSS3', 'icon' => 'fab fa-css3-alt'],
            ['name' => 'HTML5', 'icon' => 'fab fa-html5'],
            // DevOps / Tools
            ['name' => 'Docker', 'icon' => 'fab fa-docker'],
            ['name' => 'Git', 'icon' => 'fab fa-git-alt'],
            ['name' => 'GitHub', 'icon' => 'fab fa-github'],
            ['name' => 'GitLab', 'icon' => 'fab fa-gitlab'],
            ['name' => 'AWS', 'icon' => 'fab fa-aws'],
            ['name' => 'Linux', 'icon' => 'fab fa-linux'],
            ['name' => 'Nginx', 'icon' => 'fas fa-server'],
            ['name' => 'Apache', 'icon' => 'fas fa-server'],
            // Mobile / Lain
            ['name' => 'Flutter', 'icon' => 'fas fa-mobile-alt'],
            ['name' => 'React Native', 'icon' => 'fab fa-react'],
            ['name' => 'GraphQL', 'icon' => 'fas fa-project-diagram'],
            ['name' => 'REST API', 'icon' => 'fas fa-plug'],
            ['name' => 'Webpack', 'icon' => 'fas fa-cube'],
            ['name' => 'Vite', 'icon' => 'fas fa-bolt'],
            ['name' => 'Figma', 'icon' => 'fab fa-figma'],
        ];

        foreach ($tools as $tool) {
            Tool::firstOrCreate(
                ['name' => $tool['name']],
                ['icon' => $tool['icon']]
            );
        }
    }
}
