<?php

namespace App\Services;

use App\Models\AttendanceLedger;
use App\Models\AttendanceRecord;
use App\Models\User;

class AttendanceLedgerService
{
    // called when student is enrolled.
    public function initialise(User $student, string $cohortId): AttendanceLedger
    {
        return AttendanceLedger::firstOrCreate(
            ['student_id' => $student->id, 'cohort_id' => $cohortId],
            ['balance'    => config('attendance.starting_balance')],
        );
    }

     // Deduct points for a new absence
    public function deduct(User $student, string $cohortId, string $status): void
    {
        $amount = $this->deductionFor($status);

        if ($amount === 0) {
            return; 
        }

        $ledger = $this->ledgerFor($student, $cohortId);
        $ledger->decrement('balance', $amount);
    }

    // Adjust the ledger when an attendance record's status changes.
    public function adjustForStatusChange(
        AttendanceRecord $record,
        string $oldStatus,
        string $newStatus,
        string $cohortId,
    ): void {
        if ($oldStatus === $newStatus) {
            return;
        }

        $ledger = $this->ledgerFor($record->student, $cohortId);
        $ledger->increment('balance', $this->deductionFor($oldStatus));
        $ledger->decrement('balance', $this->deductionFor($newStatus));
    }

    // Return the student's current balance for a cohort.
    public function balance(User $student, string $cohortId): int
    {
        return $this->ledgerFor($student, $cohortId)->balance;
    }

    //Helpers

    private function deductionFor(string $status): int
    {
        return match ($status) {
            'absent'  => config('attendance.unexcused_deduction') ,
            'excused' => config('attendance.excused_deduction') ,
            default   => 0,
        };
    }

    private function ledgerFor(User $student, string $cohortId): AttendanceLedger
    {
        return AttendanceLedger::firstOrCreate(
            ['student_id' => $student->id, 'cohort_id' => $cohortId],
            ['balance'    => config('attendance.starting_balance')],
        );
    }
}