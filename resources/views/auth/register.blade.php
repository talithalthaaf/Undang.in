@extends('layouts.auth')

@section('subtitle')
    Create your account and start your wedding journey.
@endsection

@section('content')

    @if ($errors->any())
        <x-alert>
            Periksa kembali data yang kamu masukkan.
        </x-alert>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <x-input
            name="name"
            label="Nama Lengkap"
            type="text"
            placeholder="Masukkan nama lengkap kamu"
            required
        />

        <x-input
            name="email"
            label="Email"
            type="email"
            placeholder="Masukkan email kamu"
            required
        />

        <x-password-input
            name="password"
            label="Kata Sandi"
            placeholder="Minimal 8 karakter"
            required
        />

        <x-password-input
            name="password_confirmation"
            label="Konfirmasi Kata Sandi"
            placeholder="Masukkan ulang kata sandi"
            required
        />

        <x-button type="submit">
            Daftar
        </x-button>

    </form>

    <p class="auth-footer">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login sekarang</a>
    </p>

@endsection