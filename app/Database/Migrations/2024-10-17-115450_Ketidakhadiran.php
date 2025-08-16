<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ketidakhadiran extends Migration
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
            'id_pegawai' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'deskripsi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addKey('id', true); // primary key
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id'); // foreign key
        // Create the ketidakhadiran table
        $this->forge->createTable('ketidakhadiran');
    }

    public function down()
    {
        $this->forge->dropTable('ketidakhadiran');
    }
}
