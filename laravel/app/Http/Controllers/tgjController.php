<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Krd;
use App\Models\Tgd;
use App\Models\Tgj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class tgjController extends Controller
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
            $data = Tgj::where('nojnl', 'like', "%$katakunci%")
                ->orWhere('kry', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Tgj::orderBy('nojnl', 'asc')->cursorPaginate(10);
        }
        return view('tgj.index')->with([
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
        if (is_null(session()->get('nojnl'))) {
            $n = Tgj::count() + 1;
            $y = Carbon::now()->format('Y');
            $m = Carbon::now()->format('m');
            $nojnl = "GJB-" . $y . $m . sprintf('%05d', $n);
            Session::flash('nojnl', $nojnl);
        }
        $headers = Tgj::where('nojnl', Session::get('nojnl'))->get();
        $details = Tgd::where('nojnl', Session::get('nojnl'))->get();

        return view('tgj.create')->with(['title' => 'Tambah Penghasilan', 'tgd' => $details, 'tgj' => $headers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::put('nojnl', $request->nojnl);
        Session::put('date', $request->date);
        Session::put('kry', $request->kry);
        Session::put('nik', $request->nik);
        Session::put('name', $request->name);
        $masa = date('m', strtotime($request->date));
        $tahun = date('Y', strtotime($request->date));
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;
        if (Tgj::where('nojnl', $request->nojnl)->exists() == false) {
            $request->validate([
                'nojnl' => 'required|unique:tgj,nojnl',
                'kry' => 'required',
                'nik' => 'required',
                'name' => 'required',
                // 'date' => 'required',
            ], [
                'nojnl.required' => 'Kode wajib diisi!',
                'kry.required' => 'Kode wajib diisi!',
                'nik.required' => 'NIK wajib diisi!',
                'name.required' => 'Nama wajib diisi!',
                // 'date.required' => 'Tanggal wajib diisi!',
                'nojnl' => 'Kode sudah ada!',
            ]);

            $data = [
                'nojnl' => $request->nojnl,
                'kry' => $request->kry,
                'nik' => $request->nik,
                'name' => $request->name,
                'date' => $request->date,
                'masa' => $masa,
                'tahun' => $tahun,
                'chtime' => $chtime,
                'chuser' => $chuser
            ];
            Tgj::create($data);
        }
        $datakrd = Krd::where('kry', $request->kry)->get();
        if (Tgd::where('nojnl', Session::get('nojnl'))->exists() == false) {
            foreach ($datakrd as $data) {
                $nojnl = $request->nojnl;
                $data = [
                    'nojnl' => $nojnl,
                    'mgj' => $data->mgj,
                    'name' => $data->name,
                    'ktg' => $data->ktg,
                    'umk' => $data->umk
                ];
                Tgd::create($data);
            }
        }

        $details = Tgd::where('nojnl', Session::get('nojnl'))->get();
        return redirect()->to('tgj/create')->with(['success' => 'Header ditambahkan', 'title' => 'Penghasilan', 'tgd' => $details]);
    }

    public function save()
    {
        Session::forget('nojnl');
        Session::forget('kry');
        Session::forget('nik');
        Session::forget('name');
        Session::forget('date');
        return redirect()->to('tgj')->with(['success' => 'Berhasil menambahkan data!', 'title' => 'Penghasilan']);
    }

    public function cancel()
    {
        Tgj::where('nojnl', Session::get('nojnl'))->delete();
        Tgd::where('nojnl', Session::get('nojnl'))->delete();
        Session::forget('nojnl');
        Session::forget('kry');
        Session::forget('nik');
        Session::forget('name');
        Session::forget('date');
        return redirect()->to('tgj')->with(['title' => 'Penghasilan']);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tgj  $tgj
     * @return \Illuminate\Http\Response
     */
    public function show(tgj $tgj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tgj  $tgj
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tgj::where('nojnl', $id)->first();
        $details = Tgd::where('nojnl', $id)->get();
        return view('tgj.edit')->with(['data' => $data, 'title' => 'Penghasilan', 'tgd' => $details]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tgj  $tgj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $masa = date('m', strtotime($request->date));
        $tahun = date('Y', strtotime($request->date));
        $request->validate([
            'kry' => 'required',
            'nik' => 'required',
            'name' => 'required',
            // 'date' => 'required',
        ], [
            'kry.required' => 'Kode wajib diisi!',
            'nik.required' => 'NIK wajib diisi!',
            'name.required' => 'Nama wajib diisi!',
            // 'date.required' => 'Tanggal wajib diisi!'
        ]);

        $data = [
            'kry' => $request->kry,
            'nik' => $request->nik,
            'name' => $request->name,
            'date' => $request->date,
            'masa' => $masa,
            'tahun' => $tahun
        ];
        Tgj::where('nojnl', $id)->update($data);
        $details = Tgd::where('nojnl', $id)->get();
        return redirect()->to('tgj/create')->with(['success' => 'Header ditambahkan', 'title' => 'Penghasilan', 'tgd' => $details]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tgj  $tgj
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tgj::where('nojnl', $id)->delete();
        Tgd::where('nojnl', $id)->delete();
        return redirect()->to('tgj')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Penghasilan']);
    }
}
