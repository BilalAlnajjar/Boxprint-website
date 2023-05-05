<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::get();
        return view('pages.admin.projects',[
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.add_project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();

        foreach ($request->file('images') as $image) {
            $arr[] = $image->store('/imagesSite',['disk' => 'uploads']);
        }

        $pathImages = collect($arr)->implode(','); // {0:"a", 1:"b", 2:"c"};

//        explode(",","string");


        Project::create([
            'title' => $request->title,
            'images' => $pathImages,
            'price' => $request->price,
        ]);

        $request->session()->put('message','تم اضافة مشروع جديد بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('pages.admin.edit_project',[
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProjectRequest $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $request->validated();

        $project->update([
            'title' => $request->title,
            'price' => $request->price,
        ]);

        if($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $arr[] = $image->store('/imagesSite', ['disk' => 'uploads']);
                Storage::disk('uploads')->delete($image);
            }

            $pathImages = collect($arr)->implode(','); // {0:"a", 1:"b", 2:"c"};

            $project->update([
                'images' => $pathImages,
            ]);

        }

//        explode(",","string");


        $request->session()->put('message','تم تحديث بيانات المشروع بنجاح');
        return back()->with('result', "success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        foreach (explode(',',$project->images) as $image) {
            Storage::disk('uploads')->delete($image);
        }
        $project->delete();

        $request->session()->put('message','تم حذف المشروع بنجاح');
        return back()->with('result', "success");
    }
}
