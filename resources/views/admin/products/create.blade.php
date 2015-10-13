{{-- products create file  --}}

@extends('admin.templates.app')

@section('page-title', 'Добавить товар')

@section('right-block-title', 'Добавить товары')

@section('right-content')
    <form action="{{ route('admin.products.store') }}">
        {!! csrf_field() !!}
        <table class="main-form">
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
@stop