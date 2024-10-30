<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('berita-kegiatan.index',['activeMenu' => 'bk']);
    }

/**
     * Show the form for creating a new resource.
     */
    public function data()
    {
        $user = Auth::user();
        $data = News::query()
                ->with('user')
                ->orderBy('created_at', 'desc');
                if ($user->role !== 'superadmin') {
                    $data->where('user_id', '=', $user->id);
                };
    $dataTable = DataTables::of($data)->toJson();
    return response()->json($dataTable->getData());
    }


    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $model = new News();
        return view('berita-kegiatan.form', [
        'activeMenu' => 'bk',
        'model' => $model,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @dd(request()->all());
        $user = Auth::user();

        // Cek apakah ini untuk update atau create
        $model = $request->input('id') ? News::find($request->input('id')) : new News();

        $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'category' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // validasi file gambar
            ]);

          // Assign input ke model
        $model->title = $request->input('title');
        $model->slug = Str::slug($request->input('title'), '-'); 
        $model->content = $request->input('content');
        $model->category = $request->input('category');
        $model->published = $request->has('publish') ? 1 : 0;
        $model->user_id = $user->id;

        // Jika ada file foto_penghargaan baru
        if ($request->file('image')) {
            // Hapus file lama jika ada
            if ($model->image && Storage::exists('public/berita_kegiatan/' . $model->image)) {
                Storage::delete('public/berita_kegiatan/' . $model->image);
            }

            // Simpan file baru
            $fileName = $request->file('image')->store('public/berita_kegiatan');
            $model->image = basename($fileName);
        }

        // Set updated_by jika update
        if ($request->input('id')) {
            $model->updated_by = $user->id;
        }

        // Simpan model
        $model->save();

        // Redirect dengan pesan sukses
        $message = $request->input('id') ? 'Sunting' : 'Tambah';
        return redirect()->route('berita-kegiatan.index')->with('alert-success', $message . ' Data Berhasil');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $model = News::find($id);
    return view('berita-kegiatan.show', [
      'activeMenu' => 'berita-kegiatan',
      'model' => $model,
    ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $model = News::find($id);
    return view('berita-kegiatan.form', [
      'activeMenu' => 'bk',
      'model' => $model
    ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) : JsonResponse
    {
        $model = News::find($id);
        if (!$model) {
                return response()->json(['error' => 'Berita tidak ditemukan'], 404);
            }
        if ($model->image) {
            $filePath = 'berita_kegiatan/' . $model->image;
            Storage::disk('public')->delete($filePath);
        }
        $model->delete();
        return response()->json([]);
  
    }
}
