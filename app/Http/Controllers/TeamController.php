<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamDetail;

class TeamController extends Controller
{
    //get Teams
    public function index()
    {
        $teams = Team::with(["members", "teamDetails", "manager", "room", "brand"])->get();
        return response()->json([
            'teams' => $teams,
        ], 200);
    }

    public function getEmployeeWithID($id) {
        try {
            $teamsDetails = TeamDetail::with("member")->get();
            foreach ($teamsDetails as $team) {
                if($team->memberID = $id) {
                    return response()->json([
                        "member" => $team->member
                    ],200);
                }
            }

        } catch (\Exception $e) {
            return response()->json([
                "massage"=> $e->getMessage()
            ],500);
        }

    }

    public function store(Request $request)
    {
        try {
            $member = $request->memberID;
            $team = Team::create([
                'name' => $request->name,
                'managerID' => $request->managerID,
                'img' => $request->img,
                'roomID' => $request->roomID,
                'brandID' => $request->brandID,
                'description' => $request->description,
            ]);

            if($team) {
                foreach($request->memberID as $member) {
                    $teamDetail = TeamDetail::create([
                        "memberID" => $member['id'],
                        "teamID" => $team->id,
                    ]);
                }
            }


            return response()->json([
                'message' => "Team successfully created",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => "something really wrong create",
                'error' => $e
            ], 500);
        }
    }

    /**Show team */
    public function update(Request $request, $id)
    {
        try {
            //Find team update
            $team = Team::where('id',$id)->with(["members", "teamDetails", "manager", "room", "brand"])->first();

            //check team
            if (!$team) {
                return response()->json([
                    'message' => "Not found user",
                ], 404);
            }

            //update user
            $team->name = $request->name;
            $team->img = $request->img;
            $team->managerID = $request->managerID;
            $team->roomID = $request->roomID;
            $team->brandID = $request->brandID;
            $team->description = $request->description;

            $checkMember = false;
            //xóa hết sau đó khởi tạo lại có thể tránh để dữ liệu không cần thiết
            foreach($team->teamDetails as $teamDetail) {
                $teamDetail->delete();
            }

            foreach($request->memberID as $member) {
                $teamDetail = TeamDetail::create([
                    "memberID" => $member['id'],
                    "teamID" => $team->id,
                ]);
            }

            //save user
            $team->save();

            //message
            return response()->json([
                "message" => "Update successfully ",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong",
            ], 500);
        }
    }

    //destroy users
    public function destroy($id)
    {
        try {
            $team = Team::where('id',$id)->with(["members", "teamDetails", "manager", "room", "brand"])->first();

            //check team
            if (!$team) {
                return response()->json([
                    "message" => "User not found",
                ], 404);
            }
            $team->delete();

            foreach($team->teamDetails as $teamDetail) {
                $teamDetail->delete();
            }

            return response()->json([
                "message" => "Destroy successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Something Wrong"
            ], 500);
        }
    }

    public function destroyTeams(Request $request)
    {

        try {
            $teams = Team::whereIn('id', $request)->get();
            // dd($teams);
            if (count($teams) == 0) {
                return response()->json([
                    "message" => "Teams not found",
                ], 404);
            }
            foreach ($teams as $team) {
                $team->delete();
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
        $team = Team::where('id',$id)->with(["members", "teamDetails", "manager", "room", "brand"])->first();
        if (!$team) {
            return response()->json([
                "message" => "User not found",
            ], 404);
        }
        return response()->json([
            "team" => $team,
        ], 200);
    }
}