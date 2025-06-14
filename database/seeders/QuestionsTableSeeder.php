<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'question' => 'Seperti apa menu FitMeal?',
                'answer' => 'Menu FitMeal dirancang oleh ahli gizi dengan keseimbangan nutrisi yang tepat. Setiap hidangan menggunakan bahan segar, minim minyak, garam, dan gula tambahan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah bisa request menu khusus?',
                'answer' => 'Saat ini, kami menyediakan menu yang telah dirancang khusus oleh ahli gizi. Namun, jika Anda memiliki alergi atau pantangan makanan tertentu, silakan informasikan saat pemesanan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bisa turun berapa kilogram dalam seminggu?',
                'answer' => 'Hasilnya tergantung pada metabolisme tubuh, pola makan, dan aktivitas fisik. Secara umum, pelanggan mengalami penurunan 0,5 - 1,5 kg per minggu dengan mengikuti program secara konsisten.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah FitMeal menggunakan MSG dan pengawet?',
                'answer' => 'Tidak. Semua makanan FitMeal dibuat dengan bahan alami, tanpa MSG, pengawet, atau bahan tambahan berbahaya lainnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah FitMeal halal?',
                'answer' => 'Ya, semua bahan makanan dan proses produksi FitMeal mengikuti standar halal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah program diet ini aman untuk pengidap penyakit tertentu?',
                'answer' => 'Menu kami diformulasikan agar sehat dan seimbang. Namun, bagi Anda yang memiliki kondisi medis seperti diabetes atau hipertensi, sebaiknya konsultasikan dengan dokter sebelum berlangganan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah ada pantangan dalam diet ini?',
                'answer' => 'Diet ini mengutamakan pola makan sehat dengan mengurangi gula, garam, dan lemak jenuh. Jika Anda memiliki pantangan khusus, silakan hubungi customer service kami.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apa saja isi dalam satu box FitMeal?',
                'answer' => 'Setiap meal terdiri dari karbohidrat, protein rendah lemak, sayuran segar, dan lemak sehat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah bisa request jam pengantaran catering?',
                'answer' => 'Saat ini, jam pengiriman sudah ditentukan untuk efisiensi logistik. Namun, jika Anda memiliki permintaan khusus, silakan hubungi customer service kami.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah bisa mengubah alamat atau jadwal pengiriman?',
                'answer' => 'Ya, perubahan alamat atau jadwal pengiriman bisa dilakukan maksimal H-1 sebelum pengiriman melalui akun pelanggan atau customer service.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana jika pembayaran sudah dilakukan tapi pesanan tidak terkonfirmasi?',
                'answer' => 'Silakan hubungi customer service dengan bukti pembayaran agar bisa segera diproses.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara melacak pesanan saya?',
                'answer' => 'Anda dapat mengecek status pesanan melalui akun di website atau menghubungi customer service jika ada kendala dalam pengiriman.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara menghubungi customer service FitMeal?',
                'answer' => 'Anda bisa menghubungi kami melalui:\n📩 Email: support@fitmeal.com\n📱 WhatsApp: 085288325060\n📲 Instagram: @fitmeal.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apakah FitMeal menerima kerja sama atau partnership?',
                'answer' => 'Ya, kami terbuka untuk kerja sama dengan individu, komunitas, atau perusahaan yang memiliki visi yang sama dalam gaya hidup sehat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
