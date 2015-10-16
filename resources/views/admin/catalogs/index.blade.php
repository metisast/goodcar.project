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
                <td colspan="2" id="action">Действия</td>
            </tr>
            @foreach($catalogs as $cat)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $cat->title }}</td>
                    <td>{{ $cat->created_at }}</td>
                    <td>6</td>
                    <td class="action"><a href="{{ route('admin.catalogs.edit', $cat->id) }}" class="icon-pencil"></a></td>
                    <td class="action"><a href="{{ route('admin.catalogs.delete', $cat->id) }}" class="icon-trash"></a></td>
                </tr>
            @endforeach
        </table>
        <div class="buttons">
            <a href="{{ route('admin.catalogs.create') }}" class="btn-add">Добавить каталог</a>
        </div>
    </div>
@stop