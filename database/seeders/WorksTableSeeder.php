<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('works')->delete();
        
        \DB::table('works')->insert(array (
            0 => 
            array (
                'id' => 4,
                'created_at' => '2024-02-13 07:51:38',
                'updated_at' => '2024-02-13 08:07:30',
                'report_id' => 5,
                'work_name' => 'Konsultasi dan Koordinasi dengan atasan',
                'work_detail' => 'Melakukan Konsultasi dan Laporan kepada Kasubag terkait SE Sekjen tentang Statistik data dan informasi',
                'volume' => 1,
                'unit' => 5,
                'evidence' => 'Dokumentasi Foto',
            ),
            1 => 
            array (
                'id' => 5,
                'created_at' => '2024-02-13 08:01:52',
                'updated_at' => '2024-02-13 08:08:44',
                'report_id' => 5,
                'work_name' => 'Perencanaan Sistem Informasi',
                'work_detail' => 'Sistem LCKH - Melakukan Analisa Sistem Informasi dengan membuat User Story Sistem',
                'volume' => 1,
                'unit' => 6,
                'evidence' => 'Laporan Pengembangan',
            ),
            2 => 
            array (
                'id' => 6,
                'created_at' => '2024-02-13 08:09:15',
                'updated_at' => '2024-02-13 08:09:15',
                'report_id' => 6,
                'work_name' => 'Perencanaan Sistem Informasi',
                'work_detail' => 'Sistem LCKH - Melakukan Analisa dan Rancang Bangun Sistem',
                'volume' => 1,
                'unit' => 3,
                'evidence' => 'Dokumentasi',
            ),
            3 => 
            array (
                'id' => 7,
                'created_at' => '2024-02-13 08:10:29',
                'updated_at' => '2024-02-13 08:10:29',
                'report_id' => 6,
                'work_name' => 'Konsultasi dan Koordinasi dengan atasan',
                'work_detail' => 'Melakukan Konsultasi dan Laporan kepada Kasubag terkait SE Sekjen tentang Statistik data dan informasi',
                'volume' => 1,
                'unit' => 5,
                'evidence' => 'Foto Dokumentasi',
            ),
            4 => 
            array (
                'id' => 8,
                'created_at' => '2024-02-13 08:10:58',
                'updated_at' => '2024-02-13 08:10:58',
                'report_id' => 7,
                'work_name' => 'Konsultasi dan Koordinasi dengan atasan',
            'work_detail' => 'Konsolidasi dengan Kasi PHU dan Kakankemenag terkait pengumpulan Data dan Bukti Dukung Program BERANI (Benah Rumah Bina Penghuni)',
                'volume' => 1,
                'unit' => 3,
                'evidence' => 'Foto Dokumentasi',
            ),
            5 => 
            array (
                'id' => 9,
                'created_at' => '2024-02-13 08:11:41',
                'updated_at' => '2024-02-13 08:11:41',
                'report_id' => 8,
                'work_name' => 'Melakukan modifikasi data dan informasi',
                'work_detail' => 'Membuat dan mengelola link Google Drive pengumpulan Dokumentasi Program BERANI Tahun 2022 sampai 2024',
                'volume' => 1,
                'unit' => 3,
                'evidence' => 'Dokumen Google Drive',
            ),
            6 => 
            array (
                'id' => 10,
                'created_at' => '2024-02-13 08:12:59',
                'updated_at' => '2024-02-13 08:12:59',
                'report_id' => 8,
                'work_name' => 'Diseminasi dan Pengelolaan Data Informasi',
                'work_detail' => 'Membuat dan mengelola formulir spreadsheet data Profil Penerima Manfaat BERANI Tahun 2022 sampai 2024',
                'volume' => 1,
                'unit' => 2,
                'evidence' => 'Dokumen',
            ),
            7 => 
            array (
                'id' => 11,
                'created_at' => '2024-02-13 08:14:15',
                'updated_at' => '2024-02-13 08:14:15',
                'report_id' => 7,
                'work_name' => 'Memfasilitasi kegiatan Kegiatan melalui Video Conference',
                'work_detail' => 'Memfasilitasi kegiatan Rakernas Kemenag RI 2024 via Zoom Online',
                'volume' => 1,
                'unit' => 5,
                'evidence' => 'Foto Dokumentasi',
            ),
            8 => 
            array (
                'id' => 12,
                'created_at' => '2024-02-13 08:14:56',
                'updated_at' => '2024-02-13 08:14:56',
                'report_id' => 9,
                'work_name' => 'Membuat Laporan',
            'work_detail' => 'Membuat dan merapikan laporan Program Inovasi BERANI (Benah Rumah dan Bina Penghuni)',
                'volume' => 1,
                'unit' => 3,
                'evidence' => 'Dokumen',
            ),
            9 => 
            array (
                'id' => 13,
                'created_at' => '2024-02-13 08:15:25',
                'updated_at' => '2024-02-13 08:15:25',
                'report_id' => 9,
                'work_name' => 'Perencanaan Sistem Informasi',
                'work_detail' => 'Sistem LCKH - Melakukan Perancangan Basis Data',
                'volume' => 1,
                'unit' => 3,
                'evidence' => 'Dokumentasi',
            ),
        ));
        
        
    }
}