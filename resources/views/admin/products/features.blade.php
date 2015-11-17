{{-- product features file  --}}

@extends('admin.templates.app')

@section('page-title', 'Редактировать характеристики продукта')

@section('right-block-title', $product->title)

@section('right-content')
    {{-- Вывод характеристик продукта с привязкой каталога --}}
    <table>
        @foreach($features as $f)
            <tr>
                <td>{{ $f->title }}</td>
                <td><input type="text" name="{{ $f->id }}" value="" form="formCreate"/></td>
            </tr>
        @endforeach
    </table>
    <div class="buttons">
        <button name="btnAddFeatures" value="on" form="formCreate">Изменить</button>
    </div>
    {{-- Форма для добавления характеристик к товару --}}
    <form action="{{ route('admin.products.storeFeatures', $product->id) }}" id="formCreate" method="post">
        {!! csrf_field() !!}
    </form>

@stop