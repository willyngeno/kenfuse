namespace App\Http\Middleware;

use Closure;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Symfony\Component\HttpFoundation\Response;

class RoleRedirect
{
public function handle($request, Closure $next)
    $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Example: check roles and redirect
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'vendor') {
            return redirect()->route('vendor.dashboard');
        }
        return $next($request);
    }
}
