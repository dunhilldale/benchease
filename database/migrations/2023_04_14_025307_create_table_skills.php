<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Skills;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->boolean('approved')->default(false);

            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
        Skills::create([ 'title' => 'php' ]);
        Skills::create([ 'title' => 'java' ]);
        Skills::create([ 'title' => 'javascript' ]);
        Skills::create([ 'title' => 'nodejs' ]);
        Skills::create([ 'title' => 'vuejs' ]);
        Skills::create([ 'title' => 'reactjs' ]);
        Skills::create([ 'title' => 'angularjs' ]);
        Skills::create([ 'title' => 'laravel' ]);
        Skills::create([ 'title' => 'codeigniter' ]);
        Skills::create([ 'title' => 'yii' ]);
        Skills::create([ 'title' => 'bootstrap css' ]);
        Skills::create([ 'title' => 'tailwind css' ]);
        Skills::create([ 'title' => 'docker' ]);
        Skills::create([ 'title' => 'git' ]);
        Skills::create([ 'title' => 'jira' ]);
        Skills::create([ 'title' => 'trello' ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
