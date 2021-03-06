<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\ClientdatasExport;
use App\Imports\UsersImport;
use App\Imports\ClientdatasImport;
use App\Imports\CovenantsibisImport;
use Maatwebsite\Excel\Facades\Excel;
  
class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    public function export1() 
    {
        return Excel::download(new ClientdatasExport, 'clientdatas.xlsx');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
    public function import1() 
    {
        Excel::import(new CovenantsibisImport,request()->file('file'));
           
        return back();
    }
    public function import2() 
    {
        Excel::import(new ClientdatasImport,request()->file('file'));
           
        return back();
    }
}