@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h3>Product Listing</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <!-- Edit Link -->
                            <a href="{{ url('product/setup/' . $product->id ) }}" class="btn btn-info">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ url('product/delete/'.$product->id) }}" method="POST" style="margin-bottom:0px;display:inline;">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" id="delete-product-{{ $product->id }}" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Link for adding new "Product" -->
            <a href="/product/setup" class="btn btn-primary">Add New Product</a>
        </div>
    </div>

@endsection