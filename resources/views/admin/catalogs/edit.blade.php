{{-- catalogs edit file  --}}

@extends('admin.templates.app')

@section('page-title', 'Редактировать каталог')

@section('right-block-title', 'Редактировать каталог')

@section('right-content')
    <form action="{{ route('admin.catalogs.update', $catalogs->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {!! csrf_field() !!}
        <table class="main-form">
            <tr>
                <td><input type="text" name="title" value="{{ $catalogs->title }}" placeholder="Название каталога"/></td>
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