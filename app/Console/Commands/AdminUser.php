<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminUser extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'make:AdminUser';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create new admin user to edit movies and quotes';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$input['name'] = $this->ask('Name?');
		$input['username'] = $this->ask('Username?');
		$input['email'] = $this->ask('Email?');
		$input['password'] = $this->secret('What is the password?');
		// $input['password'] = bcrypt($input['password']);
		$input['admin'] = 1;
		User::create($input);
		$this->info('Data added successfully');
		return Command::SUCCESS;
	}
}
