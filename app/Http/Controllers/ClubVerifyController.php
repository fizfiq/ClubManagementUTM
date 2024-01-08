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
        $data['header_title'] = "Edit Status Application Club";
        return view('hep.verify.edit', $data);
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $updateData = [
            'status' => $request->status,
        ];

        ApplyClubModel::where('id', $id)->update($updateData);

        return redirect()->route('hep.verify.list')->with('success', 'Application Status Updated Successfully.');
    }

    public function delete($id)
    {
        ApplyClubModel::where('id', $id)->delete();

        return redirect()->route('hep.verify.list')->with('success', 'Application Deleted Successfully.');
    }
}
