{{-- features edit file  --}}

@extends('admin.templates.app')

@section('page-title', 'Редактировать характеристику')

@section('right-block-title', 'Редактировать характеристику')

@section('right-content')
    <form action="{{ route('admin.features.update', $feature->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {!! csrf_field() !!}
        <table class="main-form">
            <tr>
                <td><input type="text" name="title" value="{{ $feature->title }}" placeholder="Название характеристику"/></td>
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
                        <button name="submit" class="btn-add">Изменить</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
@stop