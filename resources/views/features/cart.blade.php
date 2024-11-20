@extends('main')

@section('title', 'Your Cart')

@section('content')
    <section class="my-5 min-vh-100">
        <div class="container">
            <div class="row">
                <!-- Cart -->
                <div class="col-lg-9">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($cart && count($cart) > 0)
                        <div class="card border shadow-0">
                            <div class="m-4">
                                <div class="mb-3">
                                    <span class="card-title mb-4 h4">Your shopping cart</span>
                                    <form action="{{ route('cart.clear') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 text-decoration-none float-end">Clear
                                            All</button>
                                    </form>
                                </div>
                                <hr />
                                @foreach ($cart as $id => $item)
                                    <div class="row gy-3 mb-4">
                                        <div class="col-lg-5">
                                            <div class="me-lg-5">
                                                <div class="d-flex">
                                                    <img src="{{ $item['image'] ?? asset('images/default.png') }}"
                                                        class="border rounded me-3" style="width: 96px; height: 96px" />
                                                    <div>
                                                        <a href="#" class="nav-link">{{ $item['name'] }}</a>
                                                        <p class="text-muted">${{ $item['price'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                            <div class="input-group">
                                                <form action="{{ route('cart.decrease', $id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-secondary">-</button>
                                                </form>
                                                <input type="text" class="form-control text-center"
                                                    value="{{ $item['quantity'] }}" readonly />
                                                <form action="{{ route('cart.increase', $id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-secondary">+</button>
                                                </form>
                                            </div>

                                            <p class="h6 mt-2">
                                                ${{ $item['quantity'] * $item['price'] }}
                                            </p>
                                        </div>
                                        <div class="col-lg col-sm-6 d-flex justify-content-end">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-light border text-danger">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="border-top pt-4 mx-4 mb-4">
                                <p>
                                    <i class="fas fa-truck text-muted fa-lg"></i> Free Delivery
                                    within 1-2 weeks
                                </p>
                                <p class="text-muted">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <h5>Your cart is empty!</h5>
                            <a href="{{ route('mentorship.index') }}" class="btn btn-primary mt-3">Back to Shop</a>
                        </div>
                    @endif
                </div>
                <!-- Summary -->
                <div class="col-lg-3">
                    {{-- <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form>
                                <label class="form-label">Have a coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Coupon code" />
                                    <button class="btn btn-light border">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p>Total Price:</p>
                                <p class="fw-bold">
                                    ${{ array_sum(array_map(fn($item) => $item['quantity'] * $item['price'], $cart ?? [])) }}
                                </p>
                            </div>
                            <form action="{{ route('checkout.process') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success w-100 mb-2">Checkout</button>
                            </form>
                            <a href="{{ route('mentorship.index') }}" class="btn btn-light w-100 border">Back to Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
