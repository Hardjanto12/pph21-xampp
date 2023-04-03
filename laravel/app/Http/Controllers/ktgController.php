<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ktg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ktgController extends Controller
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
            $data = Ktg::where('ktg', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Ktg::orderBy('ktg', 'asc')->cursorPaginate(10);
        }
        return view('ktg.index')->with(['data' => $data, 'title' => 'Kategori Penghasilan']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ktg.create')->with('title', 'Kategori Penghasilan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('ktg', $request->ktg);
        Session::flash('name', $request->name);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;

        $request->validate([
            'ktg' => 'required|unique:ktg,ktg',
            'name' => 'required'
        ], [
            'ktg.required' => 'Kode wajib diisi!',
            'ktg.unique' => 'Kode sudah ada dalam database!',
            'name.required' => 'Nama wajib diisi!'
        ]);
        $dataktg = [
            'ktg' => $request->ktg,
            'name' => $request->name,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        Ktg::create($dataktg);
        return redirect()->to('ktg')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Kategori Penghasilan']);
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
        $data = Ktg::where('ktg', $id)->first();
        return view('ktg.edit')->with(['data' => $data, 'title' => 'Kategori Penghasilan']);
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
        $dataktg = [
            'name' => $request->name,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];
        Ktg::where('ktg', $id)->update($dataktg);
        return redirect()->to('ktg')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'Kategori Penghasilan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ktg::where('ktg', $id)->delete();
        return redirect()->to('ktg')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Kategori Penghasilan']);
    }
}