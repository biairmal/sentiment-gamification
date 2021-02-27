<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $cyber_bullying = [
            // unknown answers
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Jijik liatnya suer deh minceeee'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Anjing nya ngamuk..hidup kok dmana2 pny musuh..udh kliatan mna yg baik dan bukan..org baik ga pny byk musuh'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Cuman jual goyangan yak, suara macam taik'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Kasian ih nyari uang sampe segitunya'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Anjir tontonan yg sangat tidak bermutu!'],

            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Seorang presiden tanpa embel" gelar .. bangga sekali'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Proud of you Indonesia. God bless Indonesia'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Amazing bngt Miss National Costume. Kereenn!! Bangga ama budaya indonesia'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Ikut bangga pastinya'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Aku percaya kak niki orangnya jujur semangat kak niki hebat'],

            // absolute answer
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Geblek lo tata...cowo bgt dibela2in balikan...hadeww...ntar ditinggal lg nyalahin tuh cowo...padahal kitenya yg oon.'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Kmrn termewek2 skr lengket lg duhhh kok labil bgt sih mbak kya abege ajah ato yg kmrn cari sensasi biar top markotoppp ertong gk berkualitas'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Hadewww permpuan itu lg!!!!sakit jiwa,knp harus dia yg jd peran utama di film hantu jeruk purut,ky khabisan stok Artis aja'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Suaranya ancur banget, lebih merdu tukang gorengan', 'answer' => 'negatif'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Cewek gatau diri nih, ngerebut pacar org. Udh mana punya abang yg ngedukung sifat jeleknya lg. Ckck'],

            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Yang sabar yaa.. insya Allah menjadi pembuka pintu syurga dan penghalang api neraka bagi kedua orang tuanya'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Raisa cantik yaaa, meskipun artis tapi ga menonjolkan kalo nikah tuh harus mewah, udah cantik, sederhana, sempurna bgt,'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Karna orang yang syudah cantik, ga perlu dandan heboh utk membuatnya terlihat cantik.. dengan makeup yang simple gitu aja sudah mempesona?????? bikin hamish klepek2'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Bagus dong.. mencari ilmu kapanpun dimanapun.. itu karena suaminya orang berpendidikan'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Sukak cewe cantik dan kmauan blajarnya tinggi '],
        ];

        $tayangan_tv = [
            // unknown answers
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Kalo episode berikutnya muncul lagi di @HitamPutihT7 saya ga bakal nonton lg hitam putih.. #hitamputiht7'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Orang tuna netra aja bisa berbagi, kok yg pegang jabatan tinggi korupsi'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Kalo sekarang yang nyanyi anak2,, tapi lagu Na ... Terlalu Menyakitkan Memalukan untuk disebutkan #savelaguanak #HitamputihT7'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Bukan maksud ngatain tp cuma bertanya knp hanya orang kecil atau bawah yg ditindes? '],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Suara sang veteran kalau perlu koruptor di hukum mati!'],

            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Nonton kisah anastasya wella di #hitamputihtrans7 seru bgt ya kisahnya. Punya 9 kepribadian berbeda.'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Yang bikin selalu rindu kalau jauh dari nya... #hitamputihtrans7'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Spensa Boys asal poso di hitam putih trans7 ASLI KALIAN KEREN!! yang pake kemeja biru putih, si gingsul ada salam dari sini'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'setiap hari aku slalu nonton Hitam Putih di Trans7. Hbs acara nya bagus banget mas Dedy.'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Acara Hitam Putih di Trans7 malam ini pembahasannya MANTAB! Setuju kalau bakal diperbanyak yang mengulas hal semacam ini'],

            // absolute answer
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Berasa aneh nonton acara Hitam Putih tapi penonton nya anak yg sekolah di sekolah gua #smkjakarta1'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Sedih dengar curhatanmu, Roxana. Semoga Tuhan tunjukkan jalan dan titik terang utk Roxana '],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Sombongnya mentang2 kaya pake diumumkan, saya host kaya di Hitam Putih Trans7...', 'answer' => 'negatif'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Parah banget hitam putih di Trans7. Ngomong sembarang. Yg merusak generasi muda acara kyk gini', 'answer' => 'negatif'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Orang bangkrut itu bukan perkara soal uang tetapi bangkrut itu orang yang sudah tidak punya mimpi', 'answer' => 'negatif'],

            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Ada nih di trans7 hitam putih, dia dpt penghargaan juga di norwegia #hitamputih'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Terima kasih pak.... Sudah mau membantu kami untuk menyekolahkan adik saya.... #hitamputihtrans7'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Acara hitam putih paling bagus buat di lihat'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Bagus Rancangan Seperti ini di TRANS7 HitamPutih, Sambil2 Dakwah Hiburannya. Terima kasih Ustadz Wijayanto...'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Acara hitam putih di trans7 topiknya bagus nih. Ttg Kepribadian ganda.'],
        ];

        $pilkada = [
            // unknown answers
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Kalau pencatutan nama #ahy dan mpo #silvi melanggar hukum ga ya.. wkwkwkwkkwkk'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Paslon salah langkah seperti dilakukan Sandi ini, bukan tidak mungkin jadi bumerang gagal dapat suara'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Jangan2, relawan inilah yang gembosi'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Kini, ketika #AHY berada di luar arena, tabir kegelapan & tiada harapan kembali menyergap rakyat. Kemana lagi rakyat mencari ketulusan?'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Jangan curiga dulu saldonya bisa di kenti seperti BLT orang mau berbuat baik belum apa2 sudah curiga mekanismenya seperti apa #AHY'],

            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Sebentar lagi kita lupakan kegilaan pilkada DKI. Mari berlari bersama AHY. Kita mulai dari Kepri 23 April'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Saya bilang PASTI MENANG karena bentuk keyakinan akan keberhasilan goal goal LAIN dari IMPROVISASI politik Pak SBY & Pak AHY,di Pilkada DKI.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Jadi, tolong hargai sikap saya dan beberapa pendukung AHY yang memilih bersikap netral di putaran kedua Pilkada DKI 2017 ini.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Kita tunggu kualitas jiwa Anies Sandi..apa ucapan atas peran suara loyalis AHY-Silvy dalam kemenangan pilkada ini #BasukiKeokMasukBui'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Mari beri masukan & kritik yang membangun bagi yang kalah dalam pertandingan.'],

            // absolute answer
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Kasian oh kasian dengan peluru 1milyar untuk tiap RW #agussilvy tidak mempan menangin pilkada'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Mengenang pidato kekalahan #AHY'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Batal nyoblos, baru tau ternyata ga ada no.1 di kertas suara. #AHY #kangen #mosing'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Sudah boleh Ngakak? survey mu jauh panggang dari api! #AHY'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Om AA kemana ? lepas #AHY kalah kok dia tutup mulut tidak koar" mau bongkar SBY'],

            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Pilihan warga jkt Mayoritas bukan pada ahok, tapi calon selain ahok, terbukti di dua putaran pilkada dki. Mayoritas memilih AHY dan Anies'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Menurut AHY, Pilkada DKI memberi hikmah, pelajaran, ujian dan tantangan yang dapat ia ambil. Semua itu dapat mematangkan karakternya#AIMAN'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Dari pada pendukung Ahok berantem terus. Mending kaya pendukung AHY membuat kopdar biar makin luas siapa tau jadi calon lagi'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'AHY memang kalah di pilkada tetapi MENANG di hati rakyat.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Soal mental kalah Pilkada, Indonesia harus berguru pada sosok AHY.'],
        ];


        foreach ($cyber_bullying as $questions) {
            DB::table('questions')->insert([
                'question' => $questions['question'],
                'correct_answer' => $questions['answer'],
                'question_type' => $questions['type'],
                'level' => $questions['level'],
            ]);
        }
        foreach ($tayangan_tv as $questions) {
            DB::table('questions')->insert([
                'question' => $questions['question'],
                'correct_answer' => $questions['answer'],
                'question_type' => $questions['type'],
                'level' => $questions['level'],
            ]);
        }
        foreach ($pilkada as $questions) {
            DB::table('questions')->insert([
                'question' => $questions['question'],
                'correct_answer' => $questions['answer'],
                'question_type' => $questions['type'],
                'level' => $questions['level'],
            ]);
        }
    }
}
