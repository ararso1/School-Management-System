<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendSmStudentIdCardsForTemplates extends Migration
{
    public function up()
    {
        Schema::table('sm_student_id_cards', function (Blueprint $table) {
            if (!Schema::hasColumn('sm_student_id_cards', 'design_mode')) {
                $table->string('design_mode', 30)->default('classic')->after('page_layout_style');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'background_img_back')) {
                $table->string('background_img_back')->nullable()->after('background_img');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'gender')) {
                $table->string('gender')->default('0')->after('blood');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'admission_date')) {
                $table->string('admission_date')->default('0')->after('gender');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'guardian_name')) {
                $table->string('guardian_name')->default('0')->after('admission_date');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'guardian_phone')) {
                $table->string('guardian_phone')->default('0')->after('guardian_name');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'show_qr')) {
                $table->string('show_qr')->default('0')->after('guardian_phone');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'field_positions')) {
                $table->longText('field_positions')->nullable()->after('show_qr');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'font_family')) {
                $table->string('font_family')->nullable()->after('field_positions');
            }
            if (!Schema::hasColumn('sm_student_id_cards', 'font_color')) {
                $table->string('font_color', 30)->nullable()->after('font_family');
            }
        });
    }

    public function down()
    {
        Schema::table('sm_student_id_cards', function (Blueprint $table) {
            $columns = [
                'design_mode',
                'background_img_back',
                'gender',
                'admission_date',
                'guardian_name',
                'guardian_phone',
                'show_qr',
                'field_positions',
                'font_family',
                'font_color',
            ];
            foreach ($columns as $column) {
                if (Schema::hasColumn('sm_student_id_cards', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
