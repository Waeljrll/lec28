@extends('layouts.app')

@section('title', 'Cart')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="bg-white p-4 mb-3">
                    <h3 class="border-bottom pb-3 mb-3">Shopping Cart</h3>

                    <div class="row mb-4 border-bottom pb-4">
                        <div class="col-md-2">
                            <img src="https://placehold.co/150x150" class="img-fluid" alt="Product">
                        </div>
                        <div class="col-md-8">
                            <h5>Apple iPhone 14 Pro Max (256 GB)</h5>
                            <span class="text-success small">In Stock</span>
                            <div class="mt-2">
                                <select class="form-select d-inline-block w-auto form-select-sm">
                                    <option>Qty: 1</option>
                                    <option>Qty: 2</option>
                                </select>
                                <span class="mx-2">|</span>
                                <a href="#" class="text-decoration-none text-primary small">Delete</a>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <h5 class="fw-bold">$999.00</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://placehold.co/150x150" class="img-fluid" alt="Product">
                        </div>
                        <div class="col-md-8">
                            <h5>Sony WH-1000XM5 Headphones</h5>
                            <span class="text-success small">In Stock</span>
                            <div class="mt-2">
                                <select class="form-select d-inline-block w-auto form-select-sm">
                                    <option>Qty: 1</option>
                                </select>
                                <span class="mx-2">|</span>
                                <a href="#" class="text-decoration-none text-primary small">Delete</a>
                            </div>
                        </div>
                        <div class="col-md-2 text-end">
                            <h5 class="fw-bold">$348.00</h5>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="bg-white p-3">
                    <h5>Subtotal (2 items):</h5>
                    <h4 class="fw-bold">$1,347.00</h4>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label small">This order contains a gift</label>
                    </div>
                    <a href="checkout.html" class="btn btn-amazon w-100">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>

@endsection
