<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // SET foreign key for table users (users.role_id = roles.id)
       if (Schema::hasColumn('users', 'role_id') && Schema::hasTable('roles')) {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    // SET foreign key for table permission_role (permission_role.role_id = roles.id)
    if (Schema::hasColumn('permission_role', 'role_id') && Schema::hasTable('roles')) {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

     // SET foreign key for table permission_role (permission_role.permission_id = permissions.id)
     if (Schema::hasColumn('permission_role', 'permission_id') && Schema::hasTable('permissions')) {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('permission_id')->references('id')->on('permissions');
        });
    }

    // SET foreign key for table workers (workers.department_id = departments.id)
     if (Schema::hasColumn('workers', 'department_id') && Schema::hasTable('departments')) {
        Schema::table('workers', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    // SET foreign key for table workers (workers.position_id = positions.id)
    if (Schema::hasColumn('workers', 'position_id') && Schema::hasTable('positions')) {
        Schema::table('workers', function (Blueprint $table) {
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    // SET foreign key for table workers (workers.salary_id = salaries.id)
    if (Schema::hasColumn('workers', 'salary_id') && Schema::hasTable('salaries')) {
        Schema::table('workers', function (Blueprint $table) {
            $table->foreign('salary_id')->references('id')->on('salaries');
        });
    }

    // SET foreign key for table worker_record (worker_record.worker_id = workers.id)
    if (Schema::hasColumn('worker_record', 'worker_id') && Schema::hasTable('workers')) {
        Schema::table('worker_record', function (Blueprint $table) {
            $table->foreign('worker_id')->references('id')->on('workers');
        });
    }

     // SET foreign key for table worker_record (worker_record.record_id = records.id)
     if (Schema::hasColumn('worker_record', 'record_id') && Schema::hasTable('records')) {
        Schema::table('worker_record', function (Blueprint $table) {
            $table->foreign('record_id')->references('id')->on('records');
        });
    }

    // SET foreign key for table contract_worker (contract_worker.worker_id = workers.id)
    if (Schema::hasColumn('contract_worker', 'worker_id') && Schema::hasTable('workers')) {
        Schema::table('contract_worker', function (Blueprint $table) {
            $table->foreign('worker_id')->references('id')->on('workers');
        });
    }

    // SET foreign key for table contract_worker (contract_worker.contract_id = contracts.id)
    if (Schema::hasColumn('contract_worker', 'contract_id') && Schema::hasTable('contracts')) {
        Schema::table('contract_worker', function (Blueprint $table) {
            $table->foreign('contract_id')->references('id')->on('contracts');
        });
    }
     // SET foreign key for table contracts (contracts.contract_type_id = contractTypes.id)
     if (Schema::hasColumn('contracts', 'contract_type_id') && Schema::hasTable('contract_types')) {
        Schema::table('contracts', function (Blueprint $table) {
            $table->foreign('contract_type_id')->references('id')->on('contract_types');
        });
    }

  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_foreign_key');
    }
}
