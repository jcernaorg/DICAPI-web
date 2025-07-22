<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class TestAuth extends Command
{
    protected $signature = 'test:auth {email} {password}';
    protected $description = 'Test authentication with given credentials';

    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("Usuario no encontrado: {$email}");
            return;
        }

        $this->info("Usuario encontrado: {$user->name} ({$user->email})");

        if (Hash::check($password, $user->password)) {
            $this->info("✅ Contraseña correcta");
        } else {
            $this->error("❌ Contraseña incorrecta");
            $this->info("Hash almacenado: " . $user->password);
        }
    }
} 