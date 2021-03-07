<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getStudentsWithGrades()
    {
        $studentsWithGrades = User::with('grades')->get();

        foreach ($studentsWithGrades as $studentWithGrade) return $studentWithGrade;

    }

    public static function getStudentByEmail($email)
    {
        $student = User::where('email', $email)->get();

        foreach ($student as $data) return $data;

    }

    public static function getStudentById($id) {
        $student = User::where('id', $id)->get();

        foreach ($student as $data) return $data;
    }


    public function grades() {
        return $this->hasMany(Grade::class, 'student_id', 'id');
    }
}
