<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\mUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function index()
    {
        $title = "Register Page";
        return view('auth.partials.register', ['title' => $title]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'muserName' => 'required|unique:mUser|max:40|min:5',
                'muserPwd' => 'required|min:5',
                'muserPwdconfirm' => 'required|min:5|same:muserPwd',
            ],
            [
                'muserName.required' => 'Username wajib diisi!',
                'muserName.unique' => 'Username sudah ada dalam database!',
                'muserName.min' => 'Username minimal 5 karakter!',
                'muserName.max' => 'Username maksimal 40 karakter!',
                'muserPwd.required' => 'Password wajib diisi!',
                'muserPwd.min' => 'Password minimal 5 karakter!',
                'muserPwdconfirm.required' => 'KonfirmasiPassword wajib diisi!',
                'muserPwdconfirm.min' => 'Password minimal 5 karakter!',
                'muserPwdconfirm.same' => 'Password yang anda masukkan tidak sama!'
            ]
        );
        $chtime = Carbon::now()->toDateTimeString();
        $chuser = Auth::user()->muserName;
        $wordlist = mUser::get();
        $muserId = count($wordlist) + 1;
        $data = [
            'muserID' => $muserId,
            'muserName' => $request->muserName,
            'muserPwd' => bcrypt($request->muserPwd),
            'muserLocked' => '0',
            'muserCreateDate' => $chtime,
            'muserCreateUser' => $chuser,
            'muserModiDate' => $chtime,
            'muserModiUser' => $chuser,
        ];

        mUser::create($data);
        return redirect()->to('register')->with('success', 'Berhasil menambahkan user!');
    }

    public function changepassword()
    {
        return view('auth.partials.changepassword')->with('title', 'Ganti Password');
    }

    public function updatepassword()
    {
        request()->validate([
            'muserPwd' => 'required',
            'muserPwdconfirm' => 'required|same:muserPwd'
        ], [
            'muserPwd.required' => 'password wajib diisi!'
        ]);
        $datapwd = [
            'muserPwd' => bcrypt(request()->muserPwd),
            'muserModiDate' => Carbon::now()->toDateTimeString(),
            'muserModiUser' => Auth::user()->muserName,
        ];
        mUser::where('muserID', Auth::id())->update($datapwd);
        return redirect()->to('home')->with(['success' => 'Berhasil mengganti password!', 'title' => 'Home']);
    }
}
