@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@if (empty($viewData['products']))
@section('content')
<div class="card">
    <div class="card-header">
        {{ $viewData['message_empty_cart1']}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="text-center mb-4">
                {{ $viewData['message_empty_cart2']}}
            </div>
            <div class="row text-center">
                <a href="{{ route('products.index') }}">
                    <button class="btn card-btn">Вернуться к каталогу</button>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="text-end">

            </div>
        </div>
    </div>
</div>
@endsection
@else
@section('content')
<div class="card">
    <div class="card-header">
        Элементы в избранном
    </div>
    <div class="card-body">
        <div class="row">
            <div class="text-start">
        <a href="{{ route('products.index') }}">
            <button class="btn card-btn mb-2">Вернуться к каталогу</button>
            </a>
            </div>
        </div>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Позиция</th>
                    <th scope="col">Название</th>
                    <th scope="col">Стоимость</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['products'] as $product)
                <tr>
                <td>{{ $product->getId() }}</td>
                <td>{{ $product->getName() }}</td>
                <td>{{ $product->getPrice() }}</td>
                <td>{{ session('products')[$product->getId()] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Общая стоимость :</b> ₽{{ $viewData['total'] }}</a>
                @if(count($viewData['products'])>0)
                <a href="{{ route('cart.delete') }}">
                <button class="btn btn-danger mb-2">Удалить все товары из избранного</button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@endif
