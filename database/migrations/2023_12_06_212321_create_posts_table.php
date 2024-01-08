<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->double("price")->default(0.0);
            $table->string("short_desc" , 500)->nullable();
            $table->text("desc")->nullable();
            $table->foreignId("owner_id")->references("id")->on("users")->cascadeOnDelete();
            $table->string("custom_email")->nullable();
            $table->string("custom_phone" , 14)->nullable();
            $table->string("image" , 300)->nullable();
            $table->boolean("is_featured")->default(false);
            $table->foreignIdFor(\App\Models\Country::class);
            $table->foreignIdFor(\App\Models\State::class);
            $table->foreignIdFor(\App\Models\Category::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
