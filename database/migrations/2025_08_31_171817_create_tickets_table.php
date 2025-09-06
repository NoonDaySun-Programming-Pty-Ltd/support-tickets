<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->text(column: 'title');
            $table->text(column: 'description')->nullable();
            $table->tinyInteger(column: 'priority')->default(1);
            $table->foreignId(column: 'status_id')->constrained(table: 'ticket_statuses');
            $table->foreignId(column: 'assignee_id')->nullable()->constrained(table: 'users');
            $table->foreignId(column: 'created_by')->constrained(table: 'users');
            $table->foreignId(column: 'updated_by')->nullable()->constrained(table: 'users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
