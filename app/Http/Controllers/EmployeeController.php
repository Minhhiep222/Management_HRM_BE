<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Manager;

class EmployeeController extends Controller
{
    /** get values employee*/
    public function index()
    {
        $employees = Employee::all();

        return response()->json([
            'employees' => $employees
        ], 200);
    }

    /**Create employee */
    public function store(Request $request)
    {
        try {
            //create employee
            $employee = Employee::create([
                'fullname' => $request->fullname,
                'nickname' => $request->nickname,
                'img' => $request->img,
                'address' => $request->address,
                'phone' => $request->phone,
                'phone_work' => $request->phone_work,
                'dob' => $request->dob,
                'sex' => $request->sex,
                'marital_status' => $request->marital_status,
                'email' => $request->email,
                'email_work' => $request->email,
                'start_date' => $request->start_date,
                'finish_date' => $request->finish_date,
                'type' => $request->type,
                'position' => $request->position,
                'state_work' => $request->state_work,
                'departmentID' => $request->departmentID,
                'brandID' => $request->brandID,
                'state_employee' => $request->state_employee,
            ]);


            if($employee->position === "Manager") {
                $manager = Manager::create([
                    'employeeID' => $employee->id
                ]);
            }

            return response()->json([
                'message' => "Employee successfully created",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "something really wrong",
                'error' => $e
            ], 500);
        }
    }

    /**Show employee */
    public function update(Request $request, $id)
    {
        try {
            //Find employee update
            $employee = Employee::find($id);

            //check employee
            if (!$employee) {
                return response()->json([
                    'message' => "Not found user",
                ], 404);
            }

            // dd($request);

            //update user
            $employee->fullname = $request->fullname;
            $employee->nickname = $request->nickname;
            $employee->img = $request->img;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            $employee->phone_work = $request->phone_work;
            $employee->sex = $request->sex;
            $employee->marital_status = $request->marital_status;
            $employee->dob = $request->dob;
            $employee->email = $request->email;
            $employee->email_work = $request->email_work;
            $employee->start_date = $request->start_date;
            $employee->finish_date = $request->finish_date;
            $employee->type = $request->type;
            $employee->position = $request->position;
            $employee->state_work = $request->state_work;
            // $employee->description = $request->description;
            // $employee->tag = $request->tag;
            $employee->state_employee = $request->state_employee;
            $employee->brandID = $request->brandID;
            $employee->departmentID = $request->departmentID;

            //save user
            $employee->save();

            //message
            return response()->json([
                "message" => "Update successfully ",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong",
                'error' => $e
            ], 500);
        }
    }

    //destroy users
    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);
                //check employee
            if (!$employee) {
                return response()->json([
                    "message" => "User not found",
                ], 404);
            }
            $employee->delete();
            return response()->json([
                "message" => "Destroy successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Something Wrong"
            ], 500);
        }
    }

    //destroy users
    public function destroyMembers(Request $request)
    {
        try {
            $employees = Employee::whereIn('id', $request)->get();
            if (!$employees) {
                return response()->json([
                    "message" => "User not found",
                ], 404);
            }
            foreach ($employees as $employee) {
                $employee->delete();
            }
            return response()->json([
                "message" => "Destroy successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Something Wrong",
                "error" => $e
            ], 500);
        }
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return response()->json([
                "message" => "User not found",
            ], 404);
        }
        return response()->json([
            "employee" => $employee,
        ], 200);
    }
}