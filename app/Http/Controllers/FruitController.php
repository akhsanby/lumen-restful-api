<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\{Response, Request};
use Illuminate\Support\Facades\Validator;
// use GrahamCampbell\Flysystem\Facades\Flysystem;

class FruitController extends Controller
{
    public function index() 
    {
        $fruit = Fruit::get();
        $response = [
            'message' => 'List data of all fruit',
            'data' => $fruit
        ];

        return response()->json($response, RESPONSE::HTTP_OK);
    }

    public function show($id) 
    {
        $fruit = Fruit::findOrFail($id);
        $response = [
            'message' => 'Detail data of fruit',
            'data' => $fruit
        ];

        return response()->json($response, RESPONSE::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), RESPONSE::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $fruit = Fruit::create($request->all());
            $response = [
                'message' => 'Data fruit created!',
                'data' => $fruit 
            ];

            return response()->json($response, RESPONSE::HTTP_CREATED);
        } catch (Exception $e) {
            $response = [
                'message' => 'Failed created data because ' . $e->errorInfo
            ];
            return response()->json($response);            
        }
    }

    public function update(Request $request, $id)
    {
        $fruit = Fruit::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), RESPONSE::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $fruit->update($request->all());
            $response = [
                'message' => 'Data fruit updated!',
                'data' => $fruit 
            ];
            return response()->json($response, RESPONSE::HTTP_OK);
        } catch (Exception $e) {
            $response = [
                'message' => 'Failed update data because ' . $e->errorInfo
            ];
            return response()->json($response);            
        }
    }

    public function destroy($id)
    {
        $fruit = Fruit::findOrFail($id);

        try {
            $fruit->delete();
            $response = [
                'message' => 'Data fruit deleted!'
            ];
            return response()->json($response, RESPONSE::HTTP_OK);
        } catch (Exception $e) {
            $response = [
                'message' => 'Failed delete data because ' . $e->errorInfo
            ];
            return response()->json($response);            
        }
    }
}
