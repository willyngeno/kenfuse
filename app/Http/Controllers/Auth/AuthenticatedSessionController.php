use App\Http\Requests\LoginRequest;

public function store(LoginRequest $request)
{
    $request->authenticate();
    $request->session()->regenerate();
    return redirect()->intended($this->redirectTo());
}
protected function redirectTo()
{
    return route('home'); // Temporary route
}