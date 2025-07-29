use Spatie\Permission\Models\Role;

public function store(Request $request): RedirectResponse
{
    // validation...

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Assign default role (optional)
    $user->assignRole('Customer');  // You can change this dynamically later
     $user->assignRole($request->role);

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}
