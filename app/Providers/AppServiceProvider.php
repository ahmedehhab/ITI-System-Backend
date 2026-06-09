<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

// Models
use App\Models\Session;
use App\Models\AttendanceRecord;
use App\Models\AttendanceLedger;

// Policies
use App\Policies\SessionPolicy;
use App\Policies\AttendanceRecordPolicy;
use App\Policies\AttendanceLedgerPolicy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Session::class,          SessionPolicy::class);
        Gate::policy(AttendanceRecord::class,  AttendanceRecordPolicy::class);
        Gate::policy(AttendanceLedger::class,  AttendanceLedgerPolicy::class);
    }
}
