<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tbltanggapan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_tanggapan'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_pengaduan'       => [
				'type'           => 'INT',
				'constraint'     => '11',
			],
			'tanggal_tanggapan'       => [
				'type'           => 'DATE',

			],
			'tanggapan' => [
				'type'           => 'TEXT',
				'constraint'     => '255',
			]

		]);
		$this->forge->addKey('id_tanggapan', true);
		$this->forge->createTable('tbltanggapan');
	}

	public function down()
	{
		$this->forge->dropTable('tbltanggapan');
	}
}
