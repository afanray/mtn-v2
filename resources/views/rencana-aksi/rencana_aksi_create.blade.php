@extends('layouts.dashboard')
@section('title', 'Buat Rencana Aksi')
@section('body')

    <div class="container mt-5"
        style="background-color: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
        <h1 class="mb-4">Buat Rencana Aksi</h1>

        <form action="{{ route('imports.store') }}" method="POST" id="rencana-aksi-form">
            @csrf
            <div class="form-group">
                <label>Kode RO</label>
                <input type="text" name="kode_ro" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Rincian Output</label>
                <input type="text" name="rincian_output" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Kementerian/Lembaga</label>
                <input type="text" name="kementerian_lembaga" class="form-control" required>
            </div>

            <!-- Add Sasaran Outcome field -->
            <div class="form-group">
                <label>Arah Kebijakan</label>
                <input type="text" name="arah_kebijakan" class="form-control">
            </div>

            <!-- Add Indikator Outcome field -->
            <div class="form-group">
                <label>Fokus Pelaksanaan</label>
                <input type="text" name="fokus_pelaksanaan" class="form-control">
            </div>
            <div class="form-group">
                <label>Strategi Terobosan</label>
                <input type="text" name="strategi_terobosan" class="form-control">
            </div>



            <div class="form-group">
                <label for="bidangSelect" class="form-label">Pilih Bidang</label>
                <select name="bidang" id="bidangSelect" class="form-control mb-3" required>
                    <option value="">Pilih Bidang</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="seni-budaya">Seni Budaya</option>
                    <option value="riset-inovasi">Riset Inovasi</option>
                </select>
            </div>

            <h3>Rencana Aksi Detail</h3>
            <div id="year-data-container">
                <div class="year-data-row mb-3">
                    <div class="row">
                        <div class="col-6">
                            <label>Tahun</label>
                            <input type="number" name="tahun[]" class="form-control" min="1000" max="9999"
                                required>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-secondary toggle-details">Details</button>
                            <button type="button" class="btn btn-danger remove-row">Remove</button>
                        </div>
                    </div>
                    <div class="details" style="display: none; margin-top: 10px;">
                        <label>Target</label>
                        <input type="text" name="target[]" class="form-control">

                        <label>Capaian</label>
                        <input type="text" name="capaian[]" class="form-control">

                        <label>Alokasi Anggaran</label>
                        <input type="text" name="alokasi_anggaran[]" class="form-control">

                        <label>Realisasi Anggaran</label>
                        <input type="text" name="realisasi_anggaran[]" class="form-control">

                        <label>Tantangan Pelaksanaan</label>
                        <input type="text" name="tantangan_pelaksanaan[]" class="form-control">


                        <label>Strategi Pelaksanaan</label>
                        <input type="text" name="strategi_pelaksanaan[]" class="form-control">
                        <label>Status Pelaksanaan</label>
                        <input type="text" name="status_pelaksanaan[]" class="form-control">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-info mt-3" id="add-year-row">Tambah Capaian</button>

            <button type="submit" class="btn btn-success mt-3">Submit</button>
        </form>
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add new year data row
            $('#add-year-row').on('click', function() {
                const newRow = `
            <div class="year-data-row mb-3">
                <div class="row">
                    <div class="col-6">
                        <label>Tahun</label>
                        <input type="number" name="tahun[]" class="form-control" min="1000" max="9999" required>
                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn btn-secondary toggle-details">Details</button>
                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                    </div>
                </div>
                <div class="details" style="display: none; margin-top: 10px;">
                    <label>Target</label>
                    <input type="text" name="target[]" class="form-control">

                    <label>Capaian</label>
                    <input type="text" name="capaian[]" class="form-control">

                    <label>Alokasi Anggaran</label>
                    <input type="text" name="alokasi_anggaran[]" class="form-control">

                    <label>Realisasi Anggaran</label>
                    <input type="text" name="realisasi_anggaran[]" class="form-control">
                               <label>Tantangan Pelaksanaan</label>
                    <input type="text" name="tantangan_pelaksanaan[]" class="form-control">

                                 
                    <label>Strategi Pelaksanaan</label>
                    <input type="text" name="strategi_pelaksanaan[]" class="form-control">
                    <label>Status Pelaksanaan</label>
                    <input type="text" name="status_pelaksanaan[]" class="form-control">
                </div>
            </div>
        `;
                $('#year-data-container').append(newRow);
            });

            // Toggle details visibility
            $(document).on('click', '.toggle-details', function() {
                $(this).closest('.year-data-row').find('.details').slideToggle();
            });

            // Remove year data row
            $(document).on('click', '.remove-row', function() {
                $(this).closest('.year-data-row').remove();
            });

            // Submit form
            $('#rencana-aksi-form').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Show loading spinner
                $('#loading-spinner').show();

                // Perform AJAX form submission
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Hide the loading spinner
                        $('#loading-spinner').hide();

                        // Handle success (e.g., redirect or display a success message)
                        alert('Form submitted successfully!');
                        // Optionally redirect
                        // window.location.href = response.redirect_url; // Replace with your actual redirect URL
                    },
                    error: function(xhr, status, error) {
                        // Hide the loading spinner
                        $('#loading-spinner').hide();

                        // Handle error (e.g., show error message)
                        alert('An error occurred while submitting the form.');
                    }
                });
            });
        });
    </script>
@endsection
