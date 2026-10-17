<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE orders MODIFY COLUMN payment_method ENUM('cod', 'momo', 'vnpay') DEFAULT 'cod'");
        DB::statement("ALTER TABLE payments MODIFY COLUMN gateway ENUM('cod', 'momo', 'vnpay') DEFAULT 'cod'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back (note: this will cause issues if there are existing 'vnpay' records)
        DB::statement("ALTER TABLE orders MODIFY COLUMN payment_method ENUM('cod', 'momo') DEFAULT 'cod'");
        DB::statement("ALTER TABLE payments MODIFY COLUMN gateway ENUM('cod', 'momo') DEFAULT 'cod'");
    }
};
