@extends('layouts.app')

@section('page-content')
    <div class="container-fluid" id="app">
        <h2 class="mt-2">Update Stock for {{$item->name}}</h2>
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
            <div class="offset-md-4 col-md-4">
                <form action="{{route('stock',$stock->item_code)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="code">Stock</label>
                        <input type="text" name="qty" id="code" class="form-control" value="{{$stock->qty}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection