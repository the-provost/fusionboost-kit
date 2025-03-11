<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable()->unique()->index();
            $table->string('email')->unique()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('avatar')->nullable();

            // Organization related fields
            $table->string('org')->nullable();
            $table->string('organization_id')->nullable()->index();
            $table->string('erp_user_id')->nullable()->index();

            // User preferences
            $table->string('locale', 10)->default('en-US');
            $table->string('billing_locale', 10)->default('en-US');
            $table->string('device_token')->nullable()->unique();

            // User type and status
            $table->enum('user_type', ['user', 'admin'])->default('user');
            $table->boolean('activation')->default(false);
            $table->string('lindex')->nullable()->unique()->index();

            $table->rememberToken();
            $table->timestamps();

            // Add foreign key if organization_id references another table
            // $table->foreign('organization_id')
            //     ->references('id')
            //     ->on('organizations')
            //     ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
