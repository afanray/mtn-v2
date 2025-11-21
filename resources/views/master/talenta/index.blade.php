@extends('layouts/dashboard')
@section('title', 'Manajemen Master Talenta')
@section('body')
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header card-header-stretch">
            <h3 class="card-title">Daftar Talenta</h3>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0" id="talenta-tab" role="tablist">
                    <li class="nav-item p-10" role="presentation">
                        <button class="nav-link active" id="talenta-1-tab" data-toggle="tab" type="button" role="tab"
                            onclick="showTahapanSasaranMtn(event, 'talenta-tab-1')" aria-controls="talenta-1"
                            aria-selected="true">Bidang Riset & Inovasi</button>
                    </li>
                    <li class="nav-item p-10" role="presentation">
                        <button class="nav-link" id="talenta-2-tab" data-toggle="tab" type="button" role="tab"
                            onclick="showTahapanSasaranMtn(event, 'talenta-tab-2')" aria-controls="talenta-2"
                            aria-selected="false">Bidang Seni Budaya</button>
                    </li>
                    <li class="nav-item p-10" role="presentation">
                        <button class="nav-link" id="talenta-3-tab" data-toggle="tab" type="button" role="tab"
                            onclick="showTahapanSasaranMtn(event, 'talenta-tab-3')" aria-controls="talenta-3"
                            aria-selected="false">Bidang Olahraga</button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title w-100">
                <div class="d-flex justify-content-lg-between flex-column flex-lg-row w-100">
                    <h3 class="card-title" id="bidang">Bidang Riset & Inovasi</h3>
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <input id="search" type="text" data-kt-customer-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15 me-3" placeholder="Cari" />
                        <a href="{{ route('data-master.talenta.add') }}" class="btn btn-primary me-4">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </div>
                    <!--end::Search-->
                </div>
            </div>
        </div>

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_user_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-20px">No.</th>
                        <th class="min-w-125px">Talenta ID</th>
                        <th class="min-w-125px">Nama Talenta</th>
                        <th class="min-w-125px">NIK</th>
                        <th class="min-w-125px">Bidang</th>
                        <th class="min-w-125px">Tahapan</th>
                        <th class="min-w-125px">Asal Sekolah</th>
                        <th class="min-w-125px">Jenis Prestasi</th>
                        <th class="min-w-125px">Jenis Prestasi1</th>
                        <th class="min-w-125px">Jenis Prestasi2</th>
                        <th class="min-w-125px">Jenis Prestasi3</th>
                        <th class="min-w-125px">Jenis Prestasi4</th>
                        <th class="min-w-125px">Jenis Prestasi5</th>
                        <th class="min-w-125px">Jenis Prestasi6</th>
                        <th class="min-w-125px">Jenis Prestasi7</th>
                        <th class="min-w-125px">Jenis Prestasi8</th>
                        <th class="min-w-125px">Jenis Prestasi9</th>
                        <th class="min-w-125px">Jenis Prestasi10</th>
                        <th class="min-w-125px">Jenis Prestasi11</th>
                        <th class="min-w-125px">Jenis Prestasi12</th>
                        <th class="min-w-125px">Jenis Prestasi13</th>
                        <th class="min-w-125px">Jenis Prestasi14</th>
                        <th class="min-w-125px">Jenis Prestasi15</th>
                        <th class="min-w-125px">Jenis Prestasi16</th>
                        <th class="min-w-125px">Rekomendasi Intervensi</th>
                        <th class="min-w-125px">Lembaga Induk</th>
                        <th class="min-w-125px">Pusat/Unit/Fakultas</th>
                        <th class="min-w-125px">Direktorat/Jurusan</th>
                        <th class="min-w-125px">Dibuat Pada</th>
                        <th class="text-end min-w-70px">Aksi</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600"></tbody>
            </table>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
@endsection

