<?php namespace Modules\Meeting\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OccupationsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		DB::table('occupations')->insert([
			'name' => 'Secretária',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		DB::table('occupations')->insert([
			'name' => 'gerente',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		DB::table('occupations')->insert([
			'name' => 'Montador',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
	}

}