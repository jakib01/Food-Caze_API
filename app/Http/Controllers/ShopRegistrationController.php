<?php

namespace App\Http\Controllers;

use App\Models\ShopRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopRegistrationController extends Controller
{


    public function createUser(Request $request)
    {
        $result = DB::table('shop_registrations')->select('phone_no')
            ->where(['phone_no'=> $request->phone_no])->first();  // fatching the data form DB to check the email is exist or not

        if($result == null)
        {
            $user = new ShopRegistration();
            $user->shopname = $request->input('shopname');
            $user->email = $request->input('email');
            $user->phone_no = $request->input('phone_no');
            $user->password = $request->input('password');
            $user->address = $request->input('address');
            $user->category = $request->input('category');
            $user->longitude = $request->input('longitude');
            $user->latitude = $request->input('latitude');
            $user->status = $request->input('status');
            $user->ip_address = request()->ip();
            $user->remember_token = sha1(time());

            //last working code for image upload
            if ($request->hasFile('image')){
                $file =  $request->file('image');
                $filename = "http://foodcaze.com/img/shopRegistration/" . time() . '.' .$file->extension();
                $file->move('img/shopRegistration', $filename);
                $user->image =$filename;
            }else{
                $user ->image = null;
            }

            $user->save();
            Response()->json($user);
            return ['status' => "User registration has been successful",'data'=>'200'];
        }

        else
        {
            return ['status' => "Phone number is already exist",'data'=>'400'];
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopRegistration  $shopRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(ShopRegistration $shopRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopRegistration  $shopRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopRegistration $shopRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopRegistration  $shopRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopRegistration $shopRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopRegistration  $shopRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopRegistration $shopRegistration)
    {
        //
    }
}
