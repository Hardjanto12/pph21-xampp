<?php

namespace App\Http\Controllers;

use App\Models\Asr;
use App\Models\Cbg;
use App\Models\Dvs;
use App\Models\Jbt;
use App\Models\Ktg;
use App\Models\Bpjs;
use App\Models\Ptkp;
use App\Models\Kry;
use App\Models\Mgj;
use Illuminate\Http\Request;

class selectController extends Controller
{
    public function selectdvs()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = Dvs::where('dvs', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Dvs::orderBy('dvs', 'asc')->cursorPaginate(10);
        }
        return view('Dvs.select')->with(['data' => $data, 'title' => 'Pilih Divisi']);
    }

    public function selectjbt()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = Jbt::where('jbt', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Jbt::orderBy('jbt', 'asc')->cursorPaginate(10);
        }
        return view('jbt.select')->with(['data' => $data, 'title' => 'Pilih Jabatan']);
    }

    public function selectasr()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = Asr::where('asr', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Asr::orderBy('asr', 'asc')->cursorPaginate(10);
        }
        return view('asr.select')->with(['data' => $data, 'title' => 'Pilih Asuransi']);
    }

    public function selectktg()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = ktg::where('ktg', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = ktg::orderBy('ktg', 'asc')->cursorPaginate(10);
        }
        return view('ktg.select')->with(['data' => $data, 'title' => 'Pilih Kategori Penghasilan']);
    }

    public function selectptkp()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = Ptkp::where('ptkp', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Ptkp::orderBy('ptkp', 'asc')->cursorPaginate(10);
        }
        return view('ptkp.select')->with(['data' => $data, 'title' => 'Pilih PTKP']);
    }

    public function selectcbg()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = cbg::where('cbg', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = cbg::orderBy('cbg', 'asc')->cursorPaginate(10);
        }
        return view('cbg.select')->with(['data' => $data, 'title' => 'Pilih Cabang']);
    }
    public function selectbpjs()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = Bpjs::where('bpjs', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Bpjs::orderBy('bpjs', 'asc')->cursorPaginate(10);
        }
        return view('bpjs.select')->with(['data' => $data, 'title' => 'Pilih BPJS']);
    }
    public function selectkry()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = Kry::where('kry', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Kry::orderBy('kry', 'asc')->cursorPaginate(10);
        }
        return view('kry.select')->with(['data' => $data, 'title' => 'Pilih Karyawan']);
    }

    public function selectmgj()
    {
        $katakunci = request()->katakunci;
        if (strlen($katakunci)) {
            $data = Mgj::where('mgj', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->cursorPaginate(10);
        } else {
            $data = Mgj::orderBy('mgj', 'asc')->cursorPaginate(10);
        }
        return view('mgj.select')->with(['data' => $data, 'title' => 'Pilih Penghasilan']);
    }
}