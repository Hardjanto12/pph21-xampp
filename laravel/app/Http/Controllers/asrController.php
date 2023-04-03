<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Asr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class asrController extends Controller
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
            $data = Asr::where('asr', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Asr::orderBy('asr', 'asc')->cursorPaginate(10);
        }
        return view('asr.index')->with(['data' => $data, 'title' => 'Asuransi']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asr.create')->with('title', 'Asuransi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('asr', $request->asr);
        Session::flash('name', $request->name);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;

        $request->validate([
            'asr' => 'required|unique:asr,asr',
            'name' => 'required'
        ], [
            'asr.required' => 'Kode wajib diisi!',
            'asr.unique' => 'Kode sudah ada dalam database!',
            'name.required' => 'Nama wajib diisi!'
        ]);
        $dataasr = [
            'asr' => $request->asr,
            'name' => $request->name,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        Asr::create($dataasr);
        return redirect()->to('asr')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Divisi']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Asr::where('asr', $id)->first();
        return view('asr.edit')->with(['data' => $data, 'title' => 'Asuransi']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi!'
        ]);
        $dataasr = [
            'name' => $request->name,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];
        Asr::where('asr', $id)->update($dataasr);
        return redirect()->to('asr')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'Asuransi']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asr::where('asr', $id)->delete();
        return redirect()->to('asr')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Asuransi']);
    }
}