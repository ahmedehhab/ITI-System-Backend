<?php

namespace App\Policies;

use App\Models\AttendanceLedger;
use App\Models\User;

class AttendanceLedgerPolicy
{
    /**
     * Students see only their own ledger 
     * Track admins, branch managers, and instructors may view any student's ledger.
     */
    public function view(User $user, User $student): bool
    {
        return match ($user->role) {
            'branch_manager', 'track_admin', 'instructor' => true,
            'student' => $user->id === $student->id,
            default   => false,
        };
    }
}