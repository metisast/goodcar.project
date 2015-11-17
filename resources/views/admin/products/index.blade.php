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
                <td>Статус</td>
                <td>Цена в тг.</td>
                <td colspan="3" id="action">Действия</td>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->catalog['title']}}</td>
                    <td>{{ $product->status['title']}}</td>
                    <td>{{ $product->price }}</td>
                    <td class="action" width="50"><a href="{{ route('admin.products.edit', $product->id) }}" class="icon-pencil"></a></td>
                    <td class="action" width="50"><a href="{{ route('admin.products.createFeatures', $product->id) }}" class="icon-list"></a></td>
                    <td class="action" width="50"><input type="checkbox" name="products[]" form="form" value="{{ $product->id }}"></td>
                </tr>
            @endforeach
        </table>
        <div class="buttons">
            <a href="{{ route('admin.products.create') }}" class="btn-add">Добавить товар</a>
            <button name="btnProducts" value="on" form="form">Удалить выбранные</button>
        </div>
    </div>
    <!-- Форма для удаления продуктов -->
    <form action="{{ route('admin.products.destroy', 'del') }}" id="form" enctype="multipart/form-data" method="post">
        <input type="hidden" name="_method" value="DELETE">
        {!! csrf_field() !!}
    </form>
@stop