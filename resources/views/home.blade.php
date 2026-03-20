@extends('layouts.app')

@section('title', 'Home')

@push('style')
@endpush

@section('content')
    <div class="container-fluid p-0 mb-4" style="margin-top: 60px;">
        <div class="bg-dark text-white text-center py-5" style="background: linear-gradient(to bottom, #232f3e, #eaeded);">
            <h2 class="display-5 fw-bold">Big Summer Sale</h2>
            <p>Up to 50% off on Electronics & Fashion - {{ $test }}</p>
        </div>
    </div>

    <div class="container mb-5" style="margin-top: -50px;">
        <div class="row g-4">

            @foreach ($products as $product)
                <div class="col-md-3 col-sm-6">
                    {{-- <x-product-card-component title="Apple iPhone 14 Pro Max (256 GB) - Deep Purple" rate="(1,200)" price="999"/> --}}
                    <x-product-card-component rate="{{ $product['rate'] }}" price="{{ $product['price'] }}">
                        <x-slot name="title">{{ $product['title'] }}</x-slot>
                        {{-- <x-slot name="rate">(1,200)</x-slot>
                    <x-slot name="price">5000</x-slot> --}}
                    </x-product-card-component>
                </div>
            @endforeach

        </div>
    </div>
@endsection
