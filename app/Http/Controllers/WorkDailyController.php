<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkDaily;
class WorkDailyController extends Controller
{
    //
    public function index() {
        $workDaily = WorkDaily::all();

        return response()->json([
            "workDaily" => $workDaily,
        ], 200);
    }

    public function store(Request $request) {
        try {
            // dd($request->end_date);
            $workDaily = WorkDaily::create([
                "employeeID" => $request->employeeID,
                "start_date" => $request->start_date,
                "end_date"=> $request->end_date,
                "hour_work" => $request->hour_work
            ]);

            if($workDaily)
                return response()->json([
                    "message" => "WorkDaily successfully create",
                    "id" => $workDaily->id
                ],200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => "something really wrong create",
                'error' => $e
            ], 500);
        }
    }

    public function show($id, $date) {
        $workDaily = WorkDaily::whereDate('start_date', $date)->where('id', $id)->get();
        return response()->json([
            "workDaily" => $workDaily
        ], 200);
    }

    public function update(Request $request, $id, $date) {
        try {
            $workDaily = WorkDaily::whereDate('start_date', $date)->where('id', $id)->first();
            // dd($workDaily);
            if(!$workDaily) {
                return response()->json([
                    'message' => "Not found work daily",
                ], 404);
            }

            $workDaily->end_date = $request->end_date;
            $workDaily->hour_work = $request->hour_work;

            $workDaily->save();

            return response()->json([
                "message"=> "Update succssesfully"
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong",
                'error' => $e
            ], 500);
        }
    }

}