<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | Essence of the Middle East</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
body{background:linear-gradient(to bottom,#050505,#0d0d0d);color:#d3d3d3;font-family:'Poppins',sans-serif;min-height:100vh}.auth-wrap{padding:55px 0}.auth-card{background:linear-gradient(145deg,#1f1f1f,#0d0d0d);border:1px solid #c79a5b;border-radius:15px;box-shadow:0 0 20px rgba(199,154,91,.20)}h1{font-family:'Cormorant Garamond',serif;color:#d6ae73;font-size:2.8rem}.form-control{background:#121212;color:#fff;border:1px solid #444;border-radius:0;padding:12px}.form-control:focus{background:#121212;color:#fff;border-color:#d6ae73;box-shadow:none}.form-label{font-size:.78rem;letter-spacing:1.5px;text-transform:uppercase;color:#999}.btn-gold{background:#c79a5b;color:#050505;border:none;font-weight:600;padding:12px}.btn-gold:hover{background:#d6ae73;color:#000}.role-choice{border:1px solid #444;background:#121212;color:#ccc;padding:14px;border-radius:6px;cursor:pointer;text-align:center;transition:.2s}.role-choice.active{border-color:#c79a5b;color:#d6ae73;background:#18120b}.role-choice input{display:none}.role-title{font-weight:600}.role-desc{font-size:.75rem;color:#888}.auth-link{color:#d6ae73;text-decoration:none}.employee-only{display:none}.security-note{font-size:.76rem;color:#888;border-top:1px solid #2a2a2a;padding-top:12px}
</style>
</head>
<body>
@include('partials.header')
<section class="auth-wrap"><div class="container"><div class="row justify-content-center"><div class="col-md-8 col-lg-6">
<div class="auth-card p-4 p-md-5">
<div class="text-center mb-4"><h1>Create Account</h1><p class="text-secondary mb-0">Choose the account type before registering</p></div>
@if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ route('register.store') }}">@csrf
<label class="form-label mb-2">Register as</label>
<div class="row g-2 mb-4">
<label class="col-6 role-choice {{ old('role','customer')==='customer' ? 'active' : '' }}"><input type="radio" name="role" value="customer" {{ old('role','customer')==='customer'?'checked':'' }}><div class="role-title"><i class="fa-regular fa-user me-1"></i> Customer</div><div class="role-desc">Create a shopping account</div></label>
<label class="col-6 role-choice {{ old('role')==='employee' ? 'active' : '' }}"><input type="radio" name="role" value="employee" {{ old('role')==='employee'?'checked':'' }}><div class="role-title"><i class="fa-solid fa-user-tie me-1"></i> Employee</div><div class="role-desc">Salon staff only</div></label>
</div>
<div class="mb-3"><label class="form-label">Full Name</label><input type="text" name="name" class="form-control" value="{{ old('name') }}" required></div>
<div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}" required></div>
<div class="mb-3 employee-only" id="employeeCodeBox"><label class="form-label">Salon Employee Verification Code</label><input type="password" name="employee_code" id="employeeCode" class="form-control" autocomplete="off"><div class="security-note mt-2">Employee registration is restricted to authorised salon staff. A valid salon verification code is required.</div></div>
<div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control" required></div>
<div class="mb-4"><label class="form-label">Confirm Password</label><input type="password" name="password_confirmation" class="form-control" required></div>
<button class="btn btn-gold w-100" type="submit">Create Account</button>
</form>
<p class="text-center mt-4 mb-0">Already registered? <a class="auth-link" href="{{ route('login') }}">Sign in</a></p>
</div></div></div></div></section>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const roles=document.querySelectorAll('input[name="role"]'), box=document.getElementById('employeeCodeBox'), code=document.getElementById('employeeCode');
function updateRole(){const employee=document.querySelector('input[name="role"]:checked')?.value==='employee';box.style.display=employee?'block':'none';code.required=employee;}
roles.forEach(r=>r.addEventListener('change',()=>{roles.forEach(x=>x.closest('.role-choice').classList.toggle('active',x.checked));updateRole();}));
updateRole();
document.querySelectorAll('.role-choice').forEach(label=>label.addEventListener('click',()=>{const radio=label.querySelector('input');radio.checked=true;radio.dispatchEvent(new Event('change'));}));
</script>
</body></html>
