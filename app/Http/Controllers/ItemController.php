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
        
        if($data->hasFile('img'))
        {
            $nameImg = $data->file('img')->getClientOriginalName();
            $newNameImg = $item->id . '_' . $nameImg;
            $folder = './upload';
            $data->file('img')->move($folder, $newNameImg);
        }

        $item->img = $newNameImg;

        $item->save();


        return response()->json($item, 200);
    }


    public function updateItem(Request $data, $id){
        
        $item = Item::find($id);
        $item->name = $data->name;
        $item->description = $data->description;

        if($data->hasFile('img'))
        {
            $nameImg = $data->file('img')->getClientOriginalName();
            $newNameImg = $item->id . '_' . $nameImg;
            $folder = './upload';
            $data->file('img')->move($folder, $newNameImg);
        }

        $item->img = $newNameImg;

        $item->save();

        return response()->json(   $item);
    }

    public function deleteItem($id){
        $item = Item::find($id);
        $item->delete();
        $item->status = "Deleted";
        return response()->json($item->status);
    }
}
