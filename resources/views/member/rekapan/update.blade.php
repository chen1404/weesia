@extends('layouts.components.form')

@section('title')
    Rekapan Update
@endsection

@section('bg-form')
    bg-date-bg
@endsection

@section('form-title')
    Ubah Tugas
@endsection

@section('content')
    @error('dateFrom')
        <div class="font-semibold text-sm text-red-500 text-center">{{ $message }}</div>
    @enderror
    @error('dateTo')
        <div class="font-semibold text-sm text-red-500 text-center">{{ $message }}</div>
    @enderror
    @error('link')
        <div class="font-semibold text-sm text-red-500 text-center">{{ $message }}</div>
    @enderror

    <form method="post" action="/member/rekapan/updating/{{ $recap->id }}" class="flex flex-col px-16 lg:px-28 xl:w-3/4 ">
        @csrf
        @method('put')
        <div class="mb-6">
            <label for="tanggal" class="text-sm lg:text-base xl:text-lg font-medium">
                Tanggal
                <input type="text" name="date" id="tanggal" placeholder="waktu rekapan" value="{{ $recap->date }}" class="p-1 rounded-md w-full focus:ring-sky-500 focus:border-sky-500" required>
            </label>
            <label for="tautan" class="text-sm lg:text-base xl:text-lg font-medium">
                Link
                <input type="url" name="link" id="tautan" placeholder="file rekapan" value="{{ $recap->link }}" class="p-1 rounded-md w-full focus:ring-sky-500 focus:border-sky-500" required>
            </label>
        </div>
        <div class="flex flex-col">
            <button type="submit" class="bg-amber-400 text-white lg:text-lg xl:text-xl p-[5px] rounded-md hover:bg-amber-300 mb-2">Ubah</button>
            <a href="/member/rekapan" class="text-center bg-dark text-white lg:text-lg xl:text-xl p-[5px] rounded-md hover:opacity-80">Batal</a>
        </div>
    </form>
@endsection