@extends('layouts.components.form')

@section('title')
    Aplikasi Update
@endsection

@section('bg-form')
    bg-app-form-bg
@endsection

@section('form-title')
    Ubah Aplikasi
@endsection

@section('content')
    @error('name')
        <div class="font-semibold text-sm text-red-500 text-center">{{ $message }}</div>
    @enderror
    @error('version')
        <div class="font-semibold text-sm text-red-500 text-center">{{ $message }}</div>
    @enderror
    @error('category')
        <div class="font-semibold text-sm text-red-500 text-center">{{ $message }}</div>
    @enderror
    @error('image')
        <div class="font-semibold text-sm text-red-500 text-center">{{ $message }}</div>
    @enderror
    @error('link')
        <div class="font-semibold text-sm text-red-500 text-center">{{ $message }}</div>
    @enderror

    <form method="post" action="/member/aplikasi/updating/{{ $application->id }}" class="flex flex-col h-auto px-16 lg:px-28 xl:w-3/4" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-6">
            <label for="nama" class="text-sm lg:text-base xl:text-lg font-medium">
                Nama
                <input type="text" name="name" id="nama" placeholder="nama aplikasi" class="p-1 rounded-md w-full  border-none focus:ring-sky-500 focus:ring-2" value="{{ $application->name }}" required>
            </label>
            <label for="versi" class="text-sm lg:text-base xl:text-lg font-medium">
                Versi
                <input type="text" name="version" id="versi" placeholder="versi aplikasi" class="p-1 rounded-md w-full  border-none focus:ring-sky-500 focus:ring-2" value="{{ $application->version }}" required>
            </label>
            <label for="kategori" class="text-sm lg:text-base xl:text-lg font-medium">
                Kategori
                <select name="category" id="kategori" onchange="imgAppUpdate();" class="w-full p-1 rounded-md hover:cursor-pointer  border-none focus:ring-sky-500 focus:ring-2">
                    <option value="{{ $application->category }}" disabled selected class="text-[#9CA3AF]">{{ $application->category }} App</option>
                    <option value="Line">Line App</option>
                    <option value="Clone">Cloning App</option>
                    <option value="Other">Lainnya</option>
                </select>
            </label>
            <label for="gambar" class="text-sm lg:text-base xl:text-lg font-medium" id="img-input">
                Gambar
                <input type="file" name="image" id="gambar" class="rounded-md bg-white w-full text-[#9CA3AF] hover:cursor-pointer" accept=".jpg,.jpeg,.png" value="{{ $application->image }}">
                <p class="font-normal text-sm">gambar default: <strong>{{ $application->image }}</strong></p>
            </label>
            <label for="link" class="text-sm lg:text-base xl:text-lg font-medium">
                Link
                <input type="url" name="link" id="link" placeholder="link aplikasi" class="p-1 rounded-md w-full  border-none focus:ring-sky-500 focus:ring-2" value="{{ $application->link }}" required>
            </label>
        </div>
        <div class="flex flex-col">
            <button type="submit" class="bg-amber-400 text-white lg:text-lg xl:text-xl p-[5px] rounded-md hover:opacity-80 mb-2">Ubah</button>
            <a href="/member/aplikasi" class="text-center bg-dark text-white lg:text-lg xl:text-xl p-[5px] rounded-md hover:opacity-80">Batal</a>
        </div>
    </form>
@endsection

@section('extend-js')
    <script src="/js/image-app.js"></script>
@endsection