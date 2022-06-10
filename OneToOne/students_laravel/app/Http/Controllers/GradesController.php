<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradesController extends Controller
{
    // UPDATE, DELETE Y VALIDATIONS DEL CREATE.

    public function getHome()
    {
        $students = User::getStudentsWithGrades(); //Para el profe
        $student = User::find(auth()->user()->id); //para el alumno
      return auth()->check() && auth()->user()->user_type === 'teacher' ? view('teacher.home', ['students' => $students]) : view('student.home',  ['student' => $student]);
    }

    public function getCreate() {
        return view('teacher.create');
    }

    public function getDelete($id) {
        return view('teacher.delete', ['id' => $id]);
    }

    public function getEdit($gradeId, $studentId) {
        $student = User::getStudentById($studentId);
        $grade = Grade::getGradeById($gradeId);
        return view('teacher.edit', ['grade' => $grade, 'student' => $student]);
    }

    public function postCreate(Request $request) {

        $this->validate($request, [
            'email' => 'required|max:150',
            'subject' => 'required|max:50',
            'value' => 'required',
            'exam_date' => 'required',//|before:tomorrow
        ]);

        $student = User::getStudentByEmail($request->email);

       if (empty($student)) {
            flash('Error: no se pudo encontrar el email ' . $request->email)->error()->important();
            return redirect('/');
        } else {
            Grade::insert($request, $student->id);
            flash('Nota insertada correctamente')->success()->important();
            return redirect('/');
        }
    }

    public function postDelete(Request $request) {

        if ($request->method() === 'DELETE') {
            DB::table('grades')->delete($request->id);
            flash('Nota eliminada')->success()->important();
            return redirect('/');
        }
            return redirect('/');
    }

    public function putEdit(Request $request) {
        $this->validate($request, [
            'email' => 'required|max:150',
            'subject' => 'required|max:50',
            'value' => 'required',
            'exam_date' => 'required',//|before:tomorrow
        ]);

       $result = Grade::updateGrade($request);
       if (empty($result)) {
           flash('Fallo al actualizar la nota')->error()->important();
           return redirect('/');
       } else {
           flash('Nota actualizada correctamente')->success()->important();
           return redirect('/');
       }
    }
}
