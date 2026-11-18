
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekspedisi', function (Blueprint $table) {
            $table->integer('tarif')->after('zona');
            $table->string('estimasi', 50)->after('tarif');
        });
    }

    public function down(): void
    {
        Schema::table('ekspedisi', function (Blueprint $table) {
            $table->dropColumn(['tarif', 'estimasi']);
        });
    }
};
