@extends('layouts.master')

@section('content')

    <h1>Registro de un nuevo préstamo</h1>
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
    <form action="/post/create" method="post">
        @method('post')
        @csrf
        <table>
            <tr>
                <td><label for="email">Email del alumno:  </label></td><td><input id="email" type="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="subject">Asignatura:  </label></td><td><input id="subject" name="subject" type="text" value="{{old('subject')}}"></td>
            </tr>
            <tr>
                <td><label for="value">Nota:  </label></td><td><input id="value" name="value" value="{{old('value')}}"></td>
            </tr>
            <tr>
                <td><label for="exam_date">Fecha del exámen:  </label></td><td><input id="exam_date" name="exam_date" type="date" value="{{old('exame_date')}}"></td>
            </tr>
        </table><br>
        <input type="submit" value="Continuar">
    </form>

@endsection
