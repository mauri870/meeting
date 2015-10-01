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
			'name' => 'PCP',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		DB::table('occupations')->insert([
			'name' => 'Escritório',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		DB::table('occupations')->insert([
			'name' => 'Engenharia',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
	}

}