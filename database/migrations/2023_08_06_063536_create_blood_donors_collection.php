<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodDonorsCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('blood_donors', function (Blueprint $collection) {
            $collection->id(); // Add primary key, not mandatory for MongoDB
            $collection->string('firstName');
            $collection->string('lastName');
            $collection->string('email');
            $collection->string('bloodType');
            $collection->string('address');
            $collection->string('city');
            $collection->string('postalCode');
            $collection->string('imageUpload'); // Change the data type based on your needs
            $collection->string('medicalDocument'); // Change the data type based on your needs
            $collection->string('bloodDonationCard'); // Change the data type based on your needs
            $collection->string('nicOrPassport');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('blood_donors');
    }
}
