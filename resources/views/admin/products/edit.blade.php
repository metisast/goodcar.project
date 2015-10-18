{{-- products edit file  --}}

@extends('admin.templates.app')

@section('page-title', 'Редактировать товар')

@section('right-block-title', 'Редактировать товар')

@section('right-content')
    <form action="{{ route('admin.products.update', $products->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        {!! csrf_field() !!}
        <table class="main-form">
            <tr>
                <td><input type="text" name="title" value="{{ $products->title }}" placeholder="Название товара"/></td>
            </tr>
            <tr>
                <td>
                    <textarea type="text" value="{{ $products->description }}" name="description" placeholder="Описание товара"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="catalog_id">
                        {!! $options !!}
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="text" value="{{ $products->date_store }}" name="date_store" placeholder="Дата продаж"/></td>
            </tr>
            <tr>
                <td><input type="text" value="{{ $products->price }}" name="price" placeholder="Цена"/></td>
            </tr>
            <tr>
                <td><input type="text" value="{{ $products->old_price }}" name="old_price" placeholder="Старая цена"/></td>
            </tr>
            <tr>
                <td><input type="text" value="{{ $products->author }}" name="author" placeholder="Автор"/></td>
            </tr>
            <tr>
                <td><input type="text" value="{{ $products->main_image }}" name="main_image" placeholder="Изображение"/></td>
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