<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportTableD;
use App\Imports\ImportTableD;
use App\Models\Table_d;
use Illuminate\Http\Request;
use PDF;

class TableDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.table_d.index', [
          'table_ds' => Table_d::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.table_d.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'kode_sales' => 'required',
          'nama_sales' => 'required',
        ]);

        Table_d::create($validatedData);

        return redirect('/table_d')->with('success', 'New data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table_d  $table_d
     * @return \Illuminate\Http\Response
     */
    public function show(Table_d $table_d)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table_d  $table_d
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $kode_sales)
    {
      // dd(Table_d::where('kode_sales', $kode_sales)->first());
        return view('dashboard.table_d.edit', [
          'table_d' => Table_d::where('kode_sales', $kode_sales)->first()
          // 'table_d' => DB::select(DB::raw('SELECT * from table_d where kode_sales ='+ $request->kode_sales))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table_d  $table_d
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$kode_sales)
    {
      // dd($request);

        Table_d::where('kode_sales', $kode_sales)
            ->update([
              'nama_sales' => $request->nama_sales,
              'kode_sales' => $request->kode_sales,
            ]);
        // Table_d::where('kode_sales', $table_d->kode_sales)
        //     ->update($rules);

        return redirect('/table_d')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table_d  $table_d
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $kode_sales)
    {
        Table_d::where('kode_sales',$kode_sales)->delete();

        return redirect('/table_d')->with('success', 'Data has been deleted!');
    }

    public function import(Request $request){
        $validatedData = $request->validate([
          'file' => 'required',
        ]);
        Excel::import(new ImportTableD,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function export(Request $request){
        return Excel::download(new ExportTableD, 'Table_d.xlsx');
    }

    public function printPDF()
    {
    	$table_d = Table_d::all();
 
    	$pdf = PDF::loadview('dashboard.table_d.pdf',['table_ds'=>$table_d]);
    	return $pdf->download('laporan-table_d.pdf');
    }
}
