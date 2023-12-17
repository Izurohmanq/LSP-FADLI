<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->text('id_card_address');
            $table->text('current_address');
            $table->string('district');
            $table->string('regency');
            $table->string('province');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->enum('nationality_status', ['WNI', 'WNI Keturanan', 'WNA']);
            $table->string('foreign_nationality')->nullable();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->enum('gender', ['male', 'female']);
            $table->enum('marital_status', ['single', 'married', 'other']);
            $table->enum('religion', ['Islam', 'Catholic', 'Christian', 'Hindu', 'Buddha', 'other']);
            $table->string('document_path')->nullable();
            $table->enum('registration_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
