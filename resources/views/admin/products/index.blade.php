{{-- products index file  --}}

@extends('admin.templates.app')

@section('page-title', 'Товары')

@section('right-block-title', 'Товары')

@section('right-content')
    <div class="right-block">
        <table class="main-table">
            <tr>
                <td>№</td>
                <td>Название</td>
                <td>Каталог</td>
                <td>Цена в тг.</td>
                <td colspan="2" id="action">Действия</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Диодная лента 30 см. красная</td>
                <td>Диодные ленты</td>
                <td>500</td>
                <td class="action"><a href="#" class="icon-pencil"></a></td>
                <td class="action"><a href="#" class="icon-trash"></a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Диодная лента 30 см. красная</td>
                <td>Диодные ленты</td>
                <td>1500</td>
                <td class="action"><a href="#" class="icon-pencil"></a></td>
                <td class="action"><a href="#" class="icon-trash"></a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Диодная лента 30 см. красная</td>
                <td>Диодные ленты</td>
                <td>5000</td>
                <td class="action"><a href="#" class="icon-pencil"></a></td>
                <td class="action"><a href="#" class="icon-trash"></a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Диодная лента 30 см. красная</td>
                <td>Диодные ленты</td>
                <td>2000</td>
                <td class="action"><a href="#" class="icon-pencil"></a></td>
                <td class="action"><a href="#" class="icon-trash"></a></td>
            </tr>
        </table>
        <div class="buttons">
            <a href="{{ route('admin.products.create') }}" class="btn-add">Добавить товар</a>
        </div>
    </div>
@stop