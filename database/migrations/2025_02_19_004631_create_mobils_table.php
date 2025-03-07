<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('nopolisi')->nullable();
            $table->string('merk')->nullable();
            $table->enum('jenis', ['sedan', 'MPV', 'SUV'])->nullable(); // Perbaikan "MVP" menjadi "MPV"
            $table->integer('kapasitas')->nullable(); // Mengubah ke integer
            $table->integer('harga')->nullable(); // Mengubah ke integer
            $table->string('foto')->nullable(); // Tidak perlu text, string sudah cukup
            $table->timestamps();
            $table->softDeletes('deleted_at'); // Tidak perlu parameter
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
