<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amazon Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>body { background: #fff; }</style>
</head>
<body>

    <div class="auth-container">
        <div class="auth-logo">amaz<span>on</span></div>
        
        <div class="auth-box">
            <h3 class="fw-normal mb-3">Sign in</h3>
            <form method="POST" action="{{ route('sign_in') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold small">Email or mobile phone number</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-amazon w-100">Sign in</button>
            </form>
            <div class="mt-3 small">
                By continuing, you agree to Amazon's Conditions of Use and Privacy Notice.
            </div>
        </div>

        <div class="text-center mt-4">
            <div class="small text-muted mb-2">New to Amazon?</div>
            <a href="register.html" class="btn btn-amazon-secondary w-100">Create your Amazon account</a>
        </div>
    </div>

</body>
</html>