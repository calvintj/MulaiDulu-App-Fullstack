@extends('main')

@section('title', 'Your Cart')

@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="container mt-5 flex-grow-1">
            <h1 class="text-center mb-4">Your Cart</h1>

            @if ($cart)
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Course</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $id => $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>${{ $item['price'] }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-end">
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Checkout</button>
                    </form>
                </div>
            @else
                <p class="text-center text-muted">Your cart is empty!</p>
            @endif
        </div>
    </div>
@endsection
