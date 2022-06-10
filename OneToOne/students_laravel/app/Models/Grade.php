<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grade extends Model
{
    use HasFactory;

    /**
     * Grade constructor.
     * @param $subject
     * @param $value
     * @param $exam_date
     */


    public static function getGradeById($id) {
        $grade = Grade::where('id', $id)->get();

        foreach ($grade as $data) return $data;
    }

    public static function insert($request, $studentId) {
          DB::table('grades')->insert([
              'subject' => $request->subject,
              'value' => $request->value,
              'exam_date' => $request->exam_date,
              'student_id' => $studentId,
              'teacher_id' => auth()->user()->id,
          ]);
      }

    public static function updateGrade($request) {
        $rows = DB::table('grades')->where('id', $request->gradeId)->update([
            'subject' => $request->subject,
            'value' => $request->value,
            'exam_date' => $request->exam_date,
            'student_id' => $request->studentId,
            'teacher_id' => auth()->user()->id,
        ]);
        return $rows;
    }

}
