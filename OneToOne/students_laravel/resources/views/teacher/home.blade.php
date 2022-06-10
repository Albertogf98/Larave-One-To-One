@extends('layouts.master')

@section('content')

    <p>Bienvenid@  {{auth()->user()->user_type }}<b>{{': ' . auth()->user()->name  . ' ' . auth()->user()->surname}} </b></p><br><br>
    <h3><b>Notas de los alumnos</b></h3>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Alumno</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Nota</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($students->grades as $grade)
                    <tr>
                        <td>{{ $students->name }}</td>
                        <td>{{ $grade->subject}}</td>
                        <td>{{ $grade->value}}</td>
                        <td>{{ $grade->exam_date}}</td>
                        <td>
                            <a href="{{ url('/teacher/delete/' . $grade->id) }}" type="submit" class="btn btn-danger" style="display: inline">Eliminar</a>
                            <a href="{{ url('/teacher/edit/' . $grade->id .'/' . $grade->student_id) }}" type="submit" class="btn btn-warning" style="display: inline">Modificar</a>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div><br><br>
@endsection

