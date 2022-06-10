@extends('layouts.master')

@section('content')

    <p>Bienvenid@  {{auth()->user()->user_type }}<b>{{': ' . auth()->user()->name  . ' ' . auth()->user()->surname}} </b></p><br><br>
    <h3><b>Mis notas</b></h3>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Alumno</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Nota</th>
                <th scope="col">Fecha</th>
            </tr>
            </thead>
            <tbody>
            @foreach($student->grades as $grade)
                <tr>
                    <td>{{ $student->name . ' ' . $student->surname }}</td>
                    <td>{{ $grade->subject}}</td>
                    <td>{{ $grade->value}}</td>
                    <td>{{ $grade->exam_date}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><br><br>
@endsection
