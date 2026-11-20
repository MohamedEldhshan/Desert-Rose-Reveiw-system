<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create
                            {email : The admin email address}
                            {--name=Admin : The admin display name}
                            {--password= : The admin password (generated if omitted)}';

    protected $description = 'Create or update an admin user';

    public function handle(): int
    {
        $email = strtolower(trim((string) $this->argument('email')));

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Invalid email address.');
            return self::FAILURE;
        }

        $password = $this->option('password');
        $generated = false;

        if (empty($password)) {
            $password = Str::password(16);
            $generated = true;
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $this->option('name') ?: 'Admin',
                'password' => Hash::make($password),
                'is_admin' => true,
            ]
        );

        $this->info("Admin user ready: {$user->email}");

        if ($generated) {
            $this->warn("Generated password: {$password}");
            $this->warn('Store this password securely. It will not be shown again.');
        }

        return self::SUCCESS;
    }
}
