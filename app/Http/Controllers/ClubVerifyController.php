<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Hash;
use Auth;
use Str;
use App\Models\ApplyClubModel;
use App\Models\ClubModel;
use App\Http\Controllers\Controller;

class CLubVerifyController extends Controller
{
    public function list()
    {
        //$data['getClub'] = ClubModel::getClub();
        $data['getApply'] = ApplyClubModel::getApply();
        $data['header_title'] = "Application List";
        return view('hep.verify.list', $data);
    }

    public function edit($id)
    {
        $data['getApply'] = ApplyClubModel::getSingle($id);
        $data['header_title'] = "Edit Status Application Club";
        return view('hep.verify.edit', $data);
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'comment' => 'required',
        ]);

        $statusValues = [
            'Pending' => 0,
            'Approved' => 1,
            'Rejected' => 2,
        ];

        if (!array_key_exists($request->status, $statusValues)) {
        // Return an error message if the status value is not valid
        return redirect('hep/verify/list')->with('error', 'Invalid status value.');
        }

        $updateData = [
            'status' => $statusValues[$request->status],
            'comment' => $request->comment,
        ];

        ApplyClubModel::where('id', $id)->update($updateData);

        return redirect('hep/verify/list')->with('success', 'Application Status Updated Successfully.');
    }

    public function delete($id)
    {
        ApplyClubModel::where('id', $id)->delete();

        return redirect('hep/verify/list')->with('success', 'Application Deleted Successfully.');
    }
}
