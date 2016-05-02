@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h3>Product Form</h3>
            <form class="form-horizontal" action="{{ url('/product/save') }}" method="post">
                {{ csrf_field() }}
                @if (isset($product->id))
                    <input type="hidden" id="product_id" name="product_id" value={{ $product->id }} />
                @endif

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ isset($product->title) ? $product->title : ''}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value={{ $category['id'] }} {{ $selectedCategoryID==$category['id'] ? "selected='selected'" : '' }}>
                                    {{ $category['title'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantity" value="{{ isset($product->quantity) ? $product->quantity : ''}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" placeholder="price" value="{{ isset($product->price) ? $product->price : ''}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection