<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Skills;
use App\Models\User;

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

        $admin = User::where('employee_id', '2022-001')->firstOrFail();
        Skills::create([ 'title' => 'php', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'java', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'javascript', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'nodejs', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'vuejs', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'reactjs', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'angularjs', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'laravel', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'codeigniter', 'created_by' => $admin->id, 'approved' => true  ]);
        Skills::create([ 'title' => 'yii', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'bootstrap css', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'tailwind css', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'docker', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'git', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'jira', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'trello', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => '.net', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'wordpress', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'shopify', 'created_by' => $admin->id, 'approved' => true ]);
        Skills::create([ 'title' => 'webflow', 'created_by' => $admin->id, 'approved' => true ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
