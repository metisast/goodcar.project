{{-- catalogs features file  --}}

@extends('admin.templates.app')

@section('page-title', 'Редактировать характеристики каталога')

@section('right-block-title', $catalog->title)

@section('right-content')
    {{-- Вывод характеристик каталога --}}
    <table>
        @foreach($catsFeats as $cF)
            <tr>
                <td>{{ $cF->title }}</td>
                <td><input type="checkbox" name="features[]" value="{{ $cF->id }}" form="form-features"/></td>
            </tr>
        @endforeach
    </table>
    <div class="buttons">
        <button name="features" value="on" form="form-features">Удалить выбранные</button>
    </div>
    {{-- Форма для отправки характеристик на удаление --}}
    <form action="{{ route('admin.catalogs.destroy') }}" id="form-features">
        <input type="hidden" name="_method" value="DELETE">
        {!! csrf_field() !!}
    </form>

    {{-- Вывод и добавление характеристик --}}
    <form action="{{ route('admin.catalogs.update', $catalog->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {!! csrf_field() !!}
        <table class="main-form">
            @foreach($features as $f)
                <tr>
                    <td>
                        <label>{{ $f->title }}</label>
                    </td>
                    <td>
                        <input type="checkbox" value="{{ $f->id }}" name="features[]"/>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>
                    <div class="buttons">
                        <button name="btn-features" value="on" class="btn-add">Добавить</button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
@stop