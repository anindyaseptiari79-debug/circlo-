<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add the Student Account attributes from the domain model to the users table.
     * (name = fullName, created_at = memberSince)
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('student_id', 20)->unique()->after('id');
            $table->string('phone_number', 20)->nullable()->after('password');
            $table->string('campus_pickup_point')->nullable()->after('phone_number');
            $table->text('about')->nullable()->after('campus_pickup_point');
            $table->enum('account_status', ['Active', 'Suspended', 'Removed'])->default('Active')->after('about');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['student_id', 'phone_number', 'campus_pickup_point', 'about', 'account_status']);
        });
    }
};
