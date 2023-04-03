<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kry;
use App\Models\Krd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class kryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        Session::forget('nojnl');
        Session::forget('kry');
        Session::forget('nik');
        Session::forget('name');
        Session::forget('date');
        $request->session()->get('chuser');
        $katakunci = $request->katakunci;
        if (strlen($katakunci)) {
            $data = Kry::where('kry', 'like', "%$katakunci%")
                ->orWhere('nik', 'like', "%$katakunci%")
                ->orWhere('dvs', 'like', "%$katakunci%")
                ->orWhere('jbt', 'like', "%$katakunci%")
                ->orWhere('asr', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Kry::orderBy('kry', 'asc')->cursorPaginate(10);
        }
        return view('kry.index')->with([
            'data' => $data,
            'title' => 'Karyawan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = Krd::where('kry', Session::get('kry'))->get();
        return view('kry.create')->with(['title' => 'Tambah Karyawan', 'krd' => $details]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        Session::flash('kry', $request->kry);
        Session::flash('nik', $request->nik);
        Session::flash('name', $request->name);
        Session::flash('alamat', $request->alamat);
        Session::flash('kota', $request->kota);
        Session::flash('telp', $request->telp);
        Session::flash('kel', $request->kel);
        Session::flash('kec', $request->kec);
        Session::flash('prop', $request->prop);
        Session::flash('gender', $request->gender);
        Session::flash('awal', $request->awal);
        Session::flash('akhir', $request->akhir);
        Session::flash('dvs', $request->dvs);
        Session::flash('jbt', $request->jbt);
        Session::flash('asr', $request->asr);
        Session::flash('ptkp', $request->ptkp);
        Session::flash('cbg', $request->cbg);
        Session::flash('bpjs', $request->bpjs);
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;
        if (Kry::where('kry', $request->kry)->exists() == false) {
            $request->validate([
                'kry' => 'unique:kry,kry',

            ], [
                'kry.unique' => 'Kode sudah ada dalam database!',
            ]);
            $data = [
                'kry' => $request->kry,
                'nik' => $request->nik,
                'name' => $request->name,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'telp' => $request->telp,
                'kel' => $request->kel,
                'kec' => $request->kec,
                'prop' => $request->prop,
                'gender' => $request->gender,
                'awal' => $request->awal,
                'akhir' => $request->akhir,
                'ptkp' => $request->ptkp,
                'bpjs' => $request->bpjs,
                'cbg' => $request->cbg,
                'dvs' => $request->dvs,
                'asr' => $request->asr,
                'jbt' => $request->jbt,
                'chtime' => $chtime,
                'chuser' => $chuser
            ];
            Kry::create($data);
        }

        $request->validate([
            'kry' => 'required',
            'mgj' => 'required',
            'mgjname' => 'required',
            'mgjktg' => 'required',
            'umk' => 'required',
        ], [
            'kry.required' => 'Kode karyawan wajib diisi!',
            'mgj.required' => 'Kode penghasilan wajib diisi!',
            'mgjname.required' => 'Nama wajib diisi!',
            'mgjktg.required' => 'Kategori penghasilan wajib diisi!',
            'umk.required' => 'UMK wajib diisi!',
        ]);

        $data = [
            'kry' => $request->kry,
            'mgj' => $request->mgj,
            'name' => $request->mgjname,
            'ktg' => $request->mgjktg,
            'umk' => $request->umk,
            'chtime' => $chtime,
            'chuser' => $chuser
        ];
        if (Krd::where('kry', Session::get('kry'))->where('mgj', $request->mgj)->exists()) {
            $details = Krd::where('kry', Session::get('kry'))->get();
            return redirect()->to('kry/create')->with(['error' => 'Data sudah ada', 'title' => 'Karyawan', 'krd' => $details]);
        }
        Krd::create($data);
        $details = Krd::where('kry', Session::get('kry'))->get();

        return redirect()->to('kry/create')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Karyawan', 'krd' => $details]);
        // return redirect()->to('kry')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Karyawan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kry  $kry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Kry::where('kry', $id)->first();
        return view('kry.detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kry  $kry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $details = Krd::where('kry', $id)->get();
        $data = Kry::where('kry', $id)->first();
        return view('kry.edit')->with(['data' => $data, 'title' => 'Karyawan', 'krd' => $details]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kry  $kry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nik' => 'required',
        //     'dvs' => 'required',
        //     'jbt' => 'required',
        //     'asr' => 'required',
        //     'name' => 'required',
        //     'alamat' => 'required',
        //     'kota' => 'required',
        //     'telp' => 'required',
        //     'kel' => 'required',
        //     'kec' => 'required',
        //     'prop' => 'required',
        //     'gender' => 'required',
        //     'awal' => 'required',
        //     'akhir' => 'required',
        //     'ptkp' => 'required',
        //     'cbg' => 'required',
        //     'bpjs' => 'required',
        // ], [
        //     'nik.required' => 'NIK wajib diisi!',
        //     'dvs.required' => 'Divisi wajib diisi!',
        //     'jbt.required' => 'Jabatan wajib diisi!',
        //     'asr.required' => 'Asuransi wajib diisi!',
        //     'name.required' => 'Nama wajib diisi!',
        //     'alamat.required' => 'Alamat wajib diisi!',
        //     'kota.required' => 'Kota wajib diisi!',
        //     'telp.required' => 'Kota wajib diisi!',
        //     'kel.required' => 'Kelurahan wajib diisi!',
        //     'kec.required' => 'Kecamatan wajib diisi!',
        //     'prop.required' => 'Provinsi wajib diisi!',
        //     'gender.required' => 'Gender wajib diisi!',
        //     'awal.required' => 'Tanggal bergabung wajib diisi!',
        //     'akhir.required' => 'Tanggal berhenti wajib diisi!',
        //     'ptkp.required' => 'PTKP wajib diisi!',
        //     'cbg.required' => 'Cabang wajib diisi!',
        //     'bpjs.required' => 'BPJS wajib diisi!',
        // ]);
        $data = [
            'nik' => $request->nik,
            'dvs' => $request->dvs,
            'asr' => $request->asr,
            'jbt' => $request->jbt,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'kel' => $request->kel,
            'kec' => $request->kec,
            'prop' => $request->prop,
            'gender' => $request->gender,
            'awal' => $request->awal,
            'akhir' => $request->akhir,
            'ptkp' => $request->ptkp,
            'bpjs' => $request->bpjs,
            'cbg' => $request->cbg,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName,
        ];

        Kry::where('kry', $id)->update($data);

        $request->validate([
            'mgj' => 'required',
            'mgjname' => 'required',
            'mgjktg' => 'required',
            'umk' => 'required',
        ], [
            'mgj.required' => 'Kode penghasilan wajib diisi!',
            'mgjname.required' => 'Nama wajib diisi!',
            'mgjktg.required' => 'Kategori penghasilan wajib diisi!',
            'umk.required' => 'UMK wajib diisi!',
        ]);

        $data = [
            'kry' => $id,
            'mgj' => $request->mgj,
            'name' => $request->mgjname,
            'ktg' => $request->mgjktg,
            'umk' => $request->umk,
            'chtime' => Carbon::now()->toDateTimeString(),
            'chuser' => Auth::user()->muserName
        ];
        if (Krd::where('kry', $id)->where('mgj', $request->mgj)->exists()) {
            $details = Krd::where('kry', Session::get('kry'))->get();
            return redirect()->to('kry/' . trim($id) . '/edit')->with(['error' => 'Data sudah ada', 'title' => 'Karyawan', 'krd' => $details]);
        }
        Krd::create($data);
        $details = Krd::where('kry', Session::get('kry'))->get();

        return redirect()->to('kry/' . trim($id) . '/edit')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Karyawan', 'krd' => $details]);
        // return redirect()->to('kry')->with(['success' => 'Berhasil melakukan update data!', 'title' => 'Karyawan', 'krd' => $details]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kry  $kry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kry::where('kry', $id)->delete();
        Krd::where('kry', $id)->delete();
        return redirect()->to('kry')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Karyawan']);
    }

    public function deletekrd($id, $mgj)
    {
        dd($id . $mgj);
    }
}
