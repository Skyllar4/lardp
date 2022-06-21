@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('img/'.$viewData['product']->getImage()) }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData['product']->getName() }} ({{ $viewData['product']->getPrice() }}р)
                </h5>
                <p class="card-text">{{ $viewData['product']->getDescription() }}</p>
                <p class="card-text">
                <form method="POST" action="{{ route('cart.add', ['id' => $viewData['product']->getId() ]) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-auto">
                            <div class="col-auto">
                                <button class="btn card-btn" type="submit">Добавить в избранное</button>&nbsp;
                                <a href="{{ route('products.index') }}" class="btn card-btn">Вернуться к каталогу</a>
                            </div>
                        </div>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
