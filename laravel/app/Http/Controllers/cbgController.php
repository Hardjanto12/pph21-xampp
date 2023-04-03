<?php

namespace App\Http\Controllers;

use App\Models\Cbg;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class cbgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kolom = collect(cbg::first())->keys();
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = cbg::where('cbg', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = cbg::orderBy('cbg', 'asc')->cursorPaginate(10);
        }
        return view('cbg.index')->with(['data' => $data, 'title' => 'Cabang',  'kolom' => $kolom]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cbg.create')->with('title', 'Cabang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('cbg', $request->cbg);
        Session::flash('name', $request->name);
        Session::flash('alamat', $request->alamat);
        Session::flash('kel', $request->kel);
        Session::flash('kec', $request->kec);
        Session::flash('kota', $request->kota);
        Session::flash('prov', $request->prov);
        Session::flash('umk', $request->umk);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;
        $request->validate([
            'cbg' => 'required|unique:cbg,cbg',
            'name' => 'required',
            'alamat' => 'required',
            'kel' => 'required',
            'kec' => 'required',
            'kota' => 'required',
            'prov' => 'required',
            'umk' => 'required',
        ], [
            'cbg.required' => 'Kode wajib diisi!',
            'cbg.unique' => 'Kode sudah ada dalam database!',
            'name.required' => 'Nama wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'kel.required' => 'Kelurahan wajib diisi!',
            'kec.required' => 'Kecamatan wajib diisi!',
            'kota.required' => 'Kota wajib diisi!',
            'prov.required' => 'Provinsi wajib diisi!',
            'umk.required' => 'UMK wajib diisi!',
        ]);
        $datadvs = [
            'cbg' => $request->cbg,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'kel' => $request->kel,
            'kec' => $request->kec,
            'kota' => $request->kota,
            'prov' => $request->prov,
            'umk' => $request->umk,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        cbg::create($datadvs);
        return redirect()->to('cbg')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Cabang']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cbg  $cbg
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kolom = collect(cbg::first())->keys();
        $data = cbg::where('cbg', $id)->first();
        // $d = $data->toArray();
        return view('cbg.detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cbg  $cbg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = cbg::where('cbg', $id)->first();
        return view('cbg.edit')->with(['data' => $data, 'title' => 'Cabang']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cbg  $cbg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'kel' => 'required',
            'kec' => 'required',
            'kota' => 'required',
            'prov' => 'required',
            'umk' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'kel.required' => 'Kelurahan wajib diisi!',
            'kec.required' => 'Kecamatan wajib diisi!',
            'kota.required' => 'Kota wajib diisi!',
            'prov.required' => 'Provinsi wajib diisi!',
            'umk.required' => 'UMK wajib diisi!'
        ]);
        $data = [
            'name' => $request->name,
            'alamat' => $request->alamat,
            'kel' => $request->kel,
            'kec' => $request->kec,
            'kota' => $request->kota,
            'prov' => $request->prov,
            'umk' => $request->umk,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];
        cbg::where('cbg', $id)->update($data);
        return redirect()->to('cbg')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'Cabang']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cbg  $cbg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cbg::where('cbg', $id)->delete();
        return redirect()->to('cbg')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Cabang']);
    }
}