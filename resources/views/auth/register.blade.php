@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="authentication-inner">
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4">
                <a href="/" class="app-brand-link gap-2">
                    <span class="app-brand-text demo text-body fw-bolder">SOSAG ASSALAAM</span>
                </a>
            </div>

            <h4 class="mb-2">Daftarkan Akun Anda 🔐</h4>
            <p class="mb-4">Silakan isi data di bawah untuk mendaftar</p>

            <form class="mb-3" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                </div>
            </form>

            <p class="text-center">
                <span>Sudah punya akun?</span>
                <a href="{{ route('login') }}"><span>Masuk</span></a>
            </p>
        </div>
    </div>
</div>
@endsection

