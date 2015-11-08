{{-- features create file  --}}

@extends('admin.templates.app')

@section('page-title', 'Добавить характеристику')

@section('right-block-title', 'Добавить характеристику')

@section('right-content')
    <form action="{{ route('admin.features.store') }}" method="post">
        {!! csrf_field() !!}
        <table class="main-form">
            <tr>
                <td><input type="text" name="title" placeholder="Название характеристику"/></td>
            </tr>
            <tr>
                <td>
                    <select name="status_id">
                        {!! $optStatus !!}
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="buttons">
                        <button name="submit" class="btn-add">Добавить</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
@stop