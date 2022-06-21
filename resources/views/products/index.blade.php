@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="row">
    @if ($message = Session::get('successDelete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <a type="button" class="btn-close" data-bs-dismiss="alert"></a>
            </div>
            @endif
            <div class="categories-container">
                <ul class="categories-list">
                    <li class="categories-list-item"><a href="/categories/kidbags" class="categories-list-item-link">Детские рюкзаки</a></li>
                    <li class="categories-list-item"><a href="/categories/manbags" class="categories-list-item-link">Мужские рюкзаки</a></li>
                    <li class="categories-list-item"><a href="/categories/womanbags" class="categories-list-item-link">Женские рюкзаки</a></li>
                </ul>
            </div>
    @foreach ($viewData['products'] as $product)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('img/'.$product->getImage()) }}" class="card-img-top img-card" style="width: 304px;">
            <ul class="card-item-list">
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
    @endforeach
</div>
@endsection
