<?php

namespace App\Console\Commands;

use App\Models\FailedLoginAttempt;
use Illuminate\Console\Command;
use Carbon\Carbon;

class CleanupFailedLogins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:cleanup-failed-logins {--days=7 : Number of days to keep failed login attempts}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up old failed login attempts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = $this->option('days');
        $cutoffDate = Carbon::now()->subDays($days);

        $deletedCount = FailedLoginAttempt::where('created_at', '<', $cutoffDate)->delete();

        $this->info("Deleted {$deletedCount} old failed login attempts older than {$days} days.");
    }
} 