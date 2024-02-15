<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orgs = [
            [
                'name' => 'Kantor Kementerian Agama Kabupaten Pesisir Selatan',
                'email' => 'pessel@kemenag.go.id'
            ]
        ];

        foreach ($orgs as $key => $item) {
            \App\Models\Organization::firstOrCreate(
                ['name' => $item['name']],
                $item
            );
        }

        $data = [
            [
                'name' => 'Pramana Yuda Sayeti, S.Kom',
                'username' => '199407292022031002',
                'jabatan' => 'Ahli Pertama - Pranata Komputer',
                'email' => '199407292022031002@kemenag.go.id',
                'password' => Hash::make('superadmin'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'H. Abrar Munanda, M.Ag',
                'username' => '197105141995031001',
                'jabatan' => 'Kepala Kantor',
                'email' => 'abrar.munanda@kemenag.go.id',
                'password' => Hash::make('197105141995031001'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Yossef Yuda, S.HI, MA',
                'username' => '198008042005011007',
                'jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'email' => '198008042005011007@kemenag.go.id',
                'password' => Hash::make('198008042005011007'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Sudirman, S.Ag',
                'username' => '197202112003121003',
                'jabatan' => 'Kepala Seksi Pondok Pesantren',
                'email' => '197202112003121003@kemenag.go.id',
                'password' => Hash::make('197202112003121003'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Masrizal, S.Ag, M.Pd',
                'username' => '197202051997031003',
                'jabatan' => 'Kepala Seksi Pendidikan Agama Islam',
                'email' => '197202051997031003@kemenag.go.id',
                'password' => Hash::make('197202051997031003'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Drs. Firdaus',
                'username' => '196706191994031004',
                'jabatan' => 'Kepala Seksi Bimbingan Masyarakat Islam',
                'email' => '196706191994031004@kemenag.go.id',
                'password' => Hash::make('196706191994031004'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Sumardi, S.Ag, M.Pd',
                'username' => '197107051998031013',
                'jabatan' => 'Kepala Seksi Pendidikan Madrasah',
                'email' => 'sumardi@kemenag.go.id',
                'password' => Hash::make('197107051998031013'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Betriadi, S.HI',
                'username' => '198106122008011013',
                'jabatan' => 'Kepala Seksi Penyelenggara Haji dan Umrah',
                'email' => '198106122008011013@kemenag.go.id',
                'password' => Hash::make('198106122008011013'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Gustiwarni, S.Ag',
                'username' => '196906151996032002',
                'jabatan' => 'Kepala Seksi Zakat dan Wakaf',
                'email' => '196906151996032002@kemenag.go.id',
                'password' => Hash::make('196906151996032002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],

            // Umum
            [
                'name' => 'Afrison, S.HI',
                'username' => '197901012007101004',
                'jabatan' => 'Pelaksana Analis Pelayanan',
                'email' => '197901012007101004@kemenag.go.id',
                'password' => Hash::make('197901012007101004'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Upik Mike, S.AP',
                'username' => '198505202014122005',
                'jabatan' => 'Pelaksana Pengadministrasi Keuangan ',
                'email' => '198505202014122005@kemenag.go.id',
                'password' => Hash::make('198505202014122005'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'DENI MARLINA S.Pd.I',
                'username' => '197703072023212012',
                'jabatan' => 'Arsiparis Ahli Pertama ',
                'email' => '197703072023212012@kemenag.go.id',
                'password' => Hash::make('197703072023212012'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],

            // Staff Kepegawaian
            [
                'name' => 'Anna Yoladevika, SH',
                'username' => '197505152005012003',
                'jabatan' => 'Analis Sumber Daya Manusia Aparatur',
                'email' => '197505152005012003@kemenag.go.id',
                'password' => Hash::make('197505152005012003'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Sri Mulyani, SH',
                'username' => '198006222014112002',
                'jabatan' => 'Staf',
                'email' => '198006222014112002@kemenag.go.id',
                'password' => Hash::make('198006222014112002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            // Staff Keuangan
            [
                'name' => 'Yunefri, S.Kom ',
                'username' => '197406142007101001',
                'jabatan' => 'Staf',
                'email' => '197406142007101001@kemenag.go.id',
                'password' => Hash::make('197406142007101001'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Del Junefri, SE',
                'username' => '197606082009121001',
                'jabatan' => 'Staf',
                'email' => '197606082009121001@kemenag.go.id',
                'password' => Hash::make('197606082009121001'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Ramadhanera P Madya, SE',
                'username' => '198705122011012008',
                'jabatan' => 'Staf',
                'email' => '198705122011012008@kemenag.go.id',
                'password' => Hash::make('198705122011012008'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Nila Oksana, A. Ma',
                'username' =>'198210132007102002',
                'jabatan' => 'Staf',
                'email' => '198210132007102002@kemenag.go.id',
                'password' => Hash::make('198210132007102002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Roni Hendra',
                'username' =>'198212152005011002',
                'jabatan' => 'Staf',
                'email' => '198212152005011002@kemenag.go.id',
                'password' => Hash::make('198212152005011002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Asriwansyah',
                'username' =>'198204032005011001',
                'jabatan' => 'Staf',
                'email' => '198204032005011001@kemenag.go.id',
                'password' => Hash::make('198204032005011001'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Meiriza Lidya, S.S',
                'username' => '198605052023212065',
                'jabatan' => 'Pengembang Teknologi Pembelajaran Ahli Pertama',
                'email' => '198605052023212065@kemenag.go.id',
                'password' => Hash::make('198605052023212065 '),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [

                'name' => 'Fauzhi Abdhilah, S.Kom',
                'username' => '198810252023211021',
                'jabatan' => 'Pengembang Teknologi Pembelajaran Ahli Pertama',
                'email' => '198810252023211021@kemenag.go.id',
                'password' => Hash::make('198810252023211021'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [

                'name' => 'AZKA JUANDA, S.Pd',
                'username' => '199307222023211014',
                'jabatan' => 'Pengembang Teknologi Pembelajaran Ahli Pertama',
                'email' => '199307222023211014@kemenag.go.id',
                'password' => Hash::make('199307222023211014'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [

                'name' => 'KIKI DESETRI S.Pd.I',
                'username' => '199009152023211019',
                'jabatan' => 'Pengembang Teknologi Pembelajaran Ahli Pertama',
                'email' => '199009152023211019@kemenag.go.id',
                'password' => Hash::make('199009152023211019'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [

                'name' => 'KIKI DESETRI S.Pd.I',
                'username' => '199009152023211019',
                'jabatan' => 'Pengembang Teknologi Pembelajaran Ahli Pertama',
                'email' => '199009152023211019@kemenag.go.id',
                'password' => Hash::make('199009152023211019'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [

                'name' => 'AFRINOZAYENTI S.AP',
                'username' => '197904092023212012',
                'jabatan' => 'Analis SDM Aparatur Ahli Pertama',
                'email' => '197904092023212012@kemenag.go.id',
                'password' => Hash::make('197904092023212012'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],




            // Staff Penmad
            [

                'name' => 'DEDI GUSTIAWAN, S.Pd.',
                'username' => '198808222023211013',
                'jabatan' => 'Pengembang Teknologi Pembelajaran Ahli Pertama',
                'email' => '198808222023211013@kemenag.go.id',
                'password' => Hash::make('198808222023211013'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Heru Syafri,A.Ma',
                'username' => '198212262005011004',
                'jabatan' => 'Staf',
                'email' => '198212262005011004@kemenag.go.id',
                'password' => Hash::make('198212262005011004'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            
           
            [

                'name' => 'Dewi Martaliza, S.AP',
                'username' => '197903062014122002',
                'jabatan' => 'Staf',
                'email' => '197903062014122002@kemenag.go.id',
                'password' => Hash::make('197903062014122002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            // Staff Haji
            [
                'name' => 'MARDANITA JALPIDA, S.S',
                'username' => '198003162007102002',
                'jabatan' => 'Staf',
                'email' => '198003162007102002@kemenag.go.id',
                'password' => Hash::make('198003162007102002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Liswarti, S.Th I',
                'username' => '198104122009012004',
                'jabatan' => 'Staf',
                'email' => '198104122009012004@kemenag.go.id',
                'password' => Hash::make('198104122009012004'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Martinis, S.Th I',
                'username' => '197101152007102002',
                'jabatan' => 'Staf',
                'email' => '197101152007102002@kemenag.go.id',
                'password' => Hash::make('197101152007102002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            // Staff PAIS
            [
                'name' => 'ENDRIZAL, S.Ag',
                'username' => '197205062007101002',
                'jabatan' => 'Staf',
                'email' => '197205062007101002@kemenag.go.id',
                'password' => Hash::make('197205062007101002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Syafria Norawati, A.Ma',
                'username' => '198004142007102006',
                'jabatan' => 'Staf',
                'email' => '198004142007102006@kemenag.go.id',
                'password' => Hash::make('19800414 200710 2 006'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            // Staff Bimas
            [
                'name' => 'MARSEHARTI, S.Ag',
                'username' => '197208212000032003',
                'jabatan' => 'Staf',
                'email' => '197208212000032003@kemenag.go.id',
                'password' => Hash::make('197208212000032003'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Efnurdawati, S.HI',
                'username' => '197809292005012003',
                'jabatan' => 'Staf',
                'email' => '197809292005012003@kemenag.go.id',
                'password' => Hash::make('197809292005012003'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            // Staff ZaWa
            [
                'name' => 'ERMANINGSIH ',
                'username' => '197706292007102008',
                'jabatan' => 'Staf',
                'email' => '197706292007102008@kemenag.go.id',
                'password' => Hash::make('197706292007102008'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
            [
                'name' => 'EDROMITA',
                'username' => '197801182014111001',
                'jabatan' => 'Pengadministrasi Umum',
                'email' => '197801182014111001@kemenag.go.id',
                'password' => Hash::make('197801182014111001'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],

            // New One
            
            [
                'name' => 'YUSNETI',
                'username' => '196702121998032002',
                'jabatan' => 'Staf',
                'email' => '196702121998032002@kemenag.go.id',
                'password' => Hash::make('196702121998032002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
           
            [
                'name' => 'AFNIZON, S.AP ',
                'username' => '197610182009011004',
                'jabatan' => 'Staf',
                'email' => '197610182009011004@kemenag.go.id',
                'password' => Hash::make('197610182009011004'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
            [
                'name' => 'KOKO NURHADI YANTO ',
                'username' => '198305042014111002',
                'jabatan' => 'Staf',
                'email' => '198305042014111002@kemenag.go.id',
                'password' => Hash::make('198305042014111002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
          
            [
                'name' => 'SARIFAH AINI, S.Th I',
                'username' => '198701032011012010',
                'jabatan' => 'Staf',
                'email' => '198701032011012010@kemenag.go.id',
                'password' => Hash::make('198701032011012010'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
            [
                'name' => 'DODY YUSRIYAL',
                'username' => '198406262007101003',
                'jabatan' => 'Staf',
                'email' => '198406262007101003@kemenag.go.id',
                'password' => Hash::make('198406262007101003'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
            [
                'name' => 'RICHO HARDIATNO, S.Pd',
                'username' => '198312122009011013',
                'jabatan' => 'Staf',
                'email' => '198312122009011013@kemenag.go.id',
                'password' => Hash::make('198312122009011013'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
            [
                'name' => 'USRI',
                'username' => '197505162014111001',
                'jabatan' => 'Staf',
                'email' => '197505162014111001@kemenag.go.id',
                'password' => Hash::make('197505162014111001'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1
            ],
            [
                'name' => 'Jarmil',
                'username' => '198005152005011007',
                'jabatan' => 'Staf',
                'email' => '198005152005011007@kemenag.go.id',
                'password' => Hash::make('198005152005011007'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
            [
                'name' => 'MUCHLIS, S.TP',
                'username' => '197603152005011006',
                'jabatan' => 'Staf',
                'email' => '197603152005011006@kemenag.go.id',
                'password' => Hash::make('197603152005011006'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
            [
                'name' => 'NELDAFINA, A.Md',
                'username' => '197112252007102002',
                'jabatan' => 'Staf',
                'email' => '197112252007102002@kemenag.go.id',
                'password' => Hash::make('197112252007102002'),
                'updated_at' => \Carbon\Carbon::now(),
                'organization_id' => 1

            ],
        ];


        // DB::table('users')->insert($data);

        foreach ($data as $key => $item) {
            \App\Models\User::firstOrCreate(
                ['username' => $item['username']],
                $item
            );
        }
    }
}
