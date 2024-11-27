<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    //get Teams
    public function index()
    {
        $brands = Brand::with("manager")->get();
        return response()->json([
            'brands' => $brands,
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            //create brands
            $brands = Brand::create([
                'brand_name' => $request->brand_name,
                'brand_address' => $request->brand_address,
                'img' => $request->img,
                'managerID' => $request->managerID,
                'phone' => $request->phone,
                'bank_name' => $request->bank_name,
                'bank_account_number' => $request->bank_account_number,
                'description' => $request->description,
                'state' => $request->state,
            ]);

            return response()->json([
                'message' => "Brand successfully created",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "something really wrong W",
                'error' => $e,
            ], 500);
        }
    }

     /**Show team */
     public function update(Request $request, $id)
     {
         try {
                //Find team update
                $brand = Brand::where("id", $id)->first();
                // dd($brand->brand_name);
                //check team
                if (!$brand) {
                    return response()->json([
                        'message' => "Not found brand",
                    ], 404);
                }

                //  //update user
                $brand->brand_name = $request->brand_name;
                $brand->brand_address = $request->brand_address;
                $brand->img = $request->img;
                $brand->managerID = $request->managerID;
                $brand->phone = $request->phone;
                $brand->bank_name = $request->bank_name;
                $brand->bank_account_number = $request->bank_account_number;
                $brand->description = $request->description;
                $brand->state = $request->state;

                //save user
                $brand->save();

                //message
                return response()->json([
                    "message" => "Update successfully ",
                ], 200);
         } catch (\Exception $e) {
             return response()->json([
                 'message' => "Something went really wrong",
                 'error' => $e,
             ], 500);
         }
     }

     //destroy users
     public function destroy($id)
     {
         try {
            $brands = Brand::where("id", $id)->with("manager")->first();

             //check team
             if (!$brands) {
                 return response()->json([
                     "message" => "brands not found",
                 ], 404);
             }
             $brands->delete();

             return response()->json([
                 "message" => "Destroy successfully",
             ], 200);
         } catch (\Exception $e) {
             return response()->json([
                 "message" => "Something Wrong"
             ], 500);
         }
     }

     public function destroyBrands(Request $request)
     {
         try {
            $brands = Brand::whereIn("id", $request)->get();
            //  dd($brandss);
             if (count($brands) == 0) {
                 return response()->json([
                     "message" => "brands not found",
                 ], 404);
             }
             foreach ($brands as $brand) {
                $brand->delete();
            }
             return response()->json([
                 "message" => "Destroy successfully",
             ], 200);
         } catch (\Exception $e) {
             return response()->json([
                 "message" => "Something Wrong W",
                 "error" => $e
             ], 500);
         }
     }

     public function show($id)
     {
        $brand = Brand::where("id", $id)->with("manager")->first();
         if (!$brand) {
             return response()->json([
                 "message" => "brands not found",
             ], 404);
         }
         return response()->json([
             "brand" => $brand,
         ], 200);
     }



}