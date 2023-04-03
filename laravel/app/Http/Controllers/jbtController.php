<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jbt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class jbtController extends Controller
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
            $data = Jbt::where('jbt', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Jbt::orderBy('jbt', 'asc')->cursorPaginate(10);
        }
        return view('jbt.index')->with(['data' => $data, 'title' => 'Jabatan']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jbt.create')->with('title', 'Jabatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('jbt', $request->jbt);
        Session::flash('name', $request->name);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;

        $request->validate([
            'jbt' => 'required|unique:jbt,jbt',
            'name' => 'required'
        ], [
            'jbt.required' => 'Kode wajib diisi!',
            'jbt.unique' => 'Kode sudah ada dalam database!',
            'name.required' => 'Nama wajib diisi!'
        ]);
        $datajbt = [
            'jbt' => $request->jbt,
            'name' => $request->name,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        Jbt::create($datajbt);
        return redirect()->to('jbt')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Jabatan']);
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
        $data = Jbt::where('jbt', $id)->first();
        return view('jbt.edit')->with(['data' => $data, 'title' => 'Jabatan']);
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
        $datajbt = [
            'name' => $request->name,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];
        Jbt::where('jbt', $id)->update($datajbt);
        return redirect()->to('jbt')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'Jabatan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jbt::where('jbt', $id)->delete();
        return redirect()->to('jbt')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Jabatan']);
    }
}