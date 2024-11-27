<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Detail_project;
class ProjectController extends Controller
{
    //
    //get Projects
    public function index()
    {
        $projects = Project::with(["members", "projectDetails", "manager", "customer"])->get();
        return response()->json([
            'projects' => $projects,
        ], 200);
    }

    public function getEmployeeWithID($id) {
        try {
            $ProjectsDetails = ProjectDetail::with("member")->get();
            foreach ($ProjectsDetails as $Project) {
                if($Project->memberID = $id) {
                    return response()->json([
                        "member" => $Project->member
                    ],200);
                }
            }

        } catch (\Exception $e) {
            return response()->json([
                "massage"=> $e->getMessage()
            ],500);
        }

    }

    //thêm project
    public function store(Request $request)
    {
        try {
            $project = Project::create([
                "name" => $request->name,
                "description" => $request->description,
                "customerID" => $request->customerID,
                "managerID" => $request->managerID,
                "expense" => $request->expense,
                "start_date" => $request->start_date,
                "finish_date" => $request->finish_date,
                "time" => $request->time,
                "state" => $request->state,
            ]);

            if($project) {
                foreach($request->memberID as $member) {
                    $ProjectDetail = Detail_project::create([
                        "employee_id" => $member['id'],
                        "project_id" => $project->id,
                    ]);
                }
            }

            return response()->json([
                'message' => "Project successfully created",
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => "something really wrong create",
                'error' => $e
            ], 500);
        }
    }

    /**Show Project */
    public function update(Request $request, $id)
    {
        try {
            //Find Project update
            $project = Project::where('id',$id)->with(["members", "projectDetails", "manager", "customer"])->first();

            //check Project
            if (!$project) {
                return response()->json([
                    'message' => "Not found project",
                ], 404);
            }

            //update user
            $project->name = $request->name;
            $project->description = $request->description;
            $project->customerID = $request->customerID;
            $project->managerID = $request->managerID;
            $project->expense = $request->expense;
            $project->start_date = $request->start_date;
            $project->finish_date = $request->finish_date;
            $project->time = $request->time;
            $project->state = $request->state;

            //xóa hết sau đó khởi tạo lại có thể tránh để dữ liệu không cần thiết
            foreach($project->projectDetails as $projectDetail) {
                $projectDetail->delete();
            }

            foreach($request->memberID as $member) {
                $ProjectDetail = Detail_project::create([
                    "employee_id" => $member['id'],
                    "project_id" => $project->id,
                ]);
            }

            //save user
            $project->save();

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
            $Project = Project::where('id',$id)->with(["members", "ProjectDetails", "manager", "room", "brand"])->first();

            //check Project
            if (!$Project) {
                return response()->json([
                    "message" => "User not found",
                ], 404);
            }
            $Project->delete();

            foreach($Project->ProjectDetails as $ProjectDetail) {
                $ProjectDetail->delete();
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

    public function destroyProjects(Request $request)
    {
        try {
            $Projects = Project::whereIn('id', $request)->get();
            // dd($Projects);
            if (count($Projects) == 0) {
                return response()->json([
                    "message" => "Projects not found",
                ], 404);
            }
            foreach ($Projects as $Project) {
                $Project->delete();
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
        $project = Project::where('id',$id)->with(["members", "projectDetails", "manager", "customer"])->first();
        if (!$project) {
            return response()->json([
                "message" => "User not found",
            ], 404);
        }
        return response()->json([
            "project" => $project,
        ], 200);
    }
}
