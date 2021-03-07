@extends('layouts.master')

@section('content')
    <h3><b>Eliminar nota</b></h3>
        <form action="/post/delete" method="post">
            @method('delete')
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="alert alert-warnning">
                <span>¿Estás seguro que quieres eliminar la nota del alumn@?</span>
                <button type="submit">Sí</button>
                <a href="{{ url('/post/delete') }}" class="btn btn-warnning">No</a>
            </div>
        </form>
@endsection
