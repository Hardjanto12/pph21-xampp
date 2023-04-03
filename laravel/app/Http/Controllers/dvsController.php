<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dvs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class dvsController extends Controller
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
            $data = Dvs::where('dvs', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Dvs::orderBy('dvs', 'asc')->cursorPaginate(10);
        }
        return view('dvs.index')->with(['data' => $data, 'title' => 'Divisi']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dvs.create')->with('title', 'Divisi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('dvs', $request->dvs);
        Session::flash('name', $request->name);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;
        $request->validate([
            'dvs' => 'required|unique:dvs,dvs',
            'name' => 'required'
        ], [
            'dvs.required' => 'Kode wajib diisi!',
            'dvs.unique' => 'Kode sudah ada dalam database!',
            'name.required' => 'Nama wajib diisi!'
        ]);
        $datadvs = [
            'dvs' => $request->dvs,
            'name' => $request->name,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        Dvs::create($datadvs);
        return redirect()->to('dvs')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Divisi']);
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
        $data = Dvs::where('dvs', $id)->first();
        return view('dvs.edit')->with(['data' => $data, 'title' => 'Divisi']);
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
        $datadvs = [
            'name' => $request->name,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];
        Dvs::where('dvs', $id)->update($datadvs);
        return redirect()->to('dvs')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'Divisi']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dvs::where('dvs', $id)->delete();
        return redirect()->to('dvs')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Divisi']);
    }
}
