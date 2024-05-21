<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->json('services');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->json('branches');
            $table->string('logo')->nullable();
            $table->timestamps();

            // Add foreign key constraints if needed
            // $table->foreign('country')->references('id')->on('countries');
            // $table->foreign('state')->references('id')->on('states');
            // $table->foreign('city')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
