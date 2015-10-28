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
                        {!! $optCatalogs !!}
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
                <td>
                    <select name="status_id">
                        {!! $optStatus !!}
                    </select>
                </td>
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

    <h3>Изображения</h3>
    <ul class="show-images">
        <form action="{{ route('admin.products.deleteImages', $products->id) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @foreach($images as $image)
                <li>
                    <img src="/images/{{ $image->product_id }}/thumbs/{{ $image->title }}" alt="{{ $products->title }}">
                    <a href="{{ route('admin.products.mainImage', ['id' => $products->id, 'image' => $image->title]) }}">Сделать основным</a>
                    <input type="checkbox" name="image[]" value="{{ $image->title }}"/>
                </li>
            @endforeach
            <button name="deleteImages">Удалить Изображения</button>
        </form>
    </ul>
    <form action="{{ route('admin.products.createImages', $products->id)}}" enctype="multipart/form-data" method="post">
        {!! csrf_field() !!}
        <input type="file" name="title[]" multiple="true">
        <button name="submit">Добавить</button>
    </form>
@stop