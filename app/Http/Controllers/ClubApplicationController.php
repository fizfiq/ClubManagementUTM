<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Str;
use App\Models\ClubModel;
use Illuminate\Http\Request;
use App\Models\ApplyClubModel;

class ClubApplicationController extends Controller
{
    public function list()
    {
        
        $data['getRecord'] = ApplyClubModel::getRecord();
        $data['header_title'] = "Application List";
        return view('student.apply.list', $data);
    }

    public function application()
    {
        //$data['getFaculty'] = FacultyModel::getFaculty();
        $data['header_title'] = "Apply New Club";
        return view('student.apply.application', $data);
    }
    // Store application form data
    public function store(Request $request)
    {
        //dd($request->all());
        $user_id = Auth::user()->id;
        $existing_applications = ApplyClubModel::where('created_by', $user_id)->where('is_delete', 0)->count();
        $request->request->remove('comment');
        
        if ($existing_applications >= 2) {
            $deleted_applications = ApplyClubModel::where('created_by', $user_id)->where('is_delete', 1)->count();
            if ($deleted_applications >= 1) {
                return redirect('student/apply/list')->with('error', 'You have reached the maximum limit of active club applications. However, you can restore one of your previously deleted applications and edit it.');
            } else {
                return redirect('student/apply/list')->with('error', 'You have reached the maximum limit of club applications.');
            }
        }
        request()->validate([
            'name' => 'required|alpha|unique:club'
        ]);

        $save = new ApplyClubModel;
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->description = trim($request->description);
        $save->proposal = trim($request->proposal);
        
        if(!empty($request->file('proposal')))
        {
            $ext = $request->file('proposal')->getClientOriginalExtension();
            $file = $request->file('proposal');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/application/'), $filename);

            $save->proposal = $filename;            
        }

        $save->status = 0;
        $save->created_by = Auth::user()->id;
        $save->save();

        //$application = ClubApplication::create($validatedData);

        // Send email notification to student affairs
        // ...

        return redirect('student/apply/list')->with('success', 'Application submitted successfully');
        
    }

    public function edit($id)
    {
        $data['getRecord'] = ApplyClubModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Apply Club";
            return view('student.apply.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $save = ApplyClubModel::getSingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->description = trim($request->description);
        $save->proposal = trim($request->proposal);
        if(!empty($request->file('proposal')))
        {
            $ext = $request->file('proposal')->getClientOriginalExtension();
            $file = $request->file('proposal');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/application/'), $filename);

            $save->proposal = $filename;            
        }
        $save->save();

        return redirect('student/apply/list')->with('success', "Application successfully Updated");
    }

    public function delete($id)
    {
        $save = ApplyClubModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', "Application Successfully Deleted");
    }

}
