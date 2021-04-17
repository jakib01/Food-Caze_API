<?php

namespace App\Http\Controllers;

use App\Models\ShopPost;
use Illuminate\Http\Request;

class ShopPostController extends Controller
{
    function createPost(Request $request){

//        $this->validate($request,[
//            'image' => 'required|image|mimes:jpeg,png,gif,svg|max:3072',
//        ]);
//
//        $file =  $request->file('image');
//        $filename = "http://foodcaze.com/img/foodPost/" . time() . '.' .$file->extension();
//        $file->move('img/foodPost', $filename);

        $insert_item = new ShopPost();

        $insert_item->title = $request->input('title');
        $insert_item->category = $request->input('category');
        $insert_item->sub_category_1 = $request->input('sub_category_1');
        $insert_item->sub_category_2 = $request->input('sub_category_2');
        $insert_item->description = $request->input('description');
        $insert_item->shop_id = $request->input('shop_id');
//        $insert_item->image =$request->input($filename);
        $insert_item->slug = $request->input('slug');
        $insert_item->time = $request->input('time');
        $insert_item->price = $request->input('price');
        $insert_item->offer_price = $request->input('offer_price');
        $insert_item->discount_price = $request->input('discount_price');
        $insert_item->unit = $request->input('unit');
        $insert_item->quantity = $request->input('quantity');
//        $insert_item ->status = $request->input('status');


//        $this->validate($request,[
//            'image' => 'required|image|mimes:jpeg,png,gif,svg|max:3072',
//        ]);

//        if ($request->hasFile('image')){
//            $file =  $request->file('image');
//            $extension =$file->getClientOriginalExtension();
//            $filename = "http://foodcaze.com/img/foodPost/" . time() . '.' .$extension;
//            $file->move('img/foodPost', $filename);
//            $insert_item->image =$filename;
//        }else{
//            $insert_item ->image = null;
//        }

//        $this->validate($request,[
//            'image' => 'required|image|mimes:jpeg,png,gif,svg|max:3072',
//        ]);


        //last working code
        if ($request->hasFile('image')){
            $file =  $request->file('image');
            $filename = "http://foodcaze.com/img/foodPost/" . time() . '.' .$file->extension();
            $file->move('img/foodPost', $filename);
            $insert_item->image =$filename;
        }else{
            $insert_item ->image = null;
        }

        $insert_item->save();
        Response()->json($insert_item);
        return ['status' => "Data has been inserted",'data'=>'200'];
    }


    function showPost()
    {
        $show_item = ShopPost::all();
//        $post_data = json_encode(array('item' => $show_item), JSON_FORCE_OBJECT);
//        return json_encode(array('item' => $show_item));
//        //or
//        return json_encode( $show_item);
//        return Response()->json($show_item);

//        //for sort the json
//        $phpArray = json_decode($show_item);
//        $laravelArray = collect($phpArray);
//        $sorted = $laravelArray->sortByDesc('id');
//        return json_encode(array('item' => $sorted));

        //for sort the json in another way
        $show_item= json_encode(array('item' => $show_item));
        $array = json_decode($show_item, true);
        usort($array['item'], function($a, $b) {
            return $a['id'] < $b['id'];
        });
        return response()->json($array);
    }


    function showPostById($id)
    {
        $show_item_byid = ShopPost::find($id);
        return Response()->json($show_item_byid);
    }


    function showPostByShop_id($shop_id)
    {
        $showitemby_shopid = ShopPost::where('shop_id', $shop_id)->get();

        //for sort the json in another way
        $showitemby_shopid= json_encode(array('item' => $showitemby_shopid));
        $array = json_decode($showitemby_shopid, true);
        usort($array['item'], function($a, $b) {
            return $a['id'] < $b['id'];
        });
        return response()->json($array);
    }


    function updateShopPost(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,gif,svg|max:3072',
        ]);

        $file = $request->file('image');
        $filename = "http://foodcaze.com/img/foodPost/" . time() . '.' . $file->extension();
        $file->move('img/foodPost', $filename);

        $insert_item_update = ShopPost::find($id);

        $insert_item_update->title = $request->input('title');
        $insert_item_update->category = $request->input('category');
        $insert_item_update->sub_category_1 = $request->input('sub_category_1');
        $insert_item_update->sub_category_2 = $request->input('sub_category_2');
        $insert_item_update->description = $request->input('description');
        $insert_item_update->shop_id = $request->input('shop_id');
        $insert_item_update->image = $filename;
        $insert_item_update->slug = $request->input('slug');
        $insert_item_update->time = $request->input('time');
        $insert_item_update->price = $request->input('price');
        $insert_item_update->offer_price = $request->input('offer_price');
        $insert_item_update->discount_price = $request->input('discount_price');
        $insert_item_update->unit = $request->input('unit');
        $insert_item_update->quantity = $request->input('quantity');
//        $insert_item_update ->status = $request->input('status');

//        if ($request->hasFile('image')){
//            $file =  $request->file('image');
//            $extension =$file->getClientOriginalExtension();
//            $filename = "http://foodcaze.com/img/foodPost/" . time() . '.' .$extension;
//            $file->move('img/foodPost', $filename);
//            $insert_item_update->image =$filename;
//        }else{
//            return $request;
//            $insert_item_update ->image = '';
//        }

        $insert_item_update->save();
        if (Response()->json($insert_item_update)) {
            return ['status' => "item has been updated",'data'=>'200'];
        }
//        return Response()->json($insert_item_update);
    }

    function deleteShopPost(Request $request, $id)
    {
        $delete_item = ShopPost::find($id);
        $delete_item->delete();

        if (Response()->json($delete_item)) {
            return ['status' => "item has been deleted",'data'=>'200'];
        }
        //        return Response()->json($delete_item);
    }
}
