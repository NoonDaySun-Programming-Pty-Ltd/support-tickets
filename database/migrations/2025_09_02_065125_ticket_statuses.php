<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $now = now();
        $sql = <<<'SQL'
        INSERT INTO ticket_statuses (name, description, created_at, updated_at) VALUES
            ('Open', 'The ticket is open and awaiting action.', ?, ?),
            ('Assigned', 'Ticket has been assigned for work.', ?, ?),
            ('In Progress', 'Work on the ticket is currently underway.', ?, ?),
            ('In Testing', 'QA confirming fix', ?, ?),
            ('Resolved', 'The issue has been resolved but not yet verified by the reporter.', ?, ?),
            ('Closed', 'The ticket has been closed after verification.', ?, ?),
            ('Reopened', 'The ticket has been reopened after being closed.', ?, ?),
            ('On Hold', 'The ticket is on hold pending further information or action.', ?, ?);
        SQL;

        DB::insert(query: $sql, bindings: array_fill(start_index: 0, count: 16, value: $now));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(query: 'TRUNCATE TABLE ticket_statuses RESTART IDENTITY CASCADE;');
    }
};
