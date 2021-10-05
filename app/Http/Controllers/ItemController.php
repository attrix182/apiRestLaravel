<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function listAll()
    {

        $items = Item::all();

        return response()->json($items);
  
    }


    public function listOne($id){
        return Item::find($id);
    }

    public function createItem(Request $data){
        $item = new Item;

        $item->name = $data->name;
        $item->description = $data->description;
        $item->img = $data->img;
        $item->save();

        $item->status = "Created";
        return response()->json($item->status, 200);
    }


    public function updateItem(Request $data){
        
        $item = Item::find($data->id);
        $item->name = $data->name;
        $item->description = $data->description;
        $item->img = $data->img;
        $item->save();

        return response()->json($item);
    }

    public function deleteItem($id){
        $item = Item::find($id);
        $item->delete();
        return response()->json($item);
    }
}
