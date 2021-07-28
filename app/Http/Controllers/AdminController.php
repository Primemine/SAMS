<?php

namespace App\Http\Controllers;

use App\Models\Allocations;
use Illuminate\Http\Request;
use App\Exports\AllocationExport;
use App\Imports\AllocationsImport;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function index(){
        $allocations = Allocations::orderby('index_no','asc')->paginate(20);
        return view('admin.index')->with('allocations', $allocations);
        
    }

    /*
    *for importing data from the exce;l sheet to a database
    */
    public function upload(Request $request){

        $this->validate($request, [
            'imported_file' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('imported_file');

        Excel::import(new AllocationsImport, $file);
        
        return back()->with('toast_success','File  uploaded');
        
    }

    public function download(){
        return Excel::download(new AllocationExport, 'allocations.xlsx');
    }

    public function delete($id){
        $data = Allocations::find($id);
        $data->delete();
        return back()->with('toast_success','record deleted');
    }

    public function editRecord(Request $request, $id){
        $this->validate($request, [
            'index_no' => "nullable",
            'full_name' => "nullable",
            'sex' => "nullable",
            'registration_no' => "nullable",
            'collage' => "nullable",
            'course' => "nullable",
            'yos' => "nullable",
            'ma' => "nullable",
            'books_stationary' => "nullable",
            'tution_free' => "nullable",
            'field' => "nullable",
            'research' =>"nullable",
            'srf' => "nullable",
            'total' => "nullable"
        ]);

        $data = Allocations::find($id);

        $data->index_no= $request->input('index_no');
        $data->full_name=  $request->input('full_name');
        $data->sex= $request->input('sex');
        $data->registration_no= $request->input('registration_no');
        $data->collage= $request->input('collage');
        $data->course= $request->input('course');
        $data->yos= $request->input('yos');
        $data->ma= $request->input('ma');
        $data->books_stationary= $request->input('books_stationary');
        $data->tution_free= $request->input('tution_free');
        $data->field= $request->input('field');
        $data->research= $request->input('research');
        $data->srf= $request->input('srf');
        $data->total= $request->input('total');

        $data->save();

        return back()->with('toast_success','record Edited successful');
    }

    public function filter(Request $request, $id){
        $data = Allocations::findorfail($id);
        
    }
}
