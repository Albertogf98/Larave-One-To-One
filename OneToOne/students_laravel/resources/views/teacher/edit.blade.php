@extends('layouts.master')

@section('content')

    <h1>Editar</h1>
    <br>
    @if(count($errors) > 0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    <form action="/put/edit" method="post">
        @method('put')
        @csrf
        <input type="hidden" id="studentId"  name="studentId" value="{{$student->id}}">
        <input type="hidden" id="gradeId"  name="gradeId" value="{{$grade->id}}">
        <table>
            <tr>
                <td><label for="email">Email del alumno:  </label></td><td><input id="email" type="email" name="email" value="{{ $student->email }}"></td>
            </tr>
            <tr>
                <td><label for="subject">Asignatura:  </label></td><td><input id="subject" name="subject" type="text" value="{{ $grade->subject }}"></td>
            </tr>
            <tr>
                <td><label for="value">Nota:  </label></td><td><input id="value" name="value" value="{{ $grade->value }}"></td>
            </tr>
            <tr>
                <td><label for="exam_date">Fecha del exámen:  </label></td><td><input id="exam_date" name="exam_date" type="date" value="{{ $grade->exam_date }}"></td>
            </tr>
        </table><br>
        <input type="submit" value="Continuar">
    </form>

@endsection

