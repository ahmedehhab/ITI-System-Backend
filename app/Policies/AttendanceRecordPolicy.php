<?php

namespace App\Policies;

use App\Models\AttendanceRecord;
use App\Models\Session;
use App\Models\User;

class AttendanceRecordPolicy
{
   // who can list records for a given session. 
    public function viewAny(User $user, Session $session): bool
    {
        return match ($user->role) {
            'branch_manager', 'track_admin' => true,
            'instructor' => $session->engagement->instructor_id === $user->id,
            default => false,
        };
    }

  // who can post attendance records for a session.
    public function create(User $user, Session $session): bool
    {
        return match ($user->role) {
            'track_admin' => $session->engagement->cohort
                ->trackAdmins()->where('user_id', $user->id)->exists(),
            'instructor'  => $session->engagement->instructor_id === $user->id,
            default       => false,
        };
    }

   // track admins or the session's instructor only can update a record.
    public function update(User $user, AttendanceRecord $record): bool
    {
        $session = $record->session;

        return match ($user->role) {
            'track_admin' => $session->engagement->cohort
                ->trackAdmins()->where('user_id', $user->id)->exists(),
            'instructor'  => $session->engagement->instructor_id === $user->id,
            default       => false,
        };
    }

     // students see only their own history.
    // admins and instructors can view any student's history.
    public function viewHistory(User $user, User $student): bool
    {
        return match ($user->role) {
            'branch_manager', 'track_admin', 'instructor' => true,
            'student' => $user->id === $student->id,
            default   => false,
        };
    }
}