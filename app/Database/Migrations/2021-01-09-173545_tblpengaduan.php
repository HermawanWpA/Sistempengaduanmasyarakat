<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tblpengaduan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pengaduan'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'tanggal_pengaduan'       => [
				'type'           => 'DATE',

			],
			'nik' => [
				'type'           => 'INT',
				'constraint'     => '12',
			],
			'isi_laporan'       => [
				'type'           => 'TEXT',
				'constraint'     => '255',
			],
			'poto'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'status'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			]
		]);
		$this->forge->addKey('id_pengaduan', true);
		$this->forge->createTable('tblpengaduan');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_pengaduan');
	}
}
