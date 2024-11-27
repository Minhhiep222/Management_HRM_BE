<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
class ContractController extends Controller
{
    //
    public function index() {
        $contracts = Contract::with("employee")->get();

        return response()->json([
            "contracts"=> $contracts
        ], 200);

    }

    public function store(Request $request)
    {
        try {
            $contract = Contract::create([
                "employee_id" => $request->employee_id,
                "start_date"=> $request->start_date,
                "end_date"=> $request->end_date,
                "approval_date"=> $request->approval_date,
                "contract_type"=> $request->contract_type,
                "contract_status"=> $request->contract_status,
                "contract_num"=> $request->contract_num,
                "description"=> $request->description,
            ]);

            if($contract) {
                return response()->json([
                    "message" => "Create contract successfuly",
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message"=> "something wrong",
                "error" => $e
            ],500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $contract = Contract::find($id);

            if(!$contract) {
                return response()->json([
                    "message"=> "Not found contract",
                ]);
            }

            $contract->employee_id = $request->employee_id;
            $contract->end_date = $request->end_date;
            $contract->contract_type = $request->contract_type;
            $contract->contract_status = $request->contract_status;
            $contract->contract_num = $request->contract_num;
            $contract->start_date = $request->start_date;
            $contract->approval_date = $request->approval_date;
            $contract->description = $request->description;

            $contract->save();

            return response()->json([
                "message"=> "Update successfuly",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "message"=> "Something wrong",
                "error"=> $e,
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
           $contract = Contract::find($id);

            //check team
            if (!$contract) {
                return response()->json([
                    "message" => "User not found",
                ], 404);
            }
            $contract->delete();

            return response()->json([
                "message" => "Destroy successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Something Wrong"
            ], 500);
        }
    }

    public function destroyContracts(Request $request)
    {
        try {
            $contracts = Contract::whereIn('id', $request)->get();
        // dd( $contracts);

            if (count($contracts) == 0) {
                return response()->json([
                    "message" => "Contracts not found",
                ], 404);
            }
            foreach ($contracts as $contract) {
                $contract->delete();
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
        $contract = Contract::where('id',$id)->with(["employee"])->first();
        if (!$contract) {
            return response()->json([
                "message" => "User not found",
            ], 404);
        }
        return response()->json([
            "contract" => $contract,
        ], 200);
    }
}
