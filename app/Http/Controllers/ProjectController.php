<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function project(){
        return view('admin.web.project.project');
    }
     
    public function projectCreate(Request $request){
        $project = new Project();
        $project->p_name  = $request->p_name;
        $project->p_slogan  = $request->p_slogan;  
        $project->p_location  = $request->p_location;  
        $project->p_address  = $request->p_address;  
    
        $project->p_logo      = $this->getImageUrl($request);
        $project->p_status     = $request->p_status;
        $project->save();
        return redirect('project')->with('message', 'project create successfully.');
    
    }

    public function getImageUrl($request)
    {
        $image = $request->file('p_logo');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $directory = 'upload-image/project-images/';
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }

    public function projectManage(){
        return view('admin.web.project.project-manage',[
            'projects'=>project::all()
        ]);
    }
    public function projectEdit($id)
    { 
        return view('admin.web.project.project-edit', ['project' => project::find($id)]);
    }
     
    public function projectUpdate(Request $request,$id){
        $project = project::find($id);
        $project->p_name  = $request->p_name;
        $project->p_slogan  = $request->p_slogan;  
        $project->p_location  = $request->p_location;  
        $project->p_address  = $request->p_address;   
        $project->p_status     = $request->p_status;
        if ($request->file('p_logo'))
        {
            if (file_exists($project->p_logo))
            {
                unlink($project->p_logo);
            }
             $imageUrl = $this->getImageUrl($request);
        }
        else
        {
             $imageUrl = $project->p_logo;
        }
        $project->p_logo = $imageUrl; 
          
        $project->save();
        return redirect('project-manage')->with('message', 'project Update successfully.');
 
    }
    public function projectDelete(Request $request)
    {
        $project = project::find($request->project_id);
        if ($request->file('p_logo'))
        {
            if (file_exists($project->p_logo))
            {
                unlink($project->p_logo);
            }
              
        } 
        $project->delete();
        return redirect('project-manage')->with('message', 'project delete successfully.');
    }
}
