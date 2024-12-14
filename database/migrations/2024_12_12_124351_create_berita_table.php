<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('content');
            $table->enum('status', ['draft', 'published', 'archived']);
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('file_id')->nullable()->constrained('files')->onDelete('set null');

        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
};
