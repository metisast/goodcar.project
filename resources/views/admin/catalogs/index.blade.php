{{-- catalogs index file  --}}

@extends('admin.templates.app')

@section('page-title', 'Каталоги')

@section('right-block-title', 'Каталоги')

@section('right-content')
    <div class="right-block">
        <h3>{{ $message or '' }}</h3>
        <table class="main-table">
            <tr>
                <td>№</td>
                <td>Название</td>
                <td>Дата публикации</td>
                <td>Количество наимен. товаров</td>
                <td colspan="3" id="action">Действия</td>
            </tr>
            @foreach($catalogs as $cat)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $cat->title }}</td>
                    <td>{{ $cat->created_at }}</td>
                    <td>6</td>
                    <td class="action" width="50"><a href="{{ route('admin.catalogs.edit', $cat->id) }}" class="icon-pencil"></a></td>
                    <td class="action" width="50"><a href="{{ route('admin.catalogs.features', $cat->id) }}" class="icon-paper-clip"></a></td>
                    <td class="action" width="50"><input type="checkbox" name="catalogs[]" form="form" value="{{ $cat->id }}"></td>
                </tr>
            @endforeach
        </table>
        <div class="buttons">
            <a href="{{ route('admin.catalogs.create') }}" class="btn-add">Добавить каталог</a>
            <button name="btnCatalogs" value="on" form="form">Удалить выбранные</button>
        </div>
    </div>
    <!-- Форма для удаления каталогов -->
    <form action="{{ route('admin.catalogs.destroy', 'del') }}" id="form" enctype="multipart/form-data" method="post">
        <input type="hidden" name="_method" value="DELETE">
        {!! csrf_field() !!}
    </form>
@stop