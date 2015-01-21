<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

#		$this->call('UserSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('TeachersTableSeeder');
		$this->call('StepsTableSeeder');
		$this->call('CountriesTableSeeder');
		$this->call('AssessorsTableSeeder');		
		$this->call('LanguagesTableSeeder');
		$this->call('RegistrationsTableSeeder');
		$this->call('ApplicationsTableSeeder');
		$this->call('PaymentsTableSeeder');
		$this->call('CountriesListsTableSeeder');
	}

}
