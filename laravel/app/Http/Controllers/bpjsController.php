<?php

namespace App\Http\Controllers;

use App\Models\Bpjs;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class bpjsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = Bpjs::where('bpjs', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Bpjs::orderBy('bpjs', 'asc')->cursorPaginate(10);
        }
        return view('bpjs.index')->with(['data' => $data, 'title' => 'BPJS']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bpjs.create')->with('title', 'BPJS');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('bpjs', $request->bpjs);
        Session::flash('name', $request->name);
        Session::flash('awal', $request->awal);
        Session::flash('akhir', $request->akhir);
        Session::flash('tarif', $request->tarif);
        Session::flash('penanggung', $request->penanggung);
        Session::flash('pengurangpph21', $request->pengurangpph21);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;
        $request->validate([
            'bpjs' => 'required|unique:bpjs,bpjs',
            'name' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
            'tarif' => 'required',
            'penanggung' => 'required',
            'pengurangpph21' => 'required',
        ], [
            'bpjs.required' => 'Kode wajib diisi!',
            'bpjs.unique' => 'Kode sudah ada dalam database!',
            'name.required' => 'Nama wajib diisi!',
            'awal.required' => 'Tanggal awal wajib diisi!',
            'akhir.required' => 'Tanggal akhir wajib diisi!',
            'tarif.required' => 'Tarif wajib diisi!',
            'penanggung.required' => 'Penanggung wajib diisi!',
        ]);
        $data = [
            'bpjs' => $request->bpjs,
            'name' => $request->name,
            'awal' => $request->awal,
            'akhir' => $request->akhir,
            'tarif' => $request->tarif,
            'penanggung' => $request->penanggung,
            'pengurangpph21' => $request->pengurangpph21,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        Bpjs::create($data);
        return redirect()->to('bpjs')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'BPJS']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bpjs  $bpjs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kolom = collect(Bpjs::first())->keys();
        $data = Bpjs::where('bpjs', $id)->first();
        // $d = $data->toArray();
        return view('bpjs.detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bpjs  $bpjs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bpjs::where('bpjs', $id)->first();
        return view('bpjs.edit')->with(['data' => $data, 'title' => 'BPJS']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bpjs  $bpjs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
            'tarif' => 'required',
            'penanggung' => 'required',
            'pengurangpph21' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi!',
            'awal.required' => 'Tanggal awal wajib diisi!',
            'akhir.required' => 'Tanggal akhir wajib diisi!',
            'tarif.required' => 'Tarif wajib diisi!',
            'penanggung.required' => 'Penanggung wajib diisi!',
        ]);
        $data = [
            'name' => $request->name,
            'name' => $request->name,
            'awal' => $request->awal,
            'akhir' => $request->akhir,
            'tarif' => $request->tarif,
            'penanggung' => $request->penanggung,
            'pengurangpph21' => $request->pengurangpph21,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];
        Bpjs::where('bpjs', $id)->update($data);
        return redirect()->to('bpjs')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'BPJS']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bpjs  $bpjs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bpjs::where('bpjs', $id)->delete();
        return redirect()->to('bpjs')->with(['success' => 'Berhasil menghapus data!', 'title' => 'BPJS']);
    }
}