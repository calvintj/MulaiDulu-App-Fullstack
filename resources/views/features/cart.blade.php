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
                                    <div class="row align-items-center mb-4">
                                        <!-- Image and Name -->
                                        <div class="col-12 col-md-5 d-flex align-items-center mb-3 mb-md-0">
                                            <img src="{{ $item['image'] ? Storage::url($item['image']) : asset('images/default.png') }}"
                                                class="border rounded me-3" style="width: 96px; height: 96px;" />
                                            <div>
                                                <a href="#" class="nav-link fw-bold">{{ $item['name'] }}</a>
                                                <p class="text-muted mb-1">Rp {{ $item['price'] }}</p>
                                            </div>
                                        </div>

                                        <!-- Quantity and Total Price -->
                                        <div
                                            class="col-12 col-md-4 d-flex align-items-center justify-content-between justify-content-md-center mb-3 mb-md-0">
                                            <div class="d-flex align-items-center">
                                                <form action="{{ route('cart.decrease', $id) }}" method="POST"
                                                    class="m-0">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-outline-secondary btn-sm px-3">-</button>
                                                </form>
                                                <input type="text" class="form-control text-center mx-2"
                                                    value="{{ $item['quantity'] }}" readonly
                                                    style="width: 50px; height: 36px;" />
                                                <form action="{{ route('cart.increase', $id) }}" method="POST"
                                                    class="m-0">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-outline-secondary btn-sm px-3">+</button>
                                                </form>
                                            </div>
                                            <p class="ms-3 mb-0 fw-bold text-nowrap" style="white-space: nowrap;">
                                                Rp {{ number_format($item['quantity'] * $item['price'], 2, '.', ',') }}
                                            </p>

                                        </div>

                                        <!-- Remove Button -->
                                        <div class="col-12 col-md-3 d-flex justify-content-md-end">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-light border text-danger btn-sm">Remove</button>
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
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p>Total Price:</p>
                                <p class="fw-bold">
                                    Rp
                                    {{ number_format(array_sum(array_map(fn($item) => $item['quantity'] * $item['price'], $cart ?? [])), 2, '.', ',') }}
                                </p>

                            </div>
                            <form id="checkoutForm">
                                @csrf
                                <button type="button" id="checkoutButton"
                                    class="btn btn-success w-100 mb-2">Checkout</button>
                            </form>
                            <a href="{{ route('mentorship.index') }}" class="btn btn-light w-100 border">Back to Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>
    <script>
        document.getElementById('checkoutButton').addEventListener('click', function() {
            const csrfToken = document.querySelector('input[name="_token"]')?.value;

            if (!csrfToken) {
                alert('CSRF token missing. Please reload the page.');
                return;
            }

            fetch('{{ route('checkout.process') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({}),
                })
                .then((response) => {
                    if (!response.ok) {
                        return response.json().then((data) => {
                            throw new Error(data.error || 'Failed to process the request');
                        });
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.snapToken) {
                        snap.pay(data.snapToken, {
                            onSuccess: function(result) {
                                alert('Payment successful!');
                                window.location.href = "{{ route('mentorship.index') }}";
                            },
                            onPending: function(result) {
                                alert('Payment is pending!');
                            },
                            onError: function(result) {
                                alert('Payment failed!');
                            },
                        });
                    } else {
                        alert('Snap token not found!');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error.message);
                    alert(error.message);
                });
        });
    </script>
@endsection
