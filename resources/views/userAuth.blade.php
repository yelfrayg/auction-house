<!DOCTYPE html>
<html lang="en">
<x-head site_name="Einloggen oder Anmelden" :js_files="['resources/js/auth.js']" />
<body>
    <x-header />
    <main>
        <div class="auth-container">
            <div class="auth-form login">
                <h1>Login</h1>
                <div class="form-wrapper">
                    <form action="/login" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Login</button>
                        <button class="btn-alternative">Ich habe noch keinen Account.</button>
                    </form>
                </div>
            </div>

            <div class="auth-form register">
                <h1>Register</h1>
                <div class="form-wrapper">
                    <form action="/register" method="POST" id="register-form">
                        @csrf
                        <input type="text" name="first_name" placeholder="First name" required>
                        <input type="text" name="last_name" placeholder="Last name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="password_confirmation" placeholder="Repeat password" required>
                        <button type="submit" disabled>Register</button>
                        <button class="btn-alternative">I have an account.</button>
                    </form>
                </div>
            </div>
        </div>
        <x-footer />
</body>

</html>
