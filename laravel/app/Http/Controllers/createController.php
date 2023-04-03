<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ktg;
use App\Models\Mgj;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;

class createController extends Controller
{
    public function createKtg()
    {
        $kode = 1;

        for ($kode = 1; $kode <= 20; $kode++) {
            $name = "Kategori Penghasilan " . $kode;
            $ktg = "ktg-" . sprintf('%04d', $kode);
            $d = [
                'ktg' => $ktg,
                'name' => $name,
                'chtime' => Carbon::now()->toDateTimeString(),
                'chuser' => Auth::user()->muserName,
            ];
            Ktg::create($d);
        }
        echo "berhasil menambahkan data";
        $output = Ktg::all();
        foreach ($output as $item) {
            echo $item;
            echo "<br>";
        };
    }
    public function createMgj()
    {
        $kode = 1;

        for ($kode = 1; $kode <= 20; $kode++) {
            $ktgdata = Ktg::all('ktg')->toArray();
            $t = random_int(0, 19);
            $name = "Penghasilan " . $kode;
            $mgj = "mgj-" . sprintf('%04d', $kode);
            // $ktg = $ktgdata[$t]['ktg'];

            $d = [
                'mgj' => $mgj,
                'name' => $name,
                'ktg' => $ktgdata[$t]['ktg'],
                'chtime' => Carbon::now()->toDateTimeString(),
                'chuser' => Auth::user()->muserName,
            ];
            Mgj::create($d);
        }
        echo "berhasil menambahkan data";
        $output = Mgj::all();
        foreach ($output as $item) {
            echo $item;
            echo "<br>";
        };
    }
}
