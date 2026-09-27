<!DOCTYPE html>
<html lang="en">
<x-head site_name="Einloggen oder Anmelden" :js_files="['resources/js/auth.js']" />
<body>
    <x-header />
    <main>
        <div class="auth-container">
            <div class="auth-form login" id="login-form">
                <h1>Login</h1>
                <div class="form-wrapper">
                    <form action="/login" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit" disabled>Login</button>
                        <button type="button" class="btn-alternative" id="show-register">I don't have an
                            account.</button>
                    </form>
                </div>
            </div>

            <div class="auth-form register" id="register-form">
                <h1>Register</h1>
                <div class="form-wrapper">
                    <form action="/register" method="POST">
                        @csrf
                        <input type="text" name="first_name" placeholder="First name" required>
                        <input type="text" name="last_name" placeholder="Last name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="password_confirmation" placeholder="Repeat password" required>
                        <button type="submit" disabled>Register</button>
                        <button type="button" class="btn-alternative" id="show-login">I have an account.</button>
                    </form>
                </div>
            </div>
        </div>

        @if (isset($errors) && $errors->any())
            <aside>
                <div class="error-messages">
                    <ul class="error-list">
                        @foreach ($errors->all() as $error)
                            <li class="error-item"><p class="error-text">{{ $error }}</p><span class="close">X</span></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        @endif
        <x-footer />
</body>

</html>
