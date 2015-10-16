{{-- catalogs create file  --}}

@extends('admin.templates.app')

@section('page-title', 'Добавить каталог')

@section('right-block-title', 'Добавить каталог')

@section('right-content')
    <form action="{{ route('admin.catalogs.store') }}" method="post">
        {!! csrf_field() !!}
        <table class="main-form">
            <tr>
                <td><input type="text" name="title" placeholder="Название каталога"/></td>
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