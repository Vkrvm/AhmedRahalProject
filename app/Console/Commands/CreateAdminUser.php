<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminUser extends Command
{
	/**
	 * The name and signature of the console command.
	 */
	protected $signature = 'user:create-admin {--name=} {--email=} {--password=}';

	/**
	 * The console command description.
	 */
	protected $description = 'Create an admin user securely via CLI';

	/**
	 * Execute the console command.
	 */
	public function handle(): int
	{
		$name = $this->option('name') ?? $this->ask('Name');
		$email = $this->option('email') ?? $this->ask('Email');
		$password = $this->option('password') ?? $this->secret('Password (will not echo)');
		$confirm = $this->secret('Confirm Password');

		if ($password !== $confirm) {
			$this->error('Passwords do not match.');
			return self::FAILURE;
		}

		$validator = Validator::make(
			compact('name', 'email', 'password'),
			[
				'name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
				'password' => ['required', 'string', 'min:8'],
			]
		);

		if ($validator->fails()) {
			foreach ($validator->errors()->all() as $message) {
				$this->error($message);
			}
			return self::FAILURE;
		}

		$user = User::create([
			'name' => $name,
			'email' => $email,
			'password' => Hash::make($password),
		]);

		$this->info('Admin user created: '.$user->email);
		return self::SUCCESS;
	}
}
