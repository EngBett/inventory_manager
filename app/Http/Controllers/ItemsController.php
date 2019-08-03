<?php

namespace App\Http\Controllers;

use App\Model\items;
use App\Model\stock;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function add(){
        return view('items.add');
    }
    public function show(){
        $items = items::all();
        return view('items.show',compact('items'));
    }
    public function edit($code){
        $item = items::where([['item_code',$code]])->firstOrFail();
        return view('items.edit', compact('item'));
    }

    public function search(Request $request){
        $items = items::where([['item_name','like','%'.$request->payload.'%']])->orWhere([['description','like','%'.$request->payload.'%']])->get();

        return response()->json(['items'=>$items]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'code'=>'required|numeric|unique:items',
            'name'=>'required',
            'bprice'=>'required',
            'sprice'=>'required',
            'description'=>'required'
        ]);

        $item = new items;
        $item->item_code = $request->code;
        $item->item_name = $request->name;
        $item->description = $request->description;
        $item->buy_price=$request->bprice;
        $item->sell_price=$request->sprice;
        $item->save();

        $stock = new stock;
        if($request->stock){
            $qty = $request->stock;
        }else{
            $qty = 0;
        }

        $stock->item_code = $request->code;
        $stock->qty = $qty;
        $stock->save();

        return redirect(route('items'))->with('message','Added Successfully');
    }

    public function update(Request $request, $code){
        $this->validate($request,[
            'code'=>'required|numeric',
            'name'=>'required',
            'bprice'=>'required',
            'sprice'=>'required',
            'description'=>'required'
        ]);

        $item = items::where([['item_code',$code]])->firstOrFail();
        $item->item_code = $request->code;
        $item->item_name = $request->name;
        $item->description = $request->description;
        $item->buy_price=$request->bprice;
        $item->sell_price=$request->sprice;
        $item->save();

        return redirect(route('items'))->with('message','Updated Successfully');
    }

    public function stock($code){
        $stock = stock::where([['item_code',$code]])->firstOrFail();
        $item = items::where([['item_code',$code]])->firstOrFail();
        return view('items.stock',compact('item','stock'));
    }

    public function stockupdate(Request $request,$code){
        $this->validate($request,[
            'qty'=>'required'
        ]);

        $stock = stock::where([['item_code',$code]])->firstOrFail();
        $stock->qty = $request->qty;
        $stock->save();

        return redirect(route('items'))->with('message','Stock updated successfully');
    }

    public function delete($code){
        items::where([['item_code',$code]])->delete();
        return redirect(route('items'))->with('message','Deleted Successfully');
    }
}
