<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportTableB;
use App\Imports\ImportTableB;
use App\Models\Table_a;
use App\Models\Table_b;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TableBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.table_b.index', [
          'table_bs' => Table_b::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.table_b.create', [
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
          'nominal_transaksi' => 'required',
        ]);

        Table_b::create($validatedData);

        return redirect('/table_b')->with('success', 'New data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table_b  $table_b
     * @return \Illuminate\Http\Response
     */
    public function show(Table_b $table_b)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table_b  $table_b
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $kode_toko)
    {
      // dd(Table_b::where('kode_toko', $kode_toko)->first());
        return view('dashboard.table_b.edit', [
          'table_b' => Table_b::where('kode_toko', $kode_toko)->first()
          // 'table_b' => DB::select(DB::raw('SELECT * from table_b where kode_toko ='+ $request->kode_toko))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table_b  $table_b
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$kode_toko)
    {
      // dd($request);

        Table_b::where('kode_toko', $kode_toko)
            ->update(['nominal_transaksi' => $request->nominal_transaksi]);
        // Table_b::where('kode_toko', $table_b->kode_toko)
        //     ->update($rules);

        return redirect('/table_b')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table_b  $table_b
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $kode_toko)
    {
        Table_b::where('kode_toko',$kode_toko)->delete();

        // $q = 'DELETE FROM table_b where kode_toko = ?'; 
        // \DB::delete($q, [$request->kode_toko]);

        return redirect('/table_b')->with('success', 'Data has been deleted!');
    }

    public function import(Request $request){
        $validatedData = $request->validate([
          'file' => 'required',
        ]);
        Excel::import(new ImportTableB,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function export(Request $request){
        return Excel::download(new ExportTableB, 'Table_b.xlsx');
    }

    public function printPDF()
    {
    	$table_b = Table_b::all();
 
    	$pdf = PDF::loadview('dashboard.table_b.pdf',['table_bs'=>$table_b]);
    	return $pdf->download('laporan-table_b.pdf');
    }
}
