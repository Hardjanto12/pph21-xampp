<?php

namespace App\Http\Controllers;

use App\Models\Krd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class krdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Krd  $krd
     * @return \Illuminate\Http\Response
     */
    public function show(Krd $krd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Krd  $krd
     * @return \Illuminate\Http\Response
     */
    public function edit(Krd $krd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Krd  $krd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Krd $krd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Krd  $krd
     * @return \Illuminate\Http\Response
     */
    public function destroyedit($id, $mgj)
    {

        Krd::where('kry', $id)->where('mgj', $mgj)->delete();
        $details = Krd::where('kry', Session::get('kry'))->get();
        return redirect()->to('kry/' . trim($id) . '/edit')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Edit Karyawan', 'krd' => $details]);
    }
    public function destroycreate($id, $mgj)
    {

        Krd::where('kry', $id)->where('mgj', $mgj)->delete();
        $details = Krd::where('kry', Session::get('kry'))->get();
        return redirect()->to('kry/create')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Karyawan', 'krd' => $details]);
    }
}