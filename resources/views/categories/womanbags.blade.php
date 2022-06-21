@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
@foreach ($viewData['products'] as $product)
@if ($product->category === 'Женские рюкзаки')
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('img/'.$product->getImage()) }}" class="card-img-top img-card" style="width: 304px;">
            <ul>
                <li>{{$product->name}}</li>
                <li>Цена {{$product->price}}</li>
            </ul>
            <div class="card-body text-center">
                <a href="{{ route('products.show', ['id'=>$product->getId()]) }}" class="btn card-btn">
                Подробнее
                </a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
@endsection
