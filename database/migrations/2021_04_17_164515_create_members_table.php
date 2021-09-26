<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("date_of_birth");
            $table->string("image_path")->nullable();
            $table->string("gender");
            $table->string("phone")->unique();
            $table->string("cnic")->nullable()->unique();
            $table->date("date");
            $table->string("email")->nullable()->unique();
            $table->string("adress");
            $table->string("timing");
            $table->string("is_active")->default('1');
            $table->string("password")->nullable();
            $table->string("hire_trainer")->default('0');
            $table->integer("trainer_fee")->default(0);
            $table->integer("package_id");
            $table->integer("discount")->default(0);
            $table->integer("admission_fee");
            $table->date("package_expire_at");
            $table->integer("payee_id")->nullable();//employee_id -> trainer 
            $table->integer("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
