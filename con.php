namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Jika validasi gagal, kembalikan ke halaman login dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek kredensial pengguna
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Jika sukses, redirect ke halaman yang diinginkan (misalnya dashboard)
            return redirect()->intended('/dashboard');
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['email' => 'Kredensial yang diberikan tidak sesuai.'])->withInput();
    }
}
