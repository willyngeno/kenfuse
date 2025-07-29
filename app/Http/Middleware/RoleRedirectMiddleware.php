namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleRedirectMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('Admin')) {
                return redirect('/admin/dashboard');
            }

            if ($user->hasRole('Vendor')) {
                return redirect('/vendor/dashboard');
            }

            if ($user->hasRole('Customer')) {
                return redirect('/customer/home');
            }

            if ($user->hasRole('Funeral Home')) {
                return redirect('/funeral-home');
            }
        }

        return $next($request);
    }
}
