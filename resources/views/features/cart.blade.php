@extends('main')

@section('title', 'Cart')

@section('content')
    <h1>Cart</h1>
    @if (session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ $item['price'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Checkout</button>
        </form>
    @else
        <p>Your cart is empty!</p>
    @endif

@endsection
