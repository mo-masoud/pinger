<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->json("name")->nullable();
            $table->string("main_order_id")->nullable();
            $table->string("backup_order_id")->nullable();
            $table->string("lan_ip")->nullable();
            $table->string("wan_ip")->nullable();
            $table->string("tunnel_ip")->nullable();
            $table->string("ips")->nullable();
            $table->string("isp")->nullable();
            $table->timestamps();
        });

        Schema::create('branch_data', function (Blueprint $table) {
            $table->id();
            // branch id
            $table->string("key")->nullable(); // test
            $table->longText("value")->nullable(); // value
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
        Schema::dropIfExists('branch_data');
        Schema::dropIfExists('branches');
    }
}
