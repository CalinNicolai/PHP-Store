@extends('layouts.alter')

@section('title', 'Cart')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Cart</h1>
                @if($cartItems->isEmpty())
                    <p>Your cart is empty.</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th></th> <!-- New column for the "Delete" button -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>${{ $item->price }}</td>
                                <td>{{ $item->pivot->quantity }}</td>
                                <td>${{ $item->price * $item->pivot->quantity }}</td>
                                <td>
                                    <form action="{{ route('cart.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p>Total:
                        ${{ $cartItems->sum(function($item) { return $item->price * $item->pivot->quantity; }) }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
