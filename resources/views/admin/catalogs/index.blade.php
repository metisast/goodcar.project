{{-- catalogs index file  --}}

@extends('admin.templates.app')

@section('page-title', 'Каталоги')

@section('right-block-title', 'Каталоги')

@section('right-content')
    <div class="right-block">
        <table class="main-table">
            <tr>
                <td>№</td>
                <td>Название</td>
                <td>Дата публикации</td>
                <td>Количество наимен. товаров</td>
                <td colspan="2" id="action">Действия</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Диодные ленты</td>
                <td>13.10.2015</td>
                <td>3</td>
                <td class="action"><a href="#" class="icon-pencil"></a></td>
                <td class="action"><a href="#" class="icon-trash"></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Брелки</td>
                <td>13.10.2015</td>
                <td>15</td>
                <td class="action"><a href="#" class="icon-pencil"></a></td>
                <td class="action"><a href="#" class="icon-trash"></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Диодные ленты</td>
                <td>13.10.2015</td>
                <td>7</td>
                <td class="action"><a href="#" class="icon-pencil"></a></td>
                <td class="action"><a href="#" class="icon-trash"></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Диодные ленты</td>
                <td>13.10.2015</td>
                <td>30</td>
                <td class="action"><a href="#" class="icon-pencil"></a></td>
                <td class="action"><a href="#" class="icon-trash"></a></td>
            </tr>
        </table>
        <div class="buttons">
            <a href="{{ route('admin.catalogs.create') }}" class="btn-add">Добавить каталог</a>
        </div>
    </div>
@stop