<?php

namespace App\Http\Controllers;

use App\Models\Tgd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class tgdController extends Controller
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
     * @param  \App\Models\Tgd  $tgd
     * @return \Illuminate\Http\Response
     */
    public function show(Tgd $tgd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tgd  $tgd
     * @return \Illuminate\Http\Response
     */
    public function edit(Tgd $tgd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tgd  $tgd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tgd $tgd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tgd  $tgd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tgd $tgd)
    {
        //
    }

    public function edittgdcreate(Request $request)
    {

        $data = [
            'mgj' => $request->mgj,
            'name' => $request->mgjname,
            'ktg' => $request->mgjktg,
            'umk' => $request->umk,
        ];
        Tgd::where('nojnl', $request->nojnltgd)->where('mgj', $request->mgj)->update($data);

        $details = Tgd::where('nojnl', $request->nojnltgd)->get();

        return redirect()->to('tgj/create')->with(['success' => 'Berhasil update data!', 'title' => 'Edit Penghasilan', 'tgd' => $details,]);
    }

    public function edittgdedit(Request $request)
    {

        $data = [
            'mgj' => $request->mgj,
            'name' => $request->mgjname,
            'ktg' => $request->mgjktg,
            'umk' => $request->umk,
        ];
        Tgd::where('nojnl', $request->nojnltgd)->where('mgj', $request->mgj)->update($data);

        $details = Tgd::where('nojnl', $request->nojnltgd)->get();

        return redirect()->to('tgj/' . $request->nojnltgd . '/edit')->with(['success' => 'Berhasil update data!', 'title' => 'Edit Penghasilan', 'tgd' => $details]);
    }

    public function destroyedit($id, $mgj)
    {
        Tgd::where('nojnl', $id)->where('mgj', $mgj)->delete();
        $details = Tgd::where('nojnl', Session::get('nojnl'))->get();
        return redirect()->to('tgj/' . trim($id) . '/edit')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Edit Penghasilan', 'tgd' => $details]);
    }

    public function destroycreate($id, $mgj)
    {
        Tgd::where('nojnl', $id)->where('mgj', $mgj)->delete();
        $details = Tgd::where('nojnl', Session::get('nojnl'))->get();
        return redirect()->to('tgj/create')->with(['success' => 'Berhasil menghapus data!', 'title' => 'Penghasilan', 'tgd' => $details]);
    }
}