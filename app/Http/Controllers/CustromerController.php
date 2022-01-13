<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustromerController extends Controller
{
    public function index()
    {

        return view('welcome');
    }
    public function getdata()
    {
        $data = customer::get();
        return json_encode($data);
    }
    public function postdata(Request $request)
    {

        $data = new customer([
            'frist_name' => $request->input('frist_name'),
            'last_name' => $request->input('last_name'),
            'image' => $request->input('last_name'),

        ]);
        $data->save();

        return response()->json([
            'status' => 'success',
            'user'   => $data
        ]);
    }
    public function show($id)
    {

        $data = customer::find($id);
        return response()->json( $data);
    }
    public function update($id, Request $request)
    {
        $data = customer::find($id);
        $data->update($request->all());
        return response()->json('customer updated!');
    }
    public function delete($id)
    {
        $data = customer::find($id);
        $data->delete();
        return response()->json('customer deleted!');
    }
}
