<?php

namespace App\Http\Controllers;

use App\Models\Mgj;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class mgjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->get('chuser');

        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = Mgj::where('mgj', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->orWhere('ktg', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Mgj::orderBy('mgj', 'asc')->cursorPaginate(10);
        }

        return view('mgj.index')->with([
            'data' => $data,
            'title' => 'Penghasilan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mgj.create')->with('title', 'Tambah Penghasilan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('mgj', $request->mgj);
        Session::flash('name', $request->name);
        Session::flash('ktg', $request->ktg);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;
        $request->validate([
            'mgj' => 'required|unique:mgj,mgj',
            'ktg' => 'required',
            'name' => 'required',
        ], [
            'mgj.required' => 'Kode wajib diisi!',
            'name.required' => 'Nama wajib diisi!',
            'ktg.required' => 'Kategori penghasilan wajib diisi!',
            'mgj.unique' => 'Kode sudah ada dalam database!',
        ]);

        $data = [
            'mgj' => $request->mgj,
            'name' => $request->name,
            'ktg' => $request->ktg,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        Mgj::create($data);
        return redirect()->to('mgj')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Penghasilan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mgj  $mgj
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mgj::where('mgj', $id)->first();
        return view('mgj.detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mgj  $mgj
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mgj::where('mgj', $id)->first();
        return view('mgj.edit')->with(['data' => $data, 'title' => 'Penghasilan']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mgj  $mgj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ktg' => 'required',
            'name' => 'required',
        ], [
            'ktg.required' => 'NIK wajib diisi!',
            'name.required' => 'Nama wajib diisi!',
        ]);
        $datamgj = [
            'ktg' => $request->ktg,
            'name' => $request->name,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];
        Mgj::where('mgj', $id)->update($datamgj);
        return redirect()->to('mgj')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'Penghasilan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mgj  $mgj
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mgj::where('mgj', $id)->delete();
        return redirect()->to('mgj')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Penghasilan']);
    }
}