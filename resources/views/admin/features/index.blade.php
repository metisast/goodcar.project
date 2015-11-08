{{-- features index file  --}}

@extends('admin.templates.app')

@section('page-title', 'Характеристики')

@section('right-block-title', 'Характеристики')

@section('right-content')
    <div class="right-block">
        <h3>{{ $message or '' }}</h3>
        <table class="main-table">
            <tr>
                <td>№</td>
                <td>Название</td>
                <td>Состояние</td>
                <td colspan="2" id="action">Действия</td>
            </tr>
            @foreach($features as $feature)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $feature->title }}</td>
                    <td>{{ $feature->status_id }}</td>
                    <td class="action" width="50"><a href="{{ route('admin.features.edit', $feature->id) }}" class="icon-pencil"></a></td>
                    <td class="action" width="50"><input type="checkbox" name="feature[]" form="form" value="{{ $feature->id }}"></td>
                </tr>
            @endforeach
        </table>
        <div class="buttons">
            <a href="{{ route('admin.features.create') }}" class="btn-add">Добавить характеристику</a>
            <button name="submit" form="form">Удалить выбранные</button>
        </div>
    </div>
    <!-- Форма для удаления характеристик -->
    <form action="{{ route('admin.features.destroy', 'del') }}" id="form" enctype="multipart/form-data" method="post">
        <input type="hidden" name="_method" value="DELETE">
        {!! csrf_field() !!}
    </form>
@stop