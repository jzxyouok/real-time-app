<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table(users::class)->truncate();

        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder {
	public function run()
	{
		$faker = Faker::create();

		foreach(range(1,4) as $index)
		{
			User::create([
				'name' => $faker->name,
				'email' => $faker->safeEmail(),
				'online_status' => 0,
				'password' => bcrypt(str_random(10)),
				'remember_token' => str_random(10)
			]);
		}
	}
}
