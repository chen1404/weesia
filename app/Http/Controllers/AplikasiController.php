<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AplikasiController extends Controller
{
    public function createForm() {
        return view('member.aplikasi.create');
    }

    public function updateForm(Aplikasi $id) {
        return view('member.aplikasi.update', [
            'application' => $id,
        ]);
    }

    public function readAplikasi() {
        $applications = DB::table('applications')->get()->sortByDesc('version');

        return view('member.aplikasi', [
            'applications' => $applications,
        ]);
    }

    public function createAplikasi(Request $request) {
        $request->validate([
            "name" => 'required|string|min:3',
            "version" => 'required|string',
            "link" => 'required|string',
            "category" => 'required|string',
        ]);

        $category = $request->get('category');
        if ($category == 'Line') {
            $request['name'] = 'LINE';
            $filename = "line-logo.png";
        } else {
            $slug = Str::slug($request->get('name'), '-');
            $randstr = Str::random(5);
            $file = $request->file('image');
            $filename = $slug . '-' . $randstr . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo/aplikasi'), $filename);
        }

        $aplikasi = new Aplikasi([
            "name" => $request->get('name'),
            "version" => $request->get('version'),
            "image" => $filename,
            'link' => $request->get('link'),
            'category' => $request->get('category'),
        ]);
        $aplikasi->save();

        return redirect("/member/aplikasi#$category");
    }

    public function updateAplikasi(Request $request, $id) {
        $application = Aplikasi::findOrFail($id);
        
        $category = $request->get('category');
        if($category == 'Line') {
            $request['name'] = 'LINE';
            $application->update(['image' => 'line-logo.png']);
        }

        if($request->hasFile('image') && $category != 'Line') {
            $slug = Str::slug($request->get('name'), '-');
            $randstr = Str::random(5);
            $file = $request->file('image');
            $filename = $slug . '-' . $randstr . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo/aplikasi'), $filename);
            $application->update(['image' => $filename]);
        }

        $validateData = $request->validate([
            "name" => 'required|string',
            "version" => 'required|string',
            "link" => 'required|string',
            "category" => 'required|string',
        ]);
        $application->update($validateData);
        
        return redirect("/member/aplikasi#$category");
    }

    public function deleteAplikasi($id) {
        $application = Aplikasi::findOrFail($id);
        $application->delete();
        
        return redirect('/member/aplikasi#aplikasi')->with('success', 'Aplikasi berhasil dihapus!');
    }
}
