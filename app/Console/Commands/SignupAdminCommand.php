<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SignupAdminCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "signup:admin {email} {name=Admin}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Creates a admin account.";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $password1 = null;
        $password2 = null;
        $vaildPassword = false;
        while (!$vaildPassword) {
            $password1 = $this->secret("Enter a admin password: ");
            $password2 = $this->secret("Repeat password: ");
            if (!is_string($password1) || !is_string($password2)) {
                $this->error("No string given as password!");
                continue;
            }
            if ($password1 !== $password2) {
                $this->error("Passwords do not match! Please reenter.");
                continue;
            }
            $vaildPassword = true;
        }
        User::create([
            "email" => $this->argument("email"),
            "name" => $this->argument("name"),
            "password" => Hash::make($password1),
        ]);
        $this->info("Account successfully created.");
    }
}
