<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Employee;
use App\Models\Department;
use App\Models\TeamDetail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function getAllDepartment(Request $request) {
      $departments = Department::all();
        return response()->json([
            'results' => $departments
        ], 200);
    }

    public function index(Request $request) {
        $departments = Department::with("manager", "brand", "employees")->get();
        return response()->json([
            'departments' => $departments
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            //create department
            $department = Department::create([
                'department_name' => $request->department_name,
                'img' => $request->img,
                'managerID' => $request->managerID,
                'brandID' => $request->brandID,
                'description' => $request->description,
            ]);

            return response()->json([
                'message' => "Department successfully created",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "something really wrong",
                'error' => $e,
            ], 500);
        }
    }

     /**Show team */
     public function update(Request $request, $id)
     {
         try {
                //Find team update
                $department = Department::where("id", $id)->first();
                // dd($department->department_name);
                //check team
                if (!$department) {
                    return response()->json([
                        'message' => "Not found department",
                    ], 404);
                }

                //  //update user
                $department->department_name = $request->department_name;
                $department->img = $request->img;
                $department->managerID = $request->managerID;
                $department->brandID = $request->brandID;
                $department->description = $request->description;

                //save user
                $department->save();

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
            $department = Department::where("id", $id)->with("manager", "brand", "employees")->first();

             //check team
             if (!$department) {
                 return response()->json([
                     "message" => "Department not found",
                 ], 404);
             }
             $department->delete();

             return response()->json([
                 "message" => "Destroy successfully",
             ], 200);
         } catch (\Exception $e) {
             return response()->json([
                 "message" => "Something Wrong"
             ], 500);
         }
     }

     public function destroyDepartment(Request $request)
     {
         try {
                $departments = Department::whereIn("id", $request)->get();
            //  dd($departments);
             if (count($departments) == 0) {
                 return response()->json([
                     "message" => "department not found",
                 ], 404);
             }
             foreach ($departments as $department) {
                $department->delete();
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
        $department = Department::where("id", $id)->with("manager", "brand", "employees")->first();
         if (!$department) {
             return response()->json([
                 "message" => "department not found",
             ], 404);
         }
         return response()->json([
             "department" => $department,
         ], 200);
     }



}
