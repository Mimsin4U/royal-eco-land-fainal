<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function team()
    {
        return view('admin.web.team.team');
    }

    public function teamCreate(Request $request)
    {
        $team = new TeamMember();
        $team->name        = $request->name;
        $team->designation = $request->designation;
        $team->contact     = $request->contact;
        $team->image       = imageUpload($request->image, 'upload-image/team-images/', 'team');
        $team->status      = $request->status;
        $team->save();
        return back()->with('message', 'TeamMember Created Successfully.');
    }

    public function teamManage()
    {
        return view('admin.web.team.team-manage', [
            'teamMembers' => TeamMember::latest()->get()
        ]);
    }
    public function teamEdit($id)
    {
        return view('admin.web.team.team-edit', ['team' => TeamMember::find($id)]);
    }

    public function teamUpdate(Request $request, $id)
    {
        $team = TeamMember::find($id);
        $team->name        = $request->name;
        $team->designation = $request->designation;
        $team->contact     = $request->contact;
        $team->status      = $request->status;

        if ($request->file('image')) {
            if (file_exists($team->image)) {
                unlink($team->image);
            }
            $imageUrl = imageUpload($request->image, 'upload-image/team-images/', 'team');
            $team->image = $imageUrl;
        }
        $team->save();
        return to_route('team.manage')->with('message', 'TeamMember Updated Successfully.');
    }
    public function teamDelete(Request $request)
    {
        $team = TeamMember::find($request->team_id);
        if ($request->file('image')) {
            if (file_exists($team->image)) {
                unlink($team->image);
            }
        }
        $team->delete();
        return redirect('team-manage')->with('message', 'TeamMember Deleted Successfully.');
    }

}
