<?php

namespace App\Http\Controllers\DataMaster;

use App\Models\Populations;
use App\Models\SinergiData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PopulationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

   public function syncPopulasi($id)
    {
        // Mencari data sinergi berdasarkan ID
        $sinergi = SinergiData::find($id);
        if (!$sinergi) {
            return response()->json(['error' => 'Data sinergi tidak ditemukan.'], 404);
        }

        // Menyusun URL untuk panggilan API
        $method =$sinergi->method;
        $url = $sinergi->base_url . $sinergi->key;  
        $response = Http::$method($url);  
        $data = $response->json();

        // Validasi struktur data yang diterima
        if (!isset($data['tahun'], $data['datacontent'], $data['vervar'], $data['var'])) {
            return response()->json(['error' => 'Invalid data structure from API.'], 400);
        }

        // Menggunakan transaksi untuk keamanan data
        DB::transaction(function () use ($data, $id, $sinergi) {
            foreach ($data['tahun'] as $tahun) {
                $key = $data['vervar'][0]['val'] . $data['var'][0]['val'] . '0' . $tahun['val'] . '0';
                if (array_key_exists($key, $data['datacontent'])) {
                    $jumlah = $data['datacontent'][$key];

                 // Memastikan tahun unik untuk updateOrCreate
                Populations::updateOrCreate(
                    [
                        'sinergi_data_id' => $id,
                        'tahun' => $tahun['label'] // Menambahkan tahun sebagai syarat pencarian
                    ],
                    [
                        'jumlah' => $jumlah // Mengupdate atau membuat jumlah
                    ]
                );
                } else {
                    Log::warning("Key $key tidak ditemukan dalam datacontent.");
                }
            }

            $sinergi->last_sinkron = now(); 
            $sinergi->save();
            });

            // return redirect()->back()->with('alert-success', 'Sinkronisasi Data Berhasil');

        return response()->json(['alert-success' => 'Population data fetched and stored successfully.']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store($url, $key)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Populations $populations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Populations $populations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Populations $populations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
          $model = Populations::find($id);
            if (!$model) {
                    return response()->json(['error' => 'Talenta tidak ditemukan'], 404);
                }
            $model->delete();
            return response()->json([]);
    }

    public function resetPopulation(int $id)
    {
            $model = Populations::query('sinergi_data_id', $id);
            if (!$model) {
                return response()->json(['error' => 'Talenta tidak ditemukan'], 404);
            }
            $model->delete();
            return response()->json([]);
    }
}