@section('js')
    <script type="text/javascript">
        const blockUI = new KTBlockUI(document.getElementById('kt_app_content_container'), {
            message: 'hapus data...',
        });

        let bidangId = 1;
        let table;

        // [ADD] debounce util untuk hemat request server saat mengetik
        function debounce(fn, wait = 400) {
            let t;
            return function(...args) {
                clearTimeout(t);
                t = setTimeout(() => fn.apply(this, args), wait);
            };
        }


        $(document).ready(function() {
            // Tombol hapus
            $('body').on('click', '.delete-row', function() {
                const id = $(this).attr('id');
                Swal.fire({
                    title: 'Hapus Talenta',
                    text: 'Anda yakin akan menghapus data ini?',
                    icon: 'warning',
                    buttonsStyling: false,
                    confirmButtonText: 'Hapus',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-light',
                    },
                }).then(function(result) {
                    if (result.value) {
                        blockUI.block();
                        $.ajax({
                            url: '/dashboard/data-master/talenta/delete/' + id,
                            type: 'GET',
                            success: function(res) {
                                blockUI.release();
                                table.draw();
                                Swal.fire({
                                    title: 'Hapus Data',
                                    text: 'Hapus Data Berhasil',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                            },
                            error: function(request, status, error) {
                                Swal.fire('Something Wrong. Please try Again', '',
                                    'error');
                            },
                        });
                    }
                });
            });
            // initTable(bidangId);

            $(window).on('load', function() {
                initTable(bidangId);
            });

            $('#search').on('keyup', function() {
                table.search($('#search').val()).draw();
            });
        });

        function initTable(bidangId) {
            if (table) {
                table.clear().destroy();
                $('#kt_user_table thead').empty();
                $('#kt_user_table tbody').empty();
            }
            const columns = defineColumn(bidangId);

            // [UPDATE] header jadi 2 baris: judul + filter
            // let headerTitle = '<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">';
            // let headerFilter = '<tr class="filter-row">';



            let headerHtml = '<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">';
            columns.forEach(col => {
                headerHtml += `<th class="min-w-125px">${col.title}</th>`;
            });
            headerHtml += '</tr>';
            $('#kt_user_table thead').html(headerHtml);

            // columns.forEach((col, idx) => {
            //     headerTitle += `<th class="min-w-125px">${col.title || ''}</th>`;
            //     if (col.searchable === false) {
            //         headerFilter += `<th></th>`;
            //     } else {
            //         headerFilter += `
        //         <th>
        //             <input type="text" class="form-control form-control-sm column-filter" 
        //                    placeholder="Filter ${col.title || ''}" 
        //                    data-col-index="${idx}" />
        //         </th>`;
            //     }
            // });

            // headerTitle += '</tr>';
            // headerFilter += '</tr>';
            // $('#kt_user_table thead').html(headerTitle + headerFilter);



            table = $('#kt_user_table').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                orderCellsTop: true,
                ajax: {
                    url: `/dashboard/data-master/talenta/data/${bidangId}`,
                    type: 'GET',
                },

                columns: columns,
                language: {
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Menampilkan 0 sampai 0 dari 0 data',
                    loadingRecords: 'Memuat data...',
                },
                // [ADD] binding filter per kolom setelah table siap
                // initComplete: function() {
                //     const api = this.api();
                //     $('.column-filter').on('keyup change', debounce(function() {
                //         const colIdx = $(this).data('col-index');
                //         api.column(colIdx).search(this.value || '').draw();
                //     }, 400));
                // }
            });
        }

        function defineColumn(bidangId) {
            const id = parseInt(bidangId);
            const baseColumns = [{
                    data: 'id',
                    title: 'No.'
                },
                {
                    data: 'kode_talenta',
                    title: 'TALENTA ID'
                },
                {
                    data: 'nama_talenta',
                    title: 'Nama Talenta',
                    sortable: true,
                },
                {
                    data: 'nik',
                    title: 'NIK',
                    sortable: true
                },
                {
                    data: 'bidang.name',
                    title: 'Bidang',
                    sortable: true
                },
                {
                    data: 'level_talenta.name',
                    title: 'Tahapan',
                    sortable: false
                },
            ];
            const renderDetail = (data, field) => {
                if (!Array.isArray(data) || data.length === 0) return '-';
                return data[0]?.[field] ?? '-';
            };

            // bidang 1(RISNOV)
            if (id === 1) {
                baseColumns.push({
                    data: 'detail_risnov',
                    title: 'Asal Sekolah',
                    sortable: true,
                    render: (d) => renderDetail(d, 'asal_sekolah')
                }, {
                    data: 'detail_risnov',
                    title: 'Jenis Prestasi',
                    sortable: false,
                    render: (d) => renderDetail(d, 'jenis_prestasi')
                }, {
                    data: 'detail_risnov',
                    title: 'Asal Perguruan Tinggi',
                    sortable: false,
                    render: (d) => renderDetail(d, 'asal_perguruan_tinggi')
                }, {
                    data: 'detail_risnov',
                    title: 'Publikasi Artikel Ilmiah Media',
                    sortable: false,
                    render: (d) => renderDetail(d, 'publikasi_artikel_ilmiah_media')
                }, {
                    data: 'detail_risnov',
                    title: 'Publikasi Peer Reviewed Jurnal',
                    sortable: false,
                    render: (d) => renderDetail(d, 'publikasi_peer_reviewed_jurnal')
                }, {
                    data: 'detail_risnov',
                    title: 'Afiliasi',
                    sortable: false,
                    render: (d) => renderDetail(d, 'afiliasi')
                }, {
                    data: 'detail_risnov',
                    title: 'Url Scopus',
                    sortable: false,
                    render: (d) => renderDetail(d, 'url_scopus')
                }, {
                    data: 'detail_risnov',
                    title: 'Url Google Scholar',
                    sortable: false,
                    render: (d) => renderDetail(d, 'url_google_scholar')
                }, {
                    data: 'detail_risnov',
                    title: 'Pengalamanan Menjadi Anggota Riset',
                    sortable: false,
                    render: (d) => renderDetail(d, 'menjadi_anggota_riset')
                }, {
                    data: 'detail_risnov',
                    title: 'Hibah Penelitian Nasional',
                    sortable: false,
                    render: (d) => renderDetail(d, 'hibah_penelitian_nasional')
                }, {
                    data: 'detail_risnov',
                    title: 'Hibah Penelitian Internasional',
                    sortable: false,
                    render: (d) => renderDetail(d, 'hibah_penelitian_internasional')
                }, {
                    data: 'detail_risnov',
                    title: 'Jumlah Publikasi Peer Reviewed Jurnal Lead Author',
                    sortable: false,
                    render: (d) => renderDetail(d, 'jumlah_publikasi_peer_reviewed_jurnal_lead_author')
                }, {
                    data: 'detail_risnov',
                    title: 'Bidang Kepakaran',
                    sortable: false,
                    render: (d) => renderDetail(d, 'bidang_kepakaran')
                }, {
                    data: 'detail_risnov',
                    title: 'Pengalaman Pimpinan Kelompok Riset/R&D/Lab',
                    sortable: false,
                    render: (d) => renderDetail(d, 'pengalaman_pimpinan_kelompok_riset_rnd_lab')
                }, {
                    data: 'detail_risnov',
                    title: 'post doctoral',
                    sortable: false,
                    render: (d) => renderDetail(d, 'post_doctoral')
                }, {
                    data: 'detail_risnov',
                    title: 'Skor H-index',
                    sortable: false,
                    render: (d) => renderDetail(d, 'skor_h_index')
                }, {
                    data: 'detail_risnov',
                    title: 'Jumlah Paten',
                    sortable: false,
                    render: (d) => renderDetail(d, 'jumlah_paten')
                }, {
                    data: 'detail_risnov',
                    title: 'Nilai Perilaku Ilmiah Konsistensi Outcome',
                    sortable: false,
                    render: (d) => renderDetail(d, 'nilai_perilaku_ilmiah_konsistensi_outcome')
                }, {
                    data: 'detail_risnov',
                    title: 'Rekomendasi Intervensi',
                    sortable: false,
                    render: (d) => renderDetail(d, 'rekomendasi_intervensi')
                });
            }

            // bidang 2 (Seni Budaya)
            if (id === 2) {
                baseColumns.push({
                    data: 'detail_senbud',
                    title: 'Asal Sekolah',
                    sortable: true,
                    render: (d) => renderDetail(d, 'asal_sekolah')
                }, {
                    data: 'detail_senbud',
                    title: 'Jenis Prestasi',
                    sortable: false,
                    render: (d) => renderDetail(d, 'jenis_prestasi')
                }, {
                    data: 'detail_senbud',
                    title: 'Jenjang Pendidikan',
                    sortable: false,
                    render: (d) => renderDetail(d, 'jenjang_pendidikan')
                }, {
                    data: 'detail_senbud',
                    title: 'Lama Praktik Artistik',
                    sortable: false,
                    render: (d) => renderDetail(d, 'lama_praktek_artistik')
                }, {
                    data: 'detail_senbud',
                    title: 'Rekognisi',
                    sortable: false,
                    render: (d) => renderDetail(d, 'rekognisi')
                }, {
                    data: 'detail_senbud',
                    title: 'Rekomendasi Intervensi',
                    sortable: false,
                    render: (d) => renderDetail(d, 'rekomendasi_intervensi')
                });
            }

            // bidang 3 (Olahraga)
            if (id === 3) {
                baseColumns.push({
                        data: 'detail_olahraga',
                        title: 'Asal Sekolah',
                        sortable: true,
                        render: (d) => renderDetail(d, 'asal_sekolah')
                    }, {
                        data: 'detail_olahraga',
                        title: 'Jenis Prestasi',
                        sortable: false,
                        render: (d) => renderDetail(d, 'jenis_prestasi')
                    },

                    {
                        data: 'detail_olahraga',
                        title: 'Nomor/Kategori',
                        sortable: false,
                        render: (d) => renderDetail(d, 'nomor_kategori')
                    },

                    {
                        data: 'detail_olahraga',
                        title: 'Cabor/ IOCO',
                        sortable: false,
                        render: (d) => renderDetail(d, 'cabor_ioco')
                    },

                    {
                        data: 'detail_olahraga',
                        title: 'Jaringan Kopetensi',
                        sortable: false,
                        render: (d) => renderDetail(d, 'jaringan_kopetensi')
                    },

                    {
                        data: 'detail_olahraga',
                        title: 'Wadah Pembinaan',
                        sortable: false,
                        render: (d) => renderDetail(d, 'wadah_pembinaan')
                    },

                    {
                        data: 'detail_olahraga',
                        title: 'Rekomendasi Intervensi',
                        sortable: false,
                        render: (d) => renderDetail(d, 'rekomendasi_intervensi')
                    });
            }

            // kolom umum di bagian bawah
            baseColumns.push({
                data: 'lembaga_induk.name',
                title: 'Lembaga Induk',
                sortable: true
            }, {
                data: 'lembaga_unit.name',
                title: 'Pusat/Unit/Fakultas',
                sortable: true
            }, {
                data: 'lembaga.name',
                title: 'Direktorat/Jurusan',
                sortable: true
            }, {
                data: 'created_at',
                title: 'Dibuat Pada',
                sortable: true,
                render: (d) => (d ? moment(d).format('DD-MM-YYYY HH:mm:ss') : '-')
            }, {
                data: 'id',
                title: 'Aksi',
                sortable: false,
                className: 'text-center',
                render: (data, type, row) => `
                <a href="/dashboard/data-master/talenta/show/${row.id}" class="edit-row me-3">
                    <i class="fa fa-circle-info"></i>
                </a>
                <a href="/dashboard/data-master/talenta/edit/${row.id}" class="edit-row me-3">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                <a href="#" id="${row.id}" class="delete-row">
                    <i class="fa fa-trash"></i>
                </a>
            `,
            });

            return baseColumns;
        }

        function showTahapanSasaranMtn(evt, tabName) {
            let bidang = (tabName === "talenta-tab-1") ? "Riset dan Inovasi" :
                (tabName === "talenta-tab-2") ? "Seni Budaya" : "Olahraga";
            bidangId = (bidang === "Riset dan Inovasi") ? "1" :
                (bidang === "Seni Budaya") ? "2" : "3";

            document.getElementById('bidang').innerText = 'Bidang ' + bidang;
            initTable(bidangId);

            const tabLinks = document.querySelectorAll('.nav-link');
            tabLinks.forEach(link => link.classList.remove('active'));
            evt.currentTarget.classList.add('active');
        }
    </script>

@endsection
