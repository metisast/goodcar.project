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
                <td colspan="2" id="action">Действия</td>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->catalog['title']}}</td>
                    <td>{{ $product->status['title']}}</td>
                    <td>{{ $product->price }}</td>
                    <td class="action"><a href="{{ route('admin.products.edit', $product->id) }}" class="icon-pencil"></a></td>
                    <td class="action"><a href="{{ route('admin.products.delete', $product->id) }}" class="icon-trash"></a></td>
                </tr>
            @endforeach
        </table>
        <div class="buttons">
            <a href="{{ route('admin.products.create') }}" class="btn-add">Добавить товар</a>
        </div>
    </div>
@stop