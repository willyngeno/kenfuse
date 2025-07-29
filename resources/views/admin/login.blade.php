
<head>
 <link href="css/style.css" rel="stylesheet" /
</head>
<div class="container mt-5">
<div body>
<h1>Admin Login</h1>
<form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">Login</button>
</form>

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

</div>
</div>