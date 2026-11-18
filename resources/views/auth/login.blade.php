
@extends('layouts.auth')

@section('subtitle')
    Welcome Back! Please login to your account.
@endsection

@section('content')

    {{-- Pesan error jika login gagal --}}
    @if ($errors->any())
        <x-alert>
            Email atau kata sandi yang kamu masukkan tidak sesuai.
        </x-alert>
    @endif

    {{-- Form Login --}}
    <form action="#" method="POST">
        @csrf

        {{-- Input Email --}}
        <x-input
            name="email"
            label="Email"
            type="email"
            placeholder="Masukkan email kamu"
            required
        />

        {{-- Input Password --}}
        <x-password-input
            name="password"
            label="Kata Sandi"
            placeholder="Masukkan kata sandi kamu"
        />

        {{-- Tombol Login --}}
        <x-button type="submit">
            Login
        </x-button>

    </form>

    {{-- Link menuju halaman Register --}}
    <p class="auth-footer">
        Belum punya akun?
        <a href="{{ url('/register') }}">Daftar sekarang</a>
    </p>

@endsection
