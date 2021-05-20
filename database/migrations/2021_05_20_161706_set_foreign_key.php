<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetForeignKey extends Migration
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

        // SET foreign key for table contracts (contracts.worker_id = workers.id)
        if (Schema::hasColumn('contracts', 'worker_id') && Schema::hasTable('workers')) {
            Schema::table('contracts', function (Blueprint $table) {
                $table->foreign('worker_id')->references('id')->on('workers');
            });
        }

         // SET foreign key for table contracts (contracts.contract_type_id = contractTypes.id)
         if (Schema::hasColumn('contracts', 'contract_type_id') && Schema::hasTable('contractTypes')) {
            Schema::table('contracts', function (Blueprint $table) {
                $table->foreign('contract_type_id')->references('id')->on('contractTypes');
            });
        }

         // SET foreign key for table contracts (contracts.record_id = records.id)
         if (Schema::hasColumn('contracts', 'record_id') && Schema::hasTable('records')) {
            Schema::table('contracts', function (Blueprint $table) {
                $table->foreign('record_id')->references('id')->on('records');
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
        //
    }
}
