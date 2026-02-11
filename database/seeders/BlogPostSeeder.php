<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Pentingnya Pemetaan Lahan untuk Perencanaan Pembangunan',
                'excerpt' => 'Pemetaan lahan yang akurat menjadi fondasi utama dalam perencanaan pembangunan infrastruktur dan tata ruang. Simak manfaat dan tahapannya.',
                'content' => "<p>Pemetaan lahan merupakan langkah awal yang krusial dalam setiap proyek pembangunan. Dengan data spasial yang akurat, para perencana dapat mengambil keputusan yang tepat dan meminimalkan risiko kesalahan.</p><p>Beberapa manfaat pemetaan lahan antara lain: identifikasi batas wilayah, analisis topografi, perencanaan drainase, serta dasar hukum dalam perizinan. Teknologi seperti drone dan GIS semakin memudahkan proses pengukuran di lapangan.</p><p>Espacial menyediakan jasa pemetaan dan survey yang terintegrasi dengan sistem informasi geografis untuk mendukung proyek Anda dari hulu ke hilir.</p>",
                'category' => 'Pemetaan & Survey',
                'tags' => 'pemetaan, survey, GIS, lahan, infrastruktur',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(12),
            ],
            [
                'title' => 'Tips Memilih Jasa Pembuatan Website Profesional',
                'excerpt' => 'Website yang baik tidak sekadar tampil menarik. Pelajari kriteria memilih vendor pengembangan website yang tepat untuk bisnis Anda.',
                'content' => "<p>Memilih jasa pembuatan website tidak boleh asal. Pertimbangkan portofolio, teknologi yang digunakan, serta dukungan pascalaunch.</p><p>Pastikan vendor memahami kebutuhan bisnis Anda, menyediakan desain responsif, dan mengutamakan kecepatan serta keamanan. Website modern juga sebaiknya ramah SEO agar mudah ditemukan di mesin pencari.</p><p>Dengan pengalaman mengerjakan berbagai proyek website perusahaan dan institusi, Espacial siap membantu merealisasikan website impian Anda.</p>",
                'category' => 'Website',
                'tags' => 'website, development, bisnis, responsive, SEO',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'Peran Konsultan dalam Proyek Konstruksi dan Tata Ruang',
                'excerpt' => 'Konsultan tidak hanya memberi rekomendasi teknis, tetapi juga memastikan proyek berjalan sesuai regulasi dan best practice. Berikut peran dan nilai tambahnya.',
                'content' => "<p>Konsultan konstruksi dan tata ruang berperan dari fase perencanaan, pengawasan, hingga evaluasi pascakonstruksi. Mereka memastikan desain sesuai dengan peraturan dan standar yang berlaku.</p><p>Dengan pendekatan multidisiplin, konsultan dapat mengintegrasikan aspek teknis, lingkungan, dan sosial ekonomi. Hasilnya, proyek lebih terarah, efisien, dan berkelanjutan.</p><p>Espacial menawarkan layanan konsultasi untuk proyek pemetaan, pengembangan sistem, dan perencanaan tata ruang dengan tim yang berpengalaman.</p>",
                'category' => 'Konsultasi',
                'tags' => 'konsultan, konstruksi, tata ruang, perencanaan',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(8),
            ],
            [
                'title' => 'Mengenal Teknologi GIS untuk Pengelolaan Data Spasial',
                'excerpt' => 'Geographic Information System (GIS) mengubah cara kita melihat dan mengelola data berbasis lokasi. Pelajari kegunaannya dalam berbagai sektor.',
                'content' => "<p>GIS memungkinkan pengumpulan, penyimpanan, analisis, dan visualisasi data geografis dalam satu platform. Aplikasinya mencakup pertanian, transportasi, bencana, kesehatan, dan pemerintahan.</p><p>Dengan peta interaktif dan lapisan data yang dapat di-overlay, pengambilan keputusan berbasis lokasi menjadi lebih akurat dan transparan. Pelatihan dan implementasi GIS juga menjadi bagian dari layanan Espacial.</p>",
                'category' => 'Pemetaan & Survey',
                'tags' => 'GIS, peta, data spasial, analisis',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => 'Website Perusahaan: Investasi Jangka Panjang untuk Kredibilitas',
                'excerpt' => 'Website perusahaan bukan sekadar pajangan. Ia menjadi wajah digital dan alat pemasaran yang bekerja 24 jam. Mengapa penting dan apa yang harus ada di dalamnya?',
                'content' => "<p>Di era digital, calon klien dan mitra sering kali menilai kredibilitas perusahaan dari website. Situs yang profesional, informatif, dan mudah diakses meningkatkan kepercayaan.</p><p>Selain profil perusahaan dan layanan, sertakan portofolio, testimoni, dan kontak yang jelas. Blog dan artikel juga membantu SEO dan positioning sebagai ahli di bidang Anda.</p><p>Espacial membantu berbagai jenis bisnis membangun website yang tidak hanya cantik, tetapi juga mendukung tujuan bisnis.</p>",
                'category' => 'Website',
                'tags' => 'website perusahaan, kredibilitas, branding, portofolio',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Survey Topografi: Dasar Akurat untuk Desain Konstruksi',
                'excerpt' => 'Survey topografi menghasilkan peta kontur dan data ketinggian yang menjadi acuan desain jalan, bangunan, dan jaringan. Kenali tahapan dan alat yang digunakan.',
                'content' => "<p>Survey topografi mengukur bentuk dan elevasi permukaan tanah di suatu area. Hasilnya berupa peta kontur, cross section, dan model 3D yang dibutuhkan oleh insinyur sipil dan arsitek.</p><p>Alat seperti total station, GPS geodetik, dan drone LiDAR semakin mempercepat dan mempermudah pengukuran. Akurasi data menjadi kunci keberhasilan proyek konstruksi.</p><p>Tim survey Espacial berpengalaman dalam proyek jalan, bendungan, perkebunan, dan pembangunan fasilitas umum.</p>",
                'category' => 'Pemetaan & Survey',
                'tags' => 'survey, topografi, kontur, konstruksi',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(4),
            ],
            [
                'title' => 'Keunggulan Website Responsif di Era Mobile-First',
                'excerpt' => 'Lebih banyak pengguna mengakses internet lewat ponsel. Website responsif bukan lagi opsi, melainkan keharusan. Simak manfaat dan prinsip dasarnya.',
                'content' => "<p>Website responsif menyesuaikan tampilan dengan ukuran layar perangkat—desktop, tablet, atau ponsel. Pengalaman pengguna tetap nyaman dan konten mudah diakses.</p><p>Selain meningkatkan engagement, desain responsif juga berpengaruh pada peringkat Google. Mesin pencari mengutamakan situs yang mobile-friendly. Investasi di awal akan terbayar dengan traffic dan konversi yang lebih baik.</p>",
                'category' => 'Website',
                'tags' => 'responsif, mobile, UX, Google',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Integrasi Data Spasial dengan Sistem Informasi Perusahaan',
                'excerpt' => 'Menggabungkan data peta dan GIS dengan sistem ERP atau CRM membuka peluang analisis lokasi untuk operasional dan pemasaran. Bagaimana memulainya?',
                'content' => "<p>Data spasial tidak hanya untuk departemen teknis. Divisi pemasaran, logistik, dan manajemen dapat memanfaatkan peta untuk perencanaan rute, penetapan wilayah penjualan, dan pemantauan aset.</p><p>Integrasi GIS dengan sistem informasi existing membutuhkan arsitektur yang tepat dan format data yang kompatibel. Konsultan yang memahami baik GIS maupun software development dapat memandu proses ini.</p>",
                'category' => 'Konsultasi',
                'tags' => 'GIS, integrasi, ERP, data spasial',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Portofolio Digital: Cara Memamerkan Proyek ke Calon Klien',
                'excerpt' => 'Portofolio yang rapi dan mudah diakses memperbesar peluang Anda dilirik klien. Berikut tips menyusun portofolio proyek di website atau platform digital.',
                'content' => "<p>Portofolio digital memungkinkan calon klien melihat kemampuan Anda tanpa harus bertemu. Sertakan ringkasan proyek, foto atau screenshot, teknologi yang dipakai, dan hasil yang dicapai.</p><p>Kategorikan berdasarkan jenis layanan atau industri. Update secara berkala dan sertakan testimoni atau link ke proyek live jika ada. Espacial memastikan setiap proyek yang kami kerjakan terdokumentasi dengan baik di situs kami.</p>",
                'category' => 'Website',
                'tags' => 'portofolio, branding, klien, pemasaran',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDay(),
            ],
            [
                'title' => 'Espacial Artwork: Layanan Pemetaan, Website, dan Konsultasi Terpadu',
                'excerpt' => 'Satu tim, berbagai layanan: dari pemetaan dan survey, pengembangan website, hingga konsultasi tata ruang dan sistem. Kenali layanan Espacial dan kapan Anda membutuhkannya.',
                'content' => "<p>Espacial menyatukan keahlian di bidang pemetaan & survey, pengembangan website, dan konsultasi. Dengan pendekatan terpadu, kami dapat mendampingi klien dari fase perencanaan hingga implementasi dan pemeliharaan.</p><p>Baik Anda membutuhkan peta tematik, website perusahaan, sistem informasi berbasis peta, atau rekomendasi teknis untuk proyek konstruksi—tim kami siap mendukung. Hubungi kami untuk diskusi kebutuhan proyek Anda.</p>",
                'category' => 'Layanan',
                'tags' => 'Espacial, pemetaan, website, konsultasi, layanan',
                'is_featured' => true,
                'published_at' => Carbon::now(),
            ],
        ];

        foreach ($posts as $index => $post) {
            BlogPost::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($post['title'])],
                array_merge($post, [
                    'is_published' => true,
                    'featured_image' => null,
                    'views' => rand(50, 1200),
                ])
            );
        }
    }
}
