{{-- products create file  --}}

@extends('admin.templates.app')

@section('page-title', 'Добавить товар')

@section('right-block-title', 'Добавить товар')

@section('right-content')
    <form action="{{ route('admin.products.store') }}" method="post">
        {!! csrf_field() !!}
        <table class="main-form">
            <tr>
                <td><input type="text" name="title" placeholder="Название товара"/></td>
            </tr>
            <tr>
                <td>
                    <textarea type="text" name="description" placeholder="Описание товара"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="catalog_id">
                        {!! $optCatalogs !!}
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="text" name="date_store" placeholder="Дата продаж"/></td>
            </tr>
            <tr>
                <td><input type="text" name="price" placeholder="Цена"/></td>
            </tr>
            <tr>
                <td><input type="text" name="old_price" placeholder="Старая цена"/></td>
            </tr>
            <tr>
                <td><input type="text" name="author" placeholder="Автор"/></td>
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