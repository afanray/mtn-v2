@extends('layouts.dashboard')

@section('title', 'Dashboard Rencana Aksi')

@section('css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencana Aksi MTN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom card hover effect */
        .card:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        /* Scrollable table container */
        .table-container {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ccc;
        }

        /* Navbar styles */
        .navbar {
            margin-bottom: 20px;
        }

        /* Table Styling */
        .table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            width: 80px;
            text-align: center;
            /* Center the text */
        }


        .table td {
            border-top: 1px solid #ddd;
            text-align: center;
        }

        /* Row hover effect */
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Alternate row coloring */
        .table tbody tr:nth-child(odd) {
            background-color: #fafafa;
        }

        /* Table container and overflow */
        .table-container {
            max-height: 500px;
            overflow-y: auto;
        }

        /* DataTable search input styling */
        .dataTables_filter input {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 8px;
            width: 250px;
        }

        /* Styling DataTable Pagination */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 5px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            background-color: #003d7a;
        }

        /* Styling the table header */
        .dataTables_wrapper .dataTables_header th {
            background-color: #007bff;
            color: white;
            text-align: left;
        }

        /* Modal styling */
        .modal-content {
            border-radius: 10px;
        }
    </style>
@endsection

@section('body')
    <div class="container mt-5">
        <h1 class="text-center">Rencana Aksi MTN</h1>

        <!-- Card Row -->
        <div class="row my-4">
            @foreach ([['title' => 'Total RO', 'value' => $totalRO], ['title' => 'RO Riset dan Inovasi', 'value' => $roRisetInovasi], ['title' => 'RO Seni Budaya', 'value' => $roSeniBudaya], ['title' => 'RO Olahraga', 'value' => $roOlahraga]] as $card)
                <div class="col-md-3">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card['title'] }}</h5>
                            <p class="card-text display-4">{{ $card['value'] }}</p>
                            <p>Rincian Output</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <!-- Matriks Renaksi -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Matriks Renaksi</h3>

            <a href="{{ route('imports.create') }}" class="btn btn-primary">Tambah RO</a>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <table id="rencanaAksiTable" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode RO</th>
                        <th>Rincian Output</th>
                        <th>Kementerian/Lembaga</th>
                        <th>Bidang</th>
                        <th>Arah Kebijakan</th>
                        <th>Fokus Pelaksanaan</th>
                        <th>Strategi Terobosan</th>
                        <th>Operator</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rencanaAksi as $item)
                        <tr
                            onclick="window.location.href='/dashboard/data-master/imports?tahun=2024&rencana_aksi_id={{ $item->id }}'">

                            <td>{{ ($rencanaAksi->currentPage() - 1) * $rencanaAksi->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->kode_ro }}</td>
                            <td>{{ $item->rincian_output }}</td>
                            <td>{{ $item->kementerian_lembaga }}</td>
                            <td>{{ $item->bidang }}</td>
                            <td>{{ $item->arah_kebijakan }}</td>
                            <td>{{ $item->fokus_pelaksanaan }}</td>
                            <td>{{ $item->strategi_terobosan }}</td>
                            <td>{{ $item->operator }}</td>
                        </tr>


                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No data available for the selected criteria.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $rencanaAksi->links() }}
            </div>
        </div>
    </div>

    <!-- Add RO Modal -->
    <div class="modal fade" id="addRoModal" tabindex="-1" aria-labelledby="addRoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoModalLabel">Tambah RO Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="mb-3">
                            <label for="kodeRO" class="form-label">Kode RO</label>
                            <input type="text" class="form-control" id="kodeRO" name="kode_ro"
                                placeholder="Masukkan Kode RO" required>
                        </div>
                        <div class="mb-3">
                            <label for="rincianOutput" class="form-label">Rincian Output</label>
                            <textarea class="form-control" id="rincianOutput" name="rincian_output" rows="3" placeholder="Deskripsi Output"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
