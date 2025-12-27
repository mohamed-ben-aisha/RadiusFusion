<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('downrate')->default(0);
            $table->integer('uprate')->default(0);
            $table->boolean('limitdl')->default(false);
            $table->boolean('limitul')->default(false);
            $table->boolean('limitcomb')->default(false);
            $table->boolean('limitexpiration')->default(false);
            $table->boolean('limituptime')->default(false);
            $table->string('poolname')->default('');
            $table->integer('unitprice')->default(0);
            $table->integer('unitpriceadd')->default(0);
            $table->integer('timebaseexp')->default(0);
            $table->integer('timebaseonline')->default(0);
            $table->integer('timeunitexp')->default(0);
            $table->integer('timeunitonline')->default(0);
            $table->integer('trafficunitdl')->default(0);
            $table->integer('trafficunitul')->default(0);
            $table->integer('trafficunitcomb')->default(0);
            $table->integer('inittimeexp')->default(0);
            $table->integer('inittimeonline')->default(0);
            $table->integer('initdl')->default(0);
            $table->integer('initul')->default(0);
            $table->integer('inittotal')->default(0);
            $table->boolean('srvtype')->default(0);
            $table->integer('timeaddmodeexp')->default(0);
            $table->integer('timeaddmodeonline')->default(0);
            $table->integer('trafficaddmode')->default(0);
            $table->boolean('monthly')->default(false);
            $table->boolean('enaddcredits')->default(false);
            $table->integer('minamount')->default(0);
            $table->integer('minamountadd')->default(0);
            $table->boolean('resetctrdate')->default(false);
            $table->boolean('resetctrneg')->default(false);
            $table->boolean('pricecalcdownload')->default(false);
            $table->boolean('pricecalcupload')->default(false);
            $table->boolean('pricecalcuptime')->default(false);
            $table->boolean('unitpricetax')->default(false);
            $table->boolean('unitpriceaddtax')->default(false);
            $table->boolean('enableburst')->default(false);
            $table->integer('dlburstlimit')->default(0);
            $table->integer('ulburstlimit')->default(0);
            $table->integer('dlburstthreshold')->default(0);
            $table->integer('ulburstthreshold')->default(0);
            $table->integer('dlbursttime')->default(0);
            $table->integer('ulbursttime')->default(0);
            $table->boolean('enableservice')->default(true);
            $table->integer('dlquota')->default(0);
            $table->integer('ulquota')->default(0);
            $table->integer('combquota')->default(0);
            $table->integer('timequota')->default(0);
            $table->integer('priority')->default(8);
            $table->integer('nextsrvid')->default(-1);
            $table->integer('dailynextsrvid')->default(-1);
            $table->integer('disnextsrvid')->default(-1);
            $table->boolean('availucp')->default(false);
            $table->boolean('renew')->default(false);
            $table->boolean('carryover')->default(false);
            $table->boolean('policymapul')->default(false);
            $table->boolean('custattr')->default(false);
            $table->boolean('gentftp')->default(false);
            $table->boolean('cmcfg')->default(false);
            $table->boolean('advcmcfg')->default(false);
            $table->boolean('addamount')->default(false);
            $table->boolean('ignstatip')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
