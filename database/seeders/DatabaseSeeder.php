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
        $questions = [
            ['question' => 'Kenapa sih harus dia lagi yang jadi peran utama?', 'answer' => 'negatif'],
            ['question' => 'Aku tidak menyukai orang itu', 'answer' => 'negatif'],
            ['question' => 'Lama banget jadi males aku', 'answer' => 'negatif'],
            ['question' => 'Diam-diam dia membicarakanku dibelakang', 'answer' => 'negatif'],
            ['question' => 'Aku tidak suka kalau kamu slow respond!', 'answer' => 'negatif'],
            ['question' => 'Pusing mikirin orang yang ga bertanggung jawab', 'answer' => 'negatif'],
            ['question' => 'Yah admin nya termasuk golongan pengonsumsi mecin dan pil pcc.. otak lu rusak min?', 'answer' => 'negatif'],
            ['question' => 'Wah itu Kerdus mulutnya busuk...jangan jangan sampah makanannya', 'answer' => 'negatif'],
            ['question' => 'Dasar plagiat semuanya, ga bisa kreatip. memalukan bgt', 'answer' => 'negatif'],
            ['question' => 'Gue gak suka sm ni orang. Idupnya kebanyakan ribut.', 'answer' => 'negatif'],
            ['question' => 'Cewe yg bgni yg hrsnya gosong jd abu aja di kebakaran pabrik yg lg viral kmrn tu', 'answer' => 'negatif'],
            ['question' => 'Norak bener. Kegaet penjahat baru rasa', 'answer' => 'negatif'],
            ['question' => 'Before and after pasca oplas ga ngefek ya.. tetep jelek n serem mukanya..ahahahhaha..', 'answer' => 'negatif'],
            ['question' => 'Padahal kamu lebih kampungan loh, pake kerudung tapi mulutnya cuihh', 'answer' => 'negatif'],
            ['question' => 'Ngomong aja belepotan banyak gaya lu bencong', 'answer' => 'negatif'],
            ['question' => 'Dan lebih bagus lagi kalo mingkem aja hahahahahaha jahatnya akuuu', 'answer' => 'negatif'],
            ['question' => 'Haduuh ini orang gak punya akhlak banget, perasaan kerjaan berantem mulu, banyak musuhnya', 'answer' => 'negatif'],
            ['question' => 'Kasian ih nyari uang sampe segitunya', 'answer' => 'negatif'],
            ['question' => 'Suaranya ancur banget, lebih merdu tukang gorengan', 'answer' => 'negatif'],
            ['question' => 'Kemaren terbahak-bahak skrng lengket lg duhhh kok labil bgt sih mbak kayak abege aja ato yg kmrn cari sensasi biar top markotop ertong gak berkualitas', 'answer' => 'negatif'],
            ['question' => 'Anjing nya ngamuk..hidup kok dmana2 pny musuh..udh kliatan mna yg baik dan bukan..org baik ga pny byk musuh..', 'answer' => 'negatif'],
            ['question' => 'Ahhh katanya jaga ucapan, lahh ucapan dia ngk dijaga sendiri.. dasar munafik.. dasar betina zaman now ellu kali yangg kelebihan micin..', 'answer' => 'negatif'],
            ['question' => 'Anjir tontonan yg sangat tidak bermutu!', 'answer' => 'negatif'],
            ['question' => 'Najis najis udh homo aja harusnya, org kaya gini di musnahkan dari muka bumi', 'answer' => 'negatif'],
            ['question' => 'Orang gila itu ???? pengen HITZ cri tenar rela dipenjara? Cari sensasi settingan supaya beken smpe hina2 org,,, astagfirullah... Sekaya apa sih??? Org kaya mulut nya ky sampah,ga sekolah ya???', 'answer' => 'negatif'],
            ['question' => 'Cari sensasi supaya tenar, trus banya folowers nya. gak gt gt jg kalee... dasar orang stres, ngomong aja masih belepotan gk jelas gt. kampungan', 'answer' => 'negatif'],
            ['question' => 'Sikat abiss lahh orng2 sialan kaya gini. Pemimpin negara sendiri gak di hormatin. Jgn mentang2 Bapak President kita terlalu baik jadi di sembarangin. Saya marah.. Gak boleh kita hina pemimpin kita sendiri.. Saya harap segera di tindak hukum orng ini', 'answer' => 'negatif'],
            ['question' => 'Jijik banget lihat tingkah si upil ini. Mudah2an secepatnya tidur selamanya', 'answer' => 'negatif'],
            ['question' => 'Yg nama ny plagiat ya plagiat, walaupun laku tp tetep ajah ciptaan dri hasil plagiat..', 'answer' => 'negatif'],
            ['question' => 'Wah itu Kerdus mulutnya busuk...jangan jangan sampah makanannya', 'answer' => 'negatif'],
            ['question' => 'Biadab!! Klo nanti anak lo di bully.. Gue mampusin ya!!!', 'answer' => 'negatif'],
            ['question' => 'Editan banget itu. Ya ampun si mommy lambe kehabisan gosib ya buat si pelakor???', 'answer' => 'negatif'],
            ['question' => 'Noh urus tu kuin lu, biar ga gatel nempel2 ama laki orng', 'answer' => 'negatif'],
            ['question' => 'Wkwkwkwk udh gak laku lagi jd nyanyi dhajatan si lonte pelakor', 'answer' => 'negatif'],
            ['question' => 'kamu itu yg bodoh! Ngapain keluarga depok komen org yg gak ada artinya lagi buat mereka', 'answer' => 'negatif'],
            ['question' => 'Mata ku sepet baca koment fans ubul empang', 'answer' => 'negatif'],
            ['question' => 'bego nya lagi pede amat ngomong seolah yg dia bilang paling bener, padahal bukti aja kaga ada. Mau keliatan pinter jatohnya bego', 'answer' => 'negatif'],
            ['question' => 'Gada ganteng ganteng nya. Kebanyakan gaya kek mantan bini depok nya.', 'answer' => 'negatif'],
            ['question' => 'Terimakasih ya. gratis 4Gnya ayo buruan upgrade', 'answer' => 'positif'],
            ['question' => 'Makin betah aja sama kamu.', 'answer' => 'positif'],
            ['question' => 'Lumayan ini murah meriah', 'answer' => 'positif'],
            ['question' => 'Alhamdulillah sambil nunggu subuh bisa melihat lantunan Adhan Styles dari Mekah dan Madinah dengan jelas karena paket Internet', 'answer' => 'positif'],
            ['question' => 'Menggunakan medsos harus sebijak mungkin. Apalagi ada fasilitas makin oke kayak FB gratis 30MB', 'answer' => 'positif'],
            ['question' => 'Pagi itu, menyegarkan mata selain lari2 kecil, bisa juga dengan nikmatin internet, atau nelpon yang super murah, suara jernih', 'answer' => 'positif'],
            ['question' => 'Saktinya balik lagi, alhamdulillah', 'answer' => 'positif'],
            ['question' => 'Kangen nih dapat kiriman pos marchandes nya', 'answer' => 'positif'],
            ['question' => 'Masalah sinyal disini Alhamdulillah kencang karena di kota besar kok', 'answer' => 'positif'],
            ['question' => 'Kecepatan internet di ciwidey segini... mantap', 'answer' => 'positif'],
            ['question' => 'Selalu bermanfaat sinyalnya', 'answer' => 'positif'],
            ['question' => 'Makin mantap saja si', 'answer' => 'positif'],
            ['question' => 'Ajaib min', 'answer' => 'positif'],
            ['question' => 'BerbagiBerkah karena berbagi itu menyenangkan apalagi sama orang yang kita sayangi.', 'answer' => 'positif'],
            ['question' => 'Sinyal 4g nya stabil nih. mantap', 'answer' => 'positif'],
            ['question' => 'Kereeeennnnnn... suaranyaaahh okkeehh ketjeeehh badaaiik ughllaaaallaa..', 'answer' => 'positif'],
            ['question' => 'Suka banget sama pasangan satu ini. Semoga gigi dan raffi menjadi keluarga sakinnah, mawaddah, warrahmah. ', 'answer' => 'positif'],
            ['question' => 'Raisa cantik yaaa, meskipun artis tapi ga menonjolkan kalo nikah tuh harus mewah, udah cantik, sederhana, sempurna bgt', 'answer' => 'positif'],
            ['question' => 'Bagus dong.. mencari ilmu kapanpun dimanapun.. itu karena suaminya orang berpendidikan??', 'answer' => 'positif'],
            ['question' => 'Karna orang yang syudah cantik, ga perlu dandan heboh utk membuatnya terlihat cantik..', 'answer' => 'positif'],
            ['question' => 'Sukak cewe cantik dan kmauan blajarnya tinggi', 'answer' => 'positif'],
            ['question' => 'Yaampun ini artis bener bener good attitude yang layak jadi panutan. Dia kan bisa aja kuliah di luar negri. Tp karna baktinya sama suami , dia pilih kuliah di wilayah dekat suaminya . Salut banget', 'answer' => 'positif'],
            ['question' => 'keren yaaa, kesederhanaannya terpancar jelas. sukak sm keluarga presiden ini', 'answer' => 'positif'],
            ['question' => 'Proud of you Indonesia. God bless Indonesia', 'answer' => 'positif'],
            ['question' => 'Ikut bangga pastinya', 'answer' => 'positif'],
            ['question' => 'PROUD OF YOU KAK DEA. Sangat patut dibanggakan', 'answer' => 'positif'],
            ['question' => 'Aku percaya kak niki orangnya jujur semangat kak niki hebat', 'answer' => 'positif'],
            ['question' => 'Amazing bngt Miss National Costume. Kereenn!! Bangga ama budaya indonesia', 'answer' => 'positif'],
            ['question' => 'Cantik dan gagah mudahan lancar dampe hari H', 'answer' => 'positif'],
            ['question' => 'Dia ganteng tidak hanya saat berseragam, tapi ganteng saat menjadi panutan keluarganya..', 'answer' => 'positif'],
            ['question' => 'Semoga selalu di berikan kesehatan dan panjang umur yah nek ,muda banget cantik dan MashaAllah', 'answer' => 'positif'],
            ['question' => 'Terima kasih telah mendukung dan menyebarkan awareness terkait program pesawat R80. ', 'answer' => 'positif'],
            ['question' => 'Wahhh Kerenn..... dan saat ini tempatnya semakin bagus Ibu.', 'answer' => 'positif'],
            ['question' => 'Cantik dan ganteng-ganteng. Sehat selalu untuk mereka dan Bu Ani Sekeluarga', 'answer' => 'positif'],
            ['question' => 'Semangat mebangun indonesia yg lebih maju pak Jokowi', 'answer' => 'positif'],
            ['question' => 'Weewww bangga kali ak liatnya bang ', 'answer' => 'positif'],
            ['question' => 'Bagus banget baju dan pengantinya happy weding', 'answer' => 'positif'],
            ['question' => 'Gileee suaraaanyaa.. kereen parah.. sukak', 'answer' => 'positif'],
            ['question' => 'Lebih keren dr penyanyi aslinya', 'answer' => 'positif'],
            ['question' => 'Keren suaranya super merdu. Coba ikut audisi nyanyi, pasti bakatnya bs tersalurkan', 'answer' => 'positif'],
            ['question' => 'Dgrin ini sampe bulu kuduk naik saking bgusnya, masyaallah apik bgt suaranya', 'answer' => 'positif'],
            ['question' => 'Kerennnn suaranya bagus', 'answer' => 'positif'],
            ['question' => 'Aduhh kerennnn suaranya enak . nge jazz2 gimanaa gitu', 'answer' => 'positif'],
            ['question' => 'Kereeeeennnn padahal nyanyinya santai banget', 'answer' => 'positif'],
        ];

        foreach ($questions as $questions) {
            DB::table('questions')->insert([
                'question' => $questions['question'],
                'correct_answer' => $questions['answer'],
                'question_type' => 'absolute_answer',
            ]);
        }
    }
}
