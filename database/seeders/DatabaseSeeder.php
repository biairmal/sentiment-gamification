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

        // NOTE : Soal yang pake " suka bikin error parsing pas di JS
        $cyber_bullying = [
            // unknown answers
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Jijik liatnya suer deh minceeee'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Anjing nya ngamuk..hidup kok dmana2 pny musuh..udh kliatan mna yg baik dan bukan..org baik ga pny byk musuh'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Cuman jual goyangan yak, suara macam taik'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Kasian ih nyari uang sampe segitunya'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Anjir tontonan yg sangat tidak bermutu!'],

            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Seorang presiden tanpa embel-embel gelar .. bangga sekali'],
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
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Om AA kemana ? lepas #AHY kalah kok dia tutup mulut tidak koa-koar mau bongkar SBY'],

            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Pilihan warga jkt Mayoritas bukan pada ahok, tapi calon selain ahok, terbukti di dua putaran pilkada dki. Mayoritas memilih AHY dan Anies'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Menurut AHY, Pilkada DKI memberi hikmah, pelajaran, ujian dan tantangan yang dapat ia ambil. Semua itu dapat mematangkan karakternya#AIMAN'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Dari pada pendukung Ahok berantem terus. Mending kaya pendukung AHY membuat kopdar biar makin luas siapa tau jadi calon lagi'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'AHY memang kalah di pilkada tetapi MENANG di hati rakyat.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Soal mental kalah Pilkada, Indonesia harus berguru pada sosok AHY.'],
        ];

        $cyber_bullying2 = [
            // unknown answers
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Jablay anjir mukanya... Murahan bangetttt najisss'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Jijik saya liatnya...kaya ulet bulu kluget2 gitu...hihihi..ampe sgitunya pengen terkenal...!!'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'wey org goblok juga bisa bedain vape, shisha sm rokok. jelas jelas lo ngerokok pake acara ga ngaku segala'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Editan paraaaahh...oplas aj laaah nyai drpd ngedit2 gn hahaa kn maluuu'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Karna sejatinya kau adalah setan berwujud manusia ,,karna pekerjaan setan ya menggoda manusia'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Gilingan mulan jalang lg kasih ceramah. Hahahaha . dasar cireng gak tau diri gak pernah ngaca. Si cireng lg ceramah sok2 kyk pahlawan kesiangan biar bisa berteman ama sekuter kyk selpii ini.'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Iyah bener. Tidak Akan merubah pandangan Tuhan terhadap Kita. Terutama elu Setan!! Makanya mikirrrr.. suami majikan kok diembat!!'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'lucu ya si yg bikin kata2.bawa2 Tuhan.kalau dah kepepet. Masa dia ga tau ibarat apa org yg merusak rumah tangga org.ibarat merobohkan bangunan masjid mbak nya.bayangin aja seberapa besar nya dosa mu.nasi dah jdi bubur mba nya moga bisa bahagia di dunia.'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Muljem ngomong gak jelas blepotan, gak nyadar mau idup enak aja pake rebut laki orang dulu'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Gagal fokus dengar suaranya.. koq jengkel ya dengernya... sorry cuman manusia biasa kalo jengkel'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Coba liat bibir mu sayang, seperti pantat ayam. Wajah mu bulukan seperti kentut?? perfectoooo?'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Emang dasar si anak nya aja yg lebay....urusan pribadi di umbar..biar di blow up... hadehh..gunanya whatsapp sms or telp buat apa..suka aneh....'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Ah min, gue lama2 gak suka sama akun ini nih! Berita nya basi! Lo liat dong min.. itu si kellen sama amora lagi dateng.. pake ikut jingkrak2 kok!! Lo saring dulu dong min.. biar berita nya gak blunder.. lo posting juga tu KD udah posting videon kellen ma amora lagi joget2 ma si arsya arsyi!!'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Susah kalo artis kampung'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Kampungan.... Artis yg numpang tenar gara2 mukanya mirip Katy Perry doang'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Koq marah sehhh???dasar wanita kampungan...'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Norak sih,kayak ga ada malunya.kl dia bilang terserah dia,ya udah,simpan fotonya.gak perlu dibagi kesemua orang.lah ini dipamer kemana,resikolah dinyinyiri orang.Insecure banget,kudu ya pamer2 gitu biar semua orang ngerti kl si mbaknya udh py pacar yg bisa dipamer2 pantatnya? Kampung bgt'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Waaaaoooo..sopan sekali.. bahasami menunjukkan kelasmu !!! Heeeehh.. yg repot ama hidup lu siapahh ?? Elu live nampilin hal2 gak penting..yg nggilanikk.. menjijikkan..diliat org banyak.. ya pantes lah dikomen..klo gak mw dikomen videoin pribadi aja.. nonton sendiri lu ama kluarga lu di rmh.. nambah lagi niy ertong yg gak pny attutude!! Kampungan!!'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'y ampun pnyanyi dangdut kurang tenar songong bangt BACOTNYA ??pngn nyari sensasi tapi kmpungan bangt deh amit amit bool ko d instastory'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Iyaaa gue pernah pacaran? Udah nikah malah, tapi gak seNORAK eloo.. Gak risih emang? Jgn asal aplod, Perhatiin followers lu yg lumayan banyak itu, tar kebawa norak.'],

            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Cantik yang ini dong,penampilannya dewasa yang sesuai. Mukanya cantik Indonesia,classy. Ayu ayu gimana gitu.'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'dia ganteng tidak hanya saat berseragam, tapi ganteng saat menjadi panutan keluarganya.. semoga anak saya memiliki fisik yang elok macam mahluk Allah ni'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Beruntung banget deh mba. Ganteng,baik,sholeh,sayang keluarga.ini suami idaman banget.semoga selalu menjadi keluarga yang SAMAWA'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Smoga mas Agus menjadi pemimpin di masa akan datang.salah satu pemimpin yg sukses adalah dia sukses dlm memimpin dlm rumah tangga'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Sukses terus kak ayu dan semoga selalu senantiasa dalam naungan Allah SWT, dan sehat selalu amin...'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Smg selalu di berikan kesehatan dan panjang umur yah nek ,muda banget cantik dan MashaAllah'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Salam Dirgantara! Terima kasih telah mendukung dan menyebarkan awareness terkait program pesawat R80. Semoga momen emas ini menjadi titik awal kebangkitan industri pesawat terbang Indonesia agar kembali berjaya. Bersama Eyang Habibie, yuk kita satukan langkah terbangkan pesawat R80. Caranya? Langsung klik link di bio kami yaaa'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Semangat ya eyang habibie, sehat selalu, selalu dlm lindungan Allah, ambisinya selalu kuat dlm melakukan segala hal. Kereeeennnnn. Semoga bnyk penurus2 bangsa sprti eyang Habibie'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Memiliki Cucu2 merupakan kebahagian yg tak ternilai, cucu sbg generasi penerus bangsa...'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Wahhh Kerenn..... dan saat ini tempatnya semakin bagus Ibu. Kapan kapan Bernostalgia di sana lagi bersmaa keluarga'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Cantik dan ganteng-ganteng. Sehat selalu untuk mereka dan Bu Ani Sekeluarga'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Barakallah dengan cucu2 yg cantik dan ganteng ... semoga menjadi anak yg sholeh dan sholeha ... menjadi kebanggaan kelg...'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'cucu bikin hati kita gembira...ngangeni...kadang kangen sama keceriaan mereka...salam kangen buat cucu2 tercinta'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Yang kecil lucu, yang tengah ganteng parah, yang gede pinternya ga ketulungan, salam hormat saya bu, pak'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Terima kasih pak SBY & ibu Ani yg selalu menemani beliau..& sudah memberikan Kontribusinya yg sangat Luar biasa kepada Indonesia selama 10 tahun memimpin..semoga selalu bahagia & sehat selalu..amin'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Setiap caption yang di buat ibu..dan setiap kali saya membaca captionnya secara tidak langsung saya belajar bahasa Inggris ... Terima kasih ibu... Secara personal saya tdk mengenal ibu Anie tp saya yakin betapa bangganya Anak Cucumu bisa kamu didik ibu menjadi generasi bangsa yang mandiri dan unggul ... Sehat terus ibu .. Semoga Cinta Kasih dalam Keluarga selalu engkau tebarkan untuk mereka'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Assalamualaikum ibu yang terhormat. salam dari kami sekeluarga di banda Aceh. kami semua sangat membanggakan keluarga ibu yang sangat membahagiakan kami bila melihat nya. sikap etika perilaku keluarga ibu sungguh sangat bijaksana apalagi mas agus, ibu.. suami saya terlebih lagi sangat yakin pada saat bapak mencalonkan diri jadi presiden dulu beliau sangat bangga pada bapak salam hangat dan perkenalan dari keluarga kami ya bu (Darmanto Rapi photo studio)'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'senang liat ibu n bpk sby menikmati hari tua brsama cucu tercinta ,, sehat trs ya memo n pepo ,,, Allah SWT melindungi memo n pepo n kel #kisss'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Semangat mebangun indonesia yg lebih maju pak jokowi'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Artis berkualitas, wajahnya itulohhh berkualitas bgt hihi.. Cantik bangetsss.. Top deh.. Ga pake drama dan gimick idupnya hihi.. Tajir tp. Sederhana'],

            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Lakukan apapun yang kalian inginkan'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Ikut berpartisipasi dalam giveaway kali ini'],
            ['type' => 'unknown_answer', 'level' => 1, 'answer' => '', 'question' => 'Hadiah untuk seluruh partisipan'],

            // absolute answer
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Gini amat pengen tenar ya ampuuun...malu kalo jadi anaknya yah kasian'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'jelek,lecek,bantet'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Pernah ngga mba <USERNAME> baca ada netizen yg nyesel ga bs nimpuk telor ke si mulan..gw aja ketawa bacanya krn terwakili. Ya ngapain buang2 wktu ketemu orang gak mutu dng si mulan...msh untung nyempet2in bs nuli? disini biar nyadar tuh pelakor ga punya harga diri. Mending ketemu org baik2 spt bunmai...ketularan aura positifnya.'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Karna sejatinya kau adalah setan berwujud manusia ,,karna pekerjaan setan ya menggoda manusia'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Ya pandangan Tuhan terhadap lo juga jelek sih gue rasa, dikira perebut suami orang tuh mulia apa dimata Tuhan'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Artis kampungan wkwk'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'ini orang otaknya ga pernah di sekolahin ya? itu resiko ketika udah upload sesuatu di sosmed, ya pasti bakal dapet perbincangan dari netizen. public figure kok ga ada otaknya.'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'Maaf mukanya jelek terus attitude nya buruk,,spesialis plagiat,,dan ketauan pula ,,,'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'tolong di baca arti dr comment saya, udah kerdus+bodoh lg bilangin org tua nya besok kalo masak jangan pakai mecin, jd udah kerdungab ga sesuai mulut. Besok makan salmon kalo g mampu besok aku tak deliv ke rumahmu'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'negatif', 'question' => 'malu tuh sama kerudung kamu sayang, sama ibadah nya. Sholat aja drpd nyinyirin org dandanan udh sok suci mulut nya kaya sampah'], // bawah-atas 168

            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Mba via sptnya siyok melihat kejamnya dunia per artis an... mudah2an tetep sabar tetep berkarya dg baik...'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Selalu suka sama via,org nya jujur apa adanya kaga gimmick2an hidupnya..hitam ya hitam,putih ya putih..kl ngomong blak2an,kl ngga suka dy ngomong jd ga pura2(gw banget sih),apa adanya ga munafik..sprti ajaran ortu gw..jangan suka memberi senyum kepalsuan????ga kaya artis yg onoh noh yg mulutnya lebar kya gorong2,tukang ngibul,munfik bgt kl ditanya wartawan jg jawabnya,perilaku ama omongan ga balance'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Go a head Via...... Cuekin ajalah, udah biasa itu dalam pergaulan dunia kerja dan masyarakat biasa, apalagi pergaulan ertong. Pastilah ada yg gatel bin sirik klo liat orang sukses, anggep aja kuman gak usah dibikin status, malah kesenengan mereka ada bahan buat ngetawain. Betul nggak'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Gagah kali abang borisq ini.. Klo gk bc nmx bner2 gk ngeh klo it bang boris'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Weewww bangga kali ak liatnya bang, pake baju adat karo.... Syip'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Bagus banget baju dan pengantinya happy weding'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Gileee suaraaanyaa.. kereen parah.. sukak'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Lebih keren dr penyanyi aslinya'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Kereeeeeeeennn sampe merinding brrrrr'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'positif', 'question' => 'Dgrin ini sampe bulu kuduk naik saking bgusnya, masyaallah apik bgt suaranya'], // atas-bawah 262

            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'netral', 'question' => 'Jadi pengen posting foto yang sama juga hari ini'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'netral', 'question' => 'Yuk kita ikutan giveaway ini!'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'netral', 'question' => 'Jangan lupa like and follow!'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'netral', 'question' => 'Repost postingan berikut ini untuk memenangkan hadiah!'],
            ['type' => 'absolute_answer', 'level' => 1, 'answer' => 'netral', 'question' => 'Screenshot halaman ini ya!'],
        ];

        $tayangan_tv2 = [
            // unknown answers
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Antv aneh .. makin kesini @abad_kejayaan tayang cumn 35menit doank  bertele'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Dulu udah tamat terus sekaraang ulang lagii aneh emng antv'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'percuma Protes, gak prnh juga diGubris ma Pihak Antv!! Aneh yah.Seharus nya dengar apa maux pemirsa bkn mau nya Antv'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Kok Di TV Aku warna layar nya aneh ini cuma antv yg aneh warnanya kenapa ya??'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Makin hari makin aneh programnya india mulu bosan tau trus pesbukersnya jg udah ga ade ANTV ANEH'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'knp antv ini aneh bgt dah, masa pocong pake kain batikFace with tears of joy'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'GK tau anjirr itu sinetron ANTV aneh aneh emg'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'ANTV tuh aneh, dulu abad_kejayaan,tiba berhenti sekrng mahabrta,gk konsisten banget gk jelas'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'kok gitu sih antv,aneh,buat kesel'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'ih antv aneh banget tiba² soundnya jadi kenceng'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'antv stasiun tv yg aneh masa mau2nya beli serial gak bermoral itu'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'ANTV ni aneh. Lagi enak-enak nonton ASOKA tiba-tiba film sudah berubah jadi JODAAKBAR'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Jadwal tayang antv makin aneh, saat film makin menarik/mau habis, di tayangin lebih malam. hadehh capek deh.. stop nonton drama dri antv deh'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'eh, jodha akbar distopkah?? dr kmrn ga tyg :| antv mah aneh~ film bgs dikurangin jem tygnya sdgkn film jelek ditambah&byk pula yg muncul'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'ANTV aneh yaa,,paz adegan ini d cut,,tp paz flashback adegan ini d tayangi,,wkwkwk,lupa kalik ya'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Bad. TransTV nya No Signal'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Kabar bintang antv aneh bngt bkn beritain ttng artisny bollywod mlh nasar mele....capcay deh'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Aneh banget org indonesia..artis bollywod di pake,trus artis indonesia di kmanain??? Antv aneh banget!!!!!'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Ini film khrisna yang di antv aneh banget sih, tiap ngomong keluar petir, padahal cuacanya cerah gak hujan gak apa.'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Tanya2rl jahat bgt gaksih... ini yg diundang itu yg lg viral di tikt0k, cewe yg numbuh kumis sm jenggot. Pas diundang ke acara tsb malah dibercandain kostum monyet. TransTV keren gitu? ngga tolol.'],

            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Also yeah transTV is a real channel here'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Goow, Layar Emas RCTI and chill. Bioskop TransTV and chill'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'YALL NEED TO WATCH TRANS TV RIGHT NOW. theres my childhood boyfie'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Keren bgt, ada the space between us di trans tv yeay'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Keren!! Never failed ya penampilan SUPER JUNIOR di TransTV'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Weis keren...thanks Trans'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Thumbs up to TransTV and all the crew bintang tamunya oke, cg keren, lagunya bikin nostalgia'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Kayanya pertama kali nonton film ini di transtv waktu liburan panjang. Terus langsung tercengang-cengang liat filmnya. Perang antar beberapa clan, keren banget sih....'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'stage trans tv keren jg,kek stage nya the stage SM'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Keren banget deh Happy anniversary transcorp!! TRANSMEDIA  19 WITH SUJU'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Anjirnwoii ini beneran film di transtv keren bangettt'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Elegann gituu yee sis wkwkkw dulu sblm net ada si pengen bgt transTv kan dlu yg keren tu transTv yaaak'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'katanya iklan di trans bukan fan made, mungkin emang kerjasama SM (label SJ) dgn pihak trans? but honestly bagus bgt iklan nya Pleading faceBlue heart thank u TRANSTV_CORP'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Keren banget asli. aku kira fanmade soalnya kek paham banget gimna seleranya elf'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Valerian and the city of a thousand. Tadi nonton ini di transTV keren juga'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'bioskop transtv beberapa hari ini keren-keren sih film, habis sicario 1-2 sekarang giliran nayangin john wick kembaran aing'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'transtv keren bgt dah melebihi beyond live sampe raisa ke luar angkasa'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'gila transtv keren ngundang pemenang MAMA best asian artist award rizky febian'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'PLEASE INI FILM TRANSTV KEREN ABIS BURUAN NONTON GAES'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Kelas banget transtv, keren'],

            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Tayang setiap hari pukul 07.00 pagi'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Ditunggu tayangan seru dari kami selanjutnya!'],
            ['type' => 'unknown_answer', 'level' => 2, 'answer' => '', 'question' => 'Kami akan lanjut setelah iklan berikut ini'],

            // absolute answer
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'heuummz, Trans tv makin hari makin aneh'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Dubbingan That Winter The Wind Blows di trans tv terdengar aneh'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Ada crazy little thing called love di trans tv tapi dubbingnya aneh banget lol'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Dan air mata @hanumrais adalah air mata aktris gagal. Orang abis operasi plastik kok ditangisi dan dianggap pahlawan. Heuheuheu.. Gimana sih TransTV'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Mantan reporter Transtv yg jago bersandiwara di depan kamera.'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Film horror Trans tv makin hari makin aneh'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Bahasanya aneh bgt film crazy little thing called love di trans tv'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Nonton that winter the wind blows di trans tv agk aneh sm dubbernya'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Wahh ada wartawan satu lagi nih, siapa ya? Kok pakaiannya aneh gitu'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'negatif', 'question' => 'Haha, bioskop TransTv aneh nih.... Salt blum abis di ganti charlies angles, terus seharusnya Paranormal Activity malah CA'],

            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Waaah, elite much, it is diffrent , congrats Transtv_corp'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Waaah keren Super Trap, TRANSTV_CORP backsoundnya Sorry Sorry'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'honestly without this show, we would never get abang jago, tarik sis semongko and baper from Super Junior. Thank you Transmedia!'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Trans tv memang paling jago bikin reality show'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'TransTV jago banget timing-nya, nayangin #GodzillaMovie pas sekuelnya lagi tayang di bioskop'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'ABANG JAGO THANK YOU TRANSMEDIA'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'TRANSTV_CORP jago bikin baper penonton'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'TransTV ini emang jago urusan bikin FTV Parodi, skrg ada Tenggelamnya Kapal Pak Boerik'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'TRANSTV_CORP paling jago explore indonesianya!'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'positif', 'question' => 'Acaranya kayak beneran. TRANSTV_CORP emang jago bikin yg kayak gini. Keren!'],

            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'netral', 'question' => 'Yuk Nonton Tayangan Setelah ini'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'netral', 'question' => 'Jangan lupa untuk terus berada di ANTV!'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'netral', 'question' => 'Kami akan tayang setiap Kamis pukul 08.00'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'netral', 'question' => 'Tonton kami di TransTV'],
            ['type' => 'absolute_answer', 'level' => 2, 'answer' => 'netral', 'question' => 'Luangkan waktumu untuk jadwal tayang berikut ini'],
        ];

        $pilkada2 = [
            // unknown answers
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Bicara apa kasihan yaa...lap itu air matanya wkwkwkwk'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Banyak akun kloning seolah2 pendukung #agussilvy mulai menyerang paslon #aniessandi dengan opini dan argumen pmbenaran..jangan terkecoh'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Kalau aku sih gak nunggu hasil akhir QC tp lagi nunggu motif cuitan pak @SBYudhoyono kayak apa.. pasca #AgusSilvy Nyungsep..'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Kasian oh kasian dengan peluru 1milyar untuk tiap RW #agussilvy tidak mempan menangin pilkada #QuickCount #PilkadaSerentak2017'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Maaf ya pendukung #AgusSilvy..hayo dukung #AniesSandi diputaran 2'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'aneh deh lebay masa ini di sangkut pautkan sama kandidat Calgub, anda lebay seperti yg anda dukung'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Mengenang pidato kekalahan #ahy'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Batal nyoblos, baru tau ternyata ga ada no.1 di kertas suara.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'sudah boleh Ngakak? survey mu jauh panggang dari api!'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'om AA kemana ? lepas #AHY kalah kok dia tutup mulut tidak koar mau bongkar SBY'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'ya pastilah #FPI kan ga suka ama Ahok jd pas #AHY udah kalah otomatis dukungannya lari ke mas #Anisa AniesSandi'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Gara2 e-KTP dikorupsi, fotoku yg semula mirip #AHY, pelan tapi pasti skrang malah mirip - Stickmoticons'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Double LOL. @aniesbaswedan nuduh @AgusYudhoyono miskin ide, sekarang dia copy #AHY.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Ingat! Tidak bisa modal OMONGAN saja. Tapi kerja nyata! #agusharimurtiyudhoyono'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Paslon salah langkah seperti dilakukan Sandi ini, bukan tidak mungkin jadi bumerang gagal dapat suara #AHY.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Tuduhan terhadap #AHY yg kerap dilontarkan: anak ingusan dan cuma mayor, sekarang tak terdengar lagi. Dudah berubah menjadi sanjungan!?'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Jangan curiga dulu saldonya bisa di kenti seperti BLT orang mau berbuat baik belum apa2 sudah curiga mekanismenya seperti apa #AHY'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Hellloooo.... Suara rakyat.. Ngerti suara rakyat? Bukan suaranya #AHY or dek @AgusYudhoyono.. Ngopi dulu gih.. #PenikmatKopi'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Cari teman kok cara gitu ya.. pdhal #AHY sdh jelas. Gubernur Baru...'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'secara kesatria dan lapang dada ternyata hoax, yang ada hanya kalah ya sudah masih menang banyak ulama bayaran #AHY'],

            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Terimakasih AHY-SILVY, tanpa kalian jakarta tidak akan mempunyai gubernur baru'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Cakeeepppp....#bersatunya pendukung #AniesSandi dan #agussilvy'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Sinyal Positif Agus-Sylvi Merapat ke Anies-Sandi'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Mengakui kekalahan, apapun itu tujuannya tapi great applause lah. Patut ditiru untuk demokrasi yang positif #AgusSilvy'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Salut! @AgusYudhoyono & Mpok Silvy dengan mengakui kemenangan Paslon lain.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Alhamdulillah.... #AHY tersambut hangat, mesra dan intim di NTB.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Apapun hasilnya kau tetap kebanggaan kami #AgusSilvy'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Kekalahan adalah sukses yg tertunda, bukan untuk disesali tapi dijadikan pengalaman tuk lebih baik lagi di masa depan #AHY'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Pesan #AHY jangan lupa gembira dan cinta Indonesia'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => '#AHY adalah Inspirasi Kaum Muda... GERAKAN INDONESIA MUDA menuju INDONESIA EMAS'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Terimakasih kpada pendukung #AHY yang tlah memberikan suaranya kepada @aniesbaswedan | @sandiuno'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Bismillah, semoga esok Hari Jakarta memiliki pemimpin yang sesuai tuntunan AlQuran, diridhai Alloh swt'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'bu Sylvi adalah contoh keberanian betawi utk dalam bersikap, ngga ngambang atau banci. Contoh perempuan betawi tulen!'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Begitu tulus, begitu menyenangkan... Insyaallah ada jalan bu @sylviana_murni'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Saya selalu suka dengan orang yang berjiwa besar #AHY'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'WalauPun kau kalah,Kami tetap bangga sekali padamu #AHY,JalanMu masih panjang,Kesuksesan yang lebih baik menantimu Disaat yang tepat.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => '#AHY aku pribadi kagum atas pribadi mu yes #bangga atas sikapmu'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Bangga melihat pernyataan #AHY ini. Ksatria.'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => '#AHY juga bagus programnya mengenai Persija'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Dengan kecerdasan, nasionalisme dan jiwa pancasilais yang dimiliki, #AHY bisa dikatakan memiliki Jiwa Santri, walaupun belum pernah mondok'],

            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Berikan suaramu untuk negara Indonesia'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Satu suara sangat berharga'],
            ['type' => 'unknown_answer', 'level' => 3, 'answer' => '', 'question' => 'Apakah kamu sudah mendapatkan tinta pada kelingkingmu?'],

            // absolute answer
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Masih mau mencaci maki #AHY dan Pepo Memo nya?! Kalian hrs mengemis minta suara 17% kpd orang2 yang selama ini kalian hina!!!!'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'pantas saja #AHY hancur'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'tolak ahy yang berpolitik membawa agama #AHYMaininSARA'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'sejujurnya penilaian subyektif saya, terlalu cepat bila AHY 2019. Kalah di pilkada bukan modal, tapi catatan negatif.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Astaga ini pendukung AHY tidak terima sekali dengan hasil survey,harusnya jadi tolak acuan untuk lebih semangat #efeknontonmetro'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Suara Warga Cuma Dihargai SEMBAKO TOLAK AHY Sudah melakukan penyuapan kepada warga'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Ternyata segelintir pendukung AHY merasa ditikung di saat terakhir karena adanya tweet dari akun resmi parpol pendukung Anies-Sandi #Pilkada'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'AHY Menanggung Akibat Cuitan Ayahnya yang Tak Produktif.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Kasian benar nasib AHY, karir tinggi di TNI harus tamat karena nafsu pepo. Selanjutnya paling cepat ikut parpol kalau tidak begitu dagang aku'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'negatif', 'question' => 'Saya bertanya kepada Bapak Presiden, TV saya rusak apa ya? Kok AHY tidak naik naik hasil QC sementara? #PilkadaDKI #GPP'], //atas-bawah 97

            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'AHY memang kalah di pilkada tetapi MENANG di hati rakyat.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'AHY Sebut Pilkada DKI Berjalan Bermartabat'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Salam kagum buat AHY. Masih muda, berani pensiun dini, berani menantang ahok di pilkada, disaat semua pada takut, termasuk @ridwankamil'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Pilkada DKI berdoa AHY menang. Mudah-mudahan Anies Sandi yang menang.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'soal mental kalah Pilkada, Indonesia harus berguru pada sosok AHY.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Saya bilang PASTI MENANG karena bentuk keyakinan akan keberhasilan goal goal LAIN dari IMPROVISASI politik Pak SBY & Pak AHY,di Pilkada DKI.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => '@SBYudhoyono setelah pilkada DKI, AHY jadi sangat diperhitungkan. Diharapkan dia bisa menjadi pemimpin RI selanjutnya'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Jadi, tolong hargai sikap saya dan beberapa pendukung AHY yang memilih bersikap netral di putaran kedua Pilkada DKI 2017 ini.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'tetap semangat dukung AHY-Sylvi sampai pilkada terlaksana, yakin dan tentukan pilihan anda kepada yang pro rakyat.'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'positif', 'question' => 'Maju terus AHY-Silvy dan Anies-Sandi BerSATU bersama menangkan pilkada DKI'],

            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'netral', 'question' => 'Jangan lupa coblos hari ini!'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'netral', 'question' => 'Lokasi pencoblosan berada di lapangan sebelah'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'netral', 'question' => 'Ajak teman dan keluargamu untuk melakukan pencoblosan'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'netral', 'question' => 'Pencoblosan akan dilaksanakan 5 hari lagi'],
            ['type' => 'absolute_answer', 'level' => 3, 'answer' => 'netral', 'question' => 'Berikan suaramu!'],
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
        foreach ($cyber_bullying2 as $questions) {
            DB::table('questions')->insert([
                'question' => $questions['question'],
                'correct_answer' => $questions['answer'],
                'question_type' => $questions['type'],
                'level' => $questions['level'],
            ]);
        }
        foreach ($tayangan_tv2 as $questions) {
            DB::table('questions')->insert([
                'question' => $questions['question'],
                'correct_answer' => $questions['answer'],
                'question_type' => $questions['type'],
                'level' => $questions['level'],
            ]);
        }
        foreach ($pilkada2 as $questions) {
            DB::table('questions')->insert([
                'question' => $questions['question'],
                'correct_answer' => $questions['answer'],
                'question_type' => $questions['type'],
                'level' => $questions['level'],
            ]);
        }
    }
}
