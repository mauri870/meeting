<?php namespace Modules\Meeting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		for($i=1;$i<=3;$i++){
			DB::table('posts')->insert([
				'name' => 'Post'.$i,
				'user_id' => $i,
				'content' => 'Conteúdo post'.$i,
				'published' => 'true',
				'created_at' => \Carbon\Carbon::now(),
				'updated_at' => \Carbon\Carbon::now(),
			]);
		}
	}

}