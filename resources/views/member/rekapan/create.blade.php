@extends('layouts.components.form')

@section('title')
    Rekapan Create
@endsection

@section('bg-form')
    bg-date-bg
@endsection

@section('form-title')
    Tambah Tugas
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
    
    <form method="post" action="/member/rekapan/creating" class="flex flex-col px-16 lg:px-28 xl:w-3/4 ">
        @csrf
        <div class="mb-6 flex flex-col">
            <label for="tanggal" class="flex flex-col text-sm lg:text-base xl:text-lg font-medium">
                Tanggal
                <div class="w-full flex items-center mb-2">
                    <input type="date" name="dateFrom" id="tanggal" class="p-1 rounded-md w-full border-none focus:ring-sky-500 focus:ring-2" required>
                    <span class="ml-4 font-semibold">hingga</span>
                </div>
                <input type="date" name="dateTo" id="tanggal" class="p-1 rounded-md w-full border-none focus:ring-sky-500 focus:ring-2" required>
            </label>
            <label for="link" class="text-sm lg:text-base xl:text-lg font-medium">
                Link
                <input type="url" name="link" id="link" placeholder="file rekapan" class="p-1 rounded-md w-full border-none focus:ring-sky-500 focus:ring-2" required>
            </label>
        </div>
        <div class="flex flex-col">
            <button type="submit" class="bg-sky-500 text-white lg:text-lg xl:text-xl p-[5px] rounded-md hover:opacity-80 mb-2">Tambah</button>
            <a href="/member/rekapan" class="text-center bg-dark text-white lg:text-lg xl:text-xl p-[5px] rounded-md hover:opacity-80">Batal</a>
        </div>
    </form>
@endsection