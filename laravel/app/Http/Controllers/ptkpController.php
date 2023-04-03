<?php

namespace App\Http\Controllers;

use App\Models\Ptkp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ptkpController extends Controller
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
            $data = Ptkp::where('ptkp', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Ptkp::orderBy('ptkp', 'asc')->cursorPaginate(10);
        }
        return view('ptkp.index')->with(['data' => $data, 'title' => 'PTKP']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ptkp.create')->with('title', 'PTKP');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('ptkp', $request->ptkp);
        Session::flash('name', $request->name);
        Session::flash('val', $request->val);
        Session::flash('awal', $request->awal);
        Session::flash('akhir', $request->akhir);
        Session::flash('val2', $request->val2);
        Session::flash('grup', $request->grup);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;

        $request->validate([
            'ptkp' => 'required|unique:ptkp,ptkp',
            'name' => 'required',
            'val' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
            'val2' => 'required',
            'grup' => 'required',
        ], [
            'ptkp.required' => 'Kode wajib diisi!',
            'ptkp.unique' => 'Kode sudah ada dalam database!',
            'name.required' => 'Nama wajib diisi!',
            'val.required' => 'Nominal wajib diisi!',
            'awal.required' => 'Tanggal awal wajib diisi!',
            'akhir.required' => 'Tanggal berakhir wajib diisi!',
            'val2.required' => 'Nominal per hari wajib diisi!',
            'grup.required' => 'Grup wajib diisi!',
        ]);
        $data = [
            'ptkp' => $request->ptkp,
            'name' => $request->name,
            'val' => $request->val,
            'awal' => $request->awal,
            'akhir' => $request->akhir,
            'val2' => $request->val2,
            'grup' => $request->grup,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        Ptkp::create($data);
        return redirect()->to('ptkp')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Jabatan']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ptkp  $ptkp
     * @return \Illuminate\Http\Response
     */
    public function show(ptkp $ptkp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ptkp  $ptkp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ptkp::where('ptkp', $id)->first();
        return view('ptkp.edit')->with(['data' => $data, 'title' => 'PTKP']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ptkp  $ptkp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'val' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
            'val2' => 'required',
            'grup' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi!',
            'val.required' => 'Nominal wajib diisi!',
            'awal.required' => 'Tanggal awal wajib diisi!',
            'akhir.required' => 'Tanggal berakhir wajib diisi!',
            'val2.required' => 'Nominal per hari wajib diisi!',
            'grup.required' => 'Grup wajib diisi!',
        ]);
        $data = [
            'name' => $request->name,
            'val' => $request->val,
            'awal' => $request->awal,
            'akhir' => $request->akhir,
            'val2' => $request->val2,
            'grup' => $request->grup,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];
        Ptkp::where('ptkp', $id)->update($data);
        return redirect()->to('ptkp')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'PTKP']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ptkp  $ptkp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ptkp::where('ptkp', $id)->delete();
        return redirect()->to('ptkp')->with(['success' => 'Berhasil menghapus data!', 'title' => 'PTKP']);
    }
}