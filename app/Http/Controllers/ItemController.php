<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use illuminate\Http\Request;
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
    
        return response()->json($data);
    }




    public function updateItem(Request $data, $id){
        
        $item = Item::find($id);
        $item->name = $data->name;
        $item->description = $data->description;
        $item->save();

        return response()->json($item);
    }

    public function deleteItem($id){
        $item = Item::find($id);
        $item->delete();
        return response()->json($item);
    }
}
