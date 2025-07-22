<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FailedLoginAttempt extends Model
{
    protected $fillable = [
        'email',
        'ip_address',
        'attempts'
    ];

    public function incrementAttempts()
    {
        $this->increment('attempts');
        $this->save();
    }

    public function resetAttempts()
    {
        $this->update([
            'attempts' => 0
        ]);
    }

    public function requiresCaptcha()
    {
        return $this->attempts >= 3;
    }
}
