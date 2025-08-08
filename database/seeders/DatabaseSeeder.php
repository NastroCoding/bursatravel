<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User
        DB::table('users')->insert([
            'email' => 'kelimatuadmin@kelimatu.com',
            'password' => Hash::make('travel&tourkelimatu24')
        ]);

        // Config
        DB::table('configs')->insert([
            'address' => 'Jl. Peningkatan Raya No. 28 Menteng Dalam, Tebet Jakarta Selatan',
            'whatsapp_num' => '081933995573',
            'visi' => 'Memberikan layanan perjalanan ibadah umroh haji terbaik, mudah dan nyaman dengan mengedepankan nilai-nilai spiritual sebagai keunggulan perusahaan.',
            'misi' => "Memberikan pelayanan yang melebihi kepuasan jamaah dengan penuh amanah, kesetiaan, dan mengharapkan ridho dari Allah Subhanahu Wata'ala.",
            'history' => 'Pada akuisisi saham PT. Emaar Pesona Wisata, pengurus baru PT. Emaar Pesona Wisata telah mengubah branding nama menjadi "Kelimatu Travel & Tours", dengan domisili yang tetap, serta memiliki izin PPIU (Penyelenggara Perjalanan Ibadah Umroh) dari Kementerian Agama RI dengan nomor 12860016215810006. Kami fokus pada penyediaan produk perjalanan ibadah umroh. Insya allah dalam waktu dekat kami akan segera mengurus PIHK (Penyelenggara Ibadah Haji Khusus)',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.90209824202327!2d106.84648490626037!3d-6.228946038477268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f39231e44cfd%3A0xc599df0bb0956bf4!2sJl.%20Persada%20Raya%20No.70%2C%20RT.3%2FRW.15%2C%20Kuningan%2C%20Menteng%20Dalam%2C%20Kec.%20Tebet%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012870!5e0!3m2!1sen!2sid!4v1720001500411!5m2!1sen!2sid',
            'operational' => 'Senin-Jumat, 09.00 - 18.00
            Sabtu, 09.00 - 18.00
            Minggu, 09.00 - 12.00',
            'gmail' => 'bursaumrohindonesia@gmail.com',
            'instagram' => 'bursa.umroh',
            'title_info' => 'Umroh Adalah',
            'info' => "Umrah secara bahasa bisa diartikan berziarah. Sedangkan menurut istilah, umroh adalah menyengaja menuju Ka'bah untuk melaksanakan ibadah tertentu.

Dalam syariat Islam, Umroh adalah berkunjung ke Baitullah atau (Masjidil Haram) dengan tujuan untuk mendekatkan diri kepada Sang Khalik yakni Allah SWT dengan memenuhi seluruh syarat-syaratnya, serta waktu tak ditentukan pada seperti ibadah haji.",
            'title_info2' => 'Mengapa Harus Umroh?',
            'info2' => "Mayoritas penduduk Indonesia adalah muslim. Sudah barang tentu, setiap seorang muslim sangat mendambakan dan merindukan untuk bisa pergi ke Tanah Suci melaksanakan umroh maupun haji.

Umumnya masyarakat Indonesia memilih untuk menunaikan ibadah umroh terlebih dahulu, dikarenakan panjangnya antrian untuk bisa melakukan ibadah haji di Indonesia

Bagi sebagian masyarakat muslim di Indonesia melaksankan ibadah umroh bukan hanya diperuntukan bagi orang-orang yang mampu saja. Tapi yakinlah bahwa Allah SWT akan memampukan orang-orang yang terpanggil untuk berumroh.

Untuk bisa menjadi yang terpanggil tentunya niat saja tidak cukup. Kita harus awali dengan memantaskan diri agar diterima dan bisa menjadi Tamu Allah. Caranya yaitu mengiringinya dengan keinginan yang kuat, berdoa setiap waktu, dan ditambah dengan ikhtiar tindakan atau usaha kita dalam mewujudkannya.",
                'quote' => '"Kalau Allah sudah memanggil, kalau Allah sudah mengundang, dengan cara apapun kita pasti akan mengunjunginya, Insyaa Allah kita akan dimudahkan hadir ke Baitullah"'
        ]);

        // Activities
        DB::table('activities')->insert([
            [
                'title' => 'Umroh Ramadhan 2024',
                'slug' => 'umroh-ramadhan-2024',
                'description' => 'Paket umroh spesial Ramadhan dengan pembimbing berpengalaman.',
                'image' => json_encode(['umroh1.jpg', 'umroh2.jpg']),
                'date' => now()->subDays(10),
                'trademark' => 'Kelimatu Travel',
                'created_by' => 1,
                'type' => 'aktifitas', // harus lowercase sesuai enum di migration
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Berita: Jamaah Berangkat',
                'slug' => 'berita-jamaah-berangkat',
                'description' => 'Keberangkatan jamaah umroh gelombang pertama tahun ini.',
                'image' => json_encode(['berita1.jpg']),
                'date' => now()->subDays(5),
                'trademark' => 'Kelimatu News',
                'created_by' => 1,
                'type' => 'berita', // harus lowercase sesuai enum di migration
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Quotes Inspirasi Umroh',
                'slug' => 'quotes-inspirasi-umroh',
                'description' => '“Perjalanan umroh adalah perjalanan hati menuju Allah.”',
                'image' => json_encode([]),
                'date' => now(),
                'trademark' => 'Kelimatu Quotes',
                'created_by' => 1,
                'type' => 'quotes', // harus lowercase sesuai enum di migration
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Activity Topics
        DB::table('activity_topics')->insert([
            [
                'activity_id' => 1,
                'title' => 'Persiapan Umroh',
                'subtitle' => 'Tips sebelum berangkat',
                'description' => 'Pastikan dokumen lengkap dan fisik sehat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_id' => 1,
                'title' => 'Manasik Umroh',
                'subtitle' => 'Pembekalan ibadah',
                'description' => 'Ikuti manasik untuk memahami tata cara umroh.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'activity_id' => 2,
                'title' => 'Keberangkatan',
                'subtitle' => null,
                'description' => 'Jamaah berangkat dari Bandara Soekarno-Hatta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Testimonials
        DB::table('testimonials')->insert([
            [
                'name' => 'Ahmad Fauzi',
                'image' => 'testi1.jpg',
                'caption' => 'Jamaah Umroh',
                'description' => 'Pelayanan sangat baik, perjalanan umroh lancar dan penuh makna.',
                'youtube_url' => 'https://www.youtube.com/watch?v=abcdefghijk',
                'video' => null,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aminah',
                'image' => 'testi2.jpg',
                'caption' => 'Jamaah Haji',
                'description' => 'Terima kasih Kelimatu, pengalaman haji yang luar biasa.',
                'youtube_url' => null,
                'video' => 'testi2.mp4',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Teams
        DB::table('teams')->insert([
            [
                'name' => 'Ustadz H. Abdul Rahman',
                'image' => 'ustadz1.jpg',
                'description' => 'Berpengalaman membimbing jamaah umroh dan haji lebih dari 10 tahun.',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nurul Hidayah',
                'image' => 'cs1.jpg',
                'description' => 'Siap membantu kebutuhan informasi dan pendaftaran umroh.',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Galleries
        DB::table('galleries')->insert([
            [
                'media' => 'galeri_umroh2023.jpg',
                'description' => 'Dokumentasi Umroh 2023',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'media' => 'galeri_manasik.jpg',
                'description' => 'Kegiatan Manasik',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Services
        DB::table('services')->insert([
            [
                'title' => 'Paket Umroh Reguler',
                'description' => 'Paket umroh dengan fasilitas lengkap dan harga terjangkau.',
                'image' => 'service_umroh.jpg',
                'price' => 25000000,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Paket Haji Khusus',
                'description' => 'Layanan haji khusus dengan bimbingan profesional.',
                'image' => 'service_haji.jpg',
                'price' => 70000000,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
