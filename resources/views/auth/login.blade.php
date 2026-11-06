<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In | Essence of the Middle East</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
body{background:linear-gradient(to bottom,#050505,#0d0d0d);color:#d3d3d3;font-family:'Poppins',sans-serif;min-height:100vh}
.auth-wrap{padding:65px 0}.auth-card{background:linear-gradient(145deg,#1f1f1f,#0d0d0d);border:1px solid #c79a5b;border-radius:15px;box-shadow:0 0 20px rgba(199,154,91,.20)}
h1{font-family:'Cormorant Garamond',serif;color:#d6ae73;font-size:2.8rem}
.form-control{background:#121212;color:#fff;border:1px solid #444;border-radius:0;padding:12px}.form-control:focus{background:#121212;color:#fff;border-color:#d6ae73;box-shadow:none}
.form-label{font-size:.78rem;letter-spacing:1.5px;text-transform:uppercase;color:#999}.btn-gold{background:#c79a5b;color:#050505;border:none;font-weight:600;padding:12px}.btn-gold:hover{background:#d6ae73;color:#000}
.role-choice{border:1px solid #444;background:#121212;color:#ccc;padding:14px;border-radius:6px;cursor:pointer;text-align:center;transition:.2s}.role-choice.active{border-color:#c79a5b;color:#d6ae73;background:#18120b}.role-choice input{display:none}.role-title{font-weight:600}.role-desc{font-size:.75rem;color:#888}.role-choice.active .role-desc{color:#aaa}
.auth-link{color:#d6ae73;text-decoration:none}.auth-link:hover{color:#fff}.security-note{font-size:.76rem;color:#888;border-top:1px solid #2a2a2a;padding-top:15px}
</style>
</head>
<body>
@include('partials.header')
<section class="auth-wrap"><div class="container"><div class="row justify-content-center"><div class="col-md-7 col-lg-5">
<div class="auth-card p-4 p-md-5">
<div class="text-center mb-4"><h1>Sign In</h1><p class="text-secondary mb-0">Access your Essence account</p></div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <button type="submit" class="btn btn-gold w-100">Sign In</button>
</form>
<p class="text-center mt-4 mb-0">Don't have an account? <a class="auth-link" href="{{ route('register') }}">Create an account</a></p>
<p class="text-center mt-2 mb-0"><a class="auth-link" href="{{ route('home') }}">Continue as guest</a></p>
</div></div></div></div></section>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.role-choice').forEach(label=>label.addEventListener('click',()=>{
 document.querySelectorAll('.role-choice').forEach(x=>x.classList.remove('active')); label.classList.add('active');
}));
</script>
</body></html>
