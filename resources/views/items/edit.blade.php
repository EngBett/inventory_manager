@extends('layouts.app')

@section('page-content')
    <div class="container-fluid" id="app">
        <h2 class="mt-2">Edit Items</h2>
        <div class="row">
            <div class="offset-md-2 col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('edit-item',$item->item_code)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="code">Item Code</label>
                        <input type="text" name="code" id="code" class="form-control" value="{{$item->item_code}}">
                    </div>
                    <div class="form-group">
                        <label for="code">Item Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$item->item_name}}">
                    </div>
                    <div class="form-group">
                        <label for="bprice">Buying Price</label>
                        <input type="number" name="bprice" id="bprice" class="form-control" value="{{$item->buy_price}}">
                    </div>
                    <div class="form-group">
                        <label for="sprice">Selling Price</label>
                        <input type="number" name="sprice" id="sprice" class="form-control" value="{{$item->sell_price}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Item Description</label>
                        <textarea name="description" id="description" class="form-control">
                             {{$item->description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection