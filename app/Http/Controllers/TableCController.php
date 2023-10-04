<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportTableC;
use App\Imports\ImportTableC;
use App\Models\Table_a;
use App\Models\Table_c;
use Illuminate\Http\Request;
use PDF;

class TableCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.table_c.index', [
          'table_cs' => Table_c::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.table_c.create', [
        'table_as' => Table_a::all()
      ]);
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
          'kode_toko' => 'required',
          'area_sales' => 'required',
        ]);

        Table_c::create($validatedData);

        return redirect('/table_c')->with('success', 'New data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table_c  $table_c
     * @return \Illuminate\Http\Response
     */
    public function show(Table_c $table_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table_c  $table_c
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $kode_toko)
    {
      // dd(Table_c::where('kode_toko', $kode_toko)->first());
        return view('dashboard.table_c.edit', [
          'table_c' => Table_c::where('kode_toko', $kode_toko)->first()
          // 'table_c' => DB::select(DB::raw('SELECT * from table_c where kode_toko ='+ $request->kode_toko))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table_c  $table_c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$kode_toko)
    {
      // dd($request);

        Table_c::where('kode_toko', $kode_toko)
            ->update(['area_sales' => $request->area_sales]);
        // Table_c::where('kode_toko', $table_c->kode_toko)
        //     ->update($rules);

        return redirect('/table_c')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table_c  $table_c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $kode_toko)
    {
        Table_c::where('kode_toko',$kode_toko)->delete();

        return redirect('/table_c')->with('success', 'Data has been deleted!');
    }

    public function import(Request $request){
        $validatedData = $request->validate([
          'file' => 'required',
        ]);
        Excel::import(new ImportTableC,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function export(Request $request){
        return Excel::download(new ExportTableC, 'Table_c.xlsx');
    }

    public function printPDF()
    {
    	$table_c = Table_c::all();
 
    	$pdf = PDF::loadview('dashboard.table_c.pdf',['table_cs'=>$table_c]);
    	return $pdf->download('laporan-table_c.pdf');
    }
}
