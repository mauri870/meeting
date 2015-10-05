<?php namespace Modules\Meeting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MeetingTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		for($i=1;$i<=3;$i++){
			DB::table('meetings')->insert([
				'name' => 'Reunião'.$i,
				'subject'=>'Assunto'.$i,
				'content' => 'Conteúdo reunião'.$i,
				'file' => '',
				'user_id'=>1,
				'date'=> \Carbon\Carbon::now()->addDay($i),
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now(),
			]);
		}
	}

}