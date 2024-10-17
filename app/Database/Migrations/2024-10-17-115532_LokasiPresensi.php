<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LokasiPresensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat_lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tipe_lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'latitude' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'longtitude' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'radius' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'zona_waktu' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'jam_masuk' => [
                'type' => 'TIME'
            ],
            'jam_keluar' => [
                'type' => 'TIME'
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('lokasi_presensi');
    }

    public function down()
    {
        $this->forge->dropTable('lokasi_presensi');
    }
}
