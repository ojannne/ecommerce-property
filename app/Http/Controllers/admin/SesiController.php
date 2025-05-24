<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class SesiController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        // Cari user berdasarkan name
        $user = User::where('name', $request->name)->first();

        if (!$user) {
            return back()->withErrors([
                'name' => 'Akun belum terdaftar.',
            ])->withInput();
        }

        // Siapkan credentials
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        // Lakukan login dengan credentials
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/admin');
            } elseif ($user->role === 'user' && $user->is_verified) {
                return redirect()->route('user.index'); // Halaman user
            } else {
                Auth::logout();
                return back()->withErrors(['login' => 'Anda harus diverifikasi oleh admin terlebih dahulu.'])->withInput();
            }
        }

        // Jika password salah
        return back()->withErrors([
            'password' => 'Password salah.',
        ])->withInput(['name' => $request->name]);
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login');
    }

    public function register()
    {
        // return view('admin.user.add');
        return view('admin.auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'nowa' => 'required|string',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Password tidak cocok dengan konfirmasi',
            'nowa.required' => 'Nomor WhatsApp wajib diisi',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nowa' => $request->nowa,
            'role' => 'user', // Default role
            'is_verified' => false, // Tunggu verifikasi admin
        ]);

        return redirect()->route('login')->with('info', 'Akun berhasil dibuat. Tunggu verifikasi dari admin untuk dapat mengakses halaman utama.');
    }
    public function list()
    {
        $data = User::where('role', 'admin')->get();
        return view('admin.user.list', compact('data'));
    }


    public function editAdmin($id)
    {
        $user = User::where('id', $id)->where('role', 'admin')->firstOrFail();
        return view('admin.user.edit', compact('user'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'nowa' => 'required|unique:users,nowa,' . $id,
            'password' => 'nullable|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama sudah terdaftar',
            'nowa.required' => 'Nomor wajib diisi',
            'nowa.unique' => 'Nomor sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.confirmed' => 'Password tidak cocok dengan konfirmasi',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nowa = $request->nowa;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user')->with('success', 'Data admin berhasil diperbarui.');
    }

  public function deleteUser($id)
{
    $user = User::where('id', $id)->where('role', 'user')->firstOrFail();
    $user->delete();

    return redirect()->route('admin.verify.users')->with('success', 'Akun pengguna berhasil dihapus.');
}

    public function createAdmin()
    {
        return view('admin.user.add'); // View khusus untuk register admin
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'nowa' => 'required|string',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Password tidak cocok dengan konfirmasi',
            'nowa.required' => 'Nomor WhatsApp wajib diisi',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Role admin
            'nowa' => $request->nowa,
            'is_verified' => true, // Langsung diverifikasi karena admin dibuat oleh admin
        ]);

        return redirect()->route('user')->with('success', 'Akun admin berhasil dibuat.');
    }
    public function deleteAdmin($id)
    {
        $user = User::where('id', $id)->where('role', 'admin')->firstOrFail();
        $user->delete();

        return redirect()->route('user')->with('success', 'Akun admin berhasil dihapus.');
    }
}
