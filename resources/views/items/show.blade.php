@extends('layouts.app')

@section('page-content')
    <div class="container-fluid" id="app">
        <h2 class="mt-2">All Items</h2>
        <a class="btn btn-success" href="{{route('add-items')}}">Add Item</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Item</th>
                    <th scope="col">Description</th>
                    <th scope="col">Buying Price</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Edit Stock</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <?php
                            $stock = \App\Model\stock::where([['item_code',$item->item_code]])->firstOrFail();
                    ?>
                    <tr>
                        <td>{{$item->item_code}}</td>
                        <td>{{$item->item_name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->buy_price}}</td>
                        <td>{{$item->sell_price}}</td>
                        <td>{{$stock->qty}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{route('stock',$item->item_code)}}">Edit Stock</a>
                        </td>
                        <td>
                            <a href="{{route('edit-item',$item->item_code)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form id="form-delete-{{$item->item_code}}" action="{{route('delete-item', $item->item_code)}}" method="post" style="display:none;">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                            </form>
                            <a href="" onclick="
                                    if(confirm('Are you sure you want to delete?'))
                                    {
                                    event.preventDefault();
                                    document.getElementById('form-delete-{{$item->item_code}}').submit();
                                    }else
                                    {
                                    event.preventDefault();
                                    }

                                    ">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection