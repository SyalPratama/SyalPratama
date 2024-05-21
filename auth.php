namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Hard-coded credentials for validation
        $validUsername = 'admin';
        $validPassword = 'password';

        if ($username === $validUsername && $password === $validPassword) {
            // Set user session (without using a database)
            Session::put('user', $username);

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login' => 'Username or password is incorrect.',
        ]);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}
