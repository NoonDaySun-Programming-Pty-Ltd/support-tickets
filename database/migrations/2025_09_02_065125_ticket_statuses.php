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
        $sql = <<<'SQL'
        INSERT INTO ticket_statuses (name, description, created_at, updated_at) VALUES
            ('Open', 'The ticket is open and awaiting action.', NOW(), NOW()),
            ('Assigned', 'Ticket has been assigned for work.', NOW(), NOW()),
            ('In Progress', 'Work on the ticket is currently underway.', NOW(), NOW()),
            ('Resolved', 'The issue has been resolved but not yet verified by the reporter.', NOW(), NOW()),
            ('Closed', 'The ticket has been closed after verification.', NOW(), NOW()),
            ('Reopened', 'The ticket has been reopened after being closed.', NOW(), NOW()),
            ('On Hold', 'The ticket is on hold pending further information or action.', NOW(), NOW());
        SQL;

        DB::statement(query: $sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement(query: 'TRUNCATE TABLE ticket_statuses RESTART IDENTITY CASCADE;');
    }
};
