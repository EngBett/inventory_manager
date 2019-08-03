@extends('layouts.app')

@section('page-content')
    <div class="container-fluid" id="app">
        <h2 class="mt-2">Add Items</h2>
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="offset-md-2 col-md-8">
                <form action="{{route('add-items')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="code">Item Code</label>
                        <input type="text" name="code" id="code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="code">Item Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bprice">Buying Price</label>
                        <input type="number" name="bprice" id="bprice" class="form-control">
                    </div>
                     <div class="form-group">
                        <label for="sprice">Selling Price</label>
                        <input type="number" name="sprice" id="sprice" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Item Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control">
                        <small>**Optional**</small>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection