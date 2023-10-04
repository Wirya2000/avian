<?php

namespace App\Http\Controllers;

use App\Models\Table_a;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportTableA;
use App\Exports\Export;
use Illuminate\Http\Request;
use PDF;

class TableAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.table_a.index', [
          'table_as' => Table_a::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.table_a.create');
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
          'kode_toko_baru' => 'required',
        ]);

        Table_a::create($validatedData);

        return redirect('/table_a')->with('success', 'New data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table_a  $table_a
     * @return \Illuminate\Http\Response
     */
    public function show(Table_a $table_a)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table_a  $table_a
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $kode_toko_baru)
    {
      // dd(Table_a::where('kode_toko_baru', $kode_toko_baru)->first());
        return view('dashboard.table_a.edit', [
          'table_a' => Table_a::where('kode_toko_baru', $kode_toko_baru)->first()
          // 'table_a' => DB::select(DB::raw('SELECT * from table_a where kode_toko_baru ='+ $request->kode_toko_baru))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table_a  $table_a
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$kode_toko_baru)
    {
      // dd($request);

        $table_a = Table_a::where('kode_toko_baru', $kode_toko_baru)->first();
        Table_a::where('kode_toko_baru', $kode_toko_baru)->update([
          'kode_toko_lama' => $table_a->kode_toko_baru,
          'kode_toko_baru' => $request->kode_toko_baru
        ]);
        // Table_a::where('kode_toko_baru', $table_a->kode_toko_baru)
        //     ->update($rules);

        return redirect('/table_a')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table_a  $table_a
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $kode_toko_baru)
    {
        Table_a::where('kode_toko_baru',$kode_toko_baru)->delete();

        return redirect('/table_a')->with('success', 'Data has been deleted!');
    }

    public function import(Request $request){
        $validatedData = $request->validate([
          'file' => 'required',
        ]);
        Excel::import(new ImportTableA,
                      $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function export(Request $request){
        return Excel::download(new Export, 'Table_a.xlsx');
    }

    public function printPDF()
    {
    	$table_a = Table_a::all();
 
    	$pdf = PDF::loadview('dashboard.table_a.pdf',['table_as'=>$table_a]);
    	return $pdf->download('laporan-table_a.pdf');
    }
}
