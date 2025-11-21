@extends('layouts/dashboard')
@section('title', ($model->id ? 'Sunting' : 'Tambah') . ' Talenta')
@section('body')



    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ $model->id ? 'Sunting' : 'Tambah' }} Talenta</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id='add-form' class="form" action="{{ route('data-master.talenta.save') }}" method="POST"
                enctype="multipart/form-data">
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Gambar</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline " data-kt-image-input="true"
                                style="background-image: url('https://via.placeholder.com/125')"
                                id="image-input-avatar-modal">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url('{{ $model->foto_talenta ? asset('storage/talenta/' . $model->foto_talenta) : 'https://via.placeholder.com/150' }}')">
                                </div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="foto_talenta" accept=".png, .jpg, .jpeg" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Talenta</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="nama_talenta" id="nama_talenta"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Nama Talenta"
                                        value="{{ old('nama_talenta', $model->nama_talenta) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">NIK</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    {{-- <input type="text" name="nik" id="nik"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="NIK" value="{{ old('nik', $model->nik) }}" /> --}}
                                    <input type="number" name="nik" id="nik"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="NIK" value="{{ old('nik', $model->nik) }}" inputmode="numeric"
                                        pattern="[0-9]*"
                                        oninput="if(this.value.length > 16) this.value = this.value.slice(0,16)" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal Lahir</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="tgllahir" id="tgllahir"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="DD/MM/YYYY" value="{{ old('tgllahir', $model->tgl_lahir) }}" />
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Pilihan Bidang --}}
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bidang</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="bidang_id" id="bidang_id"
                                        class="form-select form-select-solid form-select-lg" aria-label="Pilih Bidang"
                                        data-placeholder="Pilih Bidang" onchange="toggleRisetFields()">
                                        <option value="">Pilih Bidang</option>
                                        @foreach ($bidang as $b)
                                            <option value="{{ $b->id }}" data-nama="{{ strtolower($b->name) }}"
                                                @selected(old('bidang_id', $model->bidang_id) == $b->id)>
                                                {{ $b->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kategori Talenta</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <select name="level_talenta_id" id="level_talenta_id"
                                        aria-label="Pilih Kategori Talenta" data-placeholder="Pilih Kategori Talenta"
                                        class="form-select form-select-solid form-select-lg">
                                        <option value="">Pilih Kategori Talenta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Asal sekolah</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="asal_sekolah" id="asal_sekolah"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Asal sekolah"
                                        value="{{ old('asal_sekolah', $relasi ? $model->{$relasi}->first()?->asal_sekolah : null) }}" />

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenis Prestasi</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <input type="text" name="jenis_prestasi" id="jenis_prestasi"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="Jenis Prestasi"
                                        value="{{ old('jenis_prestasi', $relasi ? $model->{$relasi}->first()?->jenis_prestasi : null) }}" />

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- START FORM RISET INOVASI --}}

                    <div id="form_riset_wrapper" style="display: none;">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Asal Perguruan Tinggi</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="asal_perguruan_tinggi" id="asal_perguruan_tinggi"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Asal Perguruan Tinggi"
                                            value="{{ old('asal_perguruan_tinggi', $model->detail_risnov->first()?->asal_perguruan_tinggi) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jumlah Publikasi Artikel
                                Ilmiah Pada
                                Media</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">

                                        <input type="number" name="publikasi_artikel_ilmiah_media"
                                            id="publikasi_artikel_ilmiah_media"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Jumlah Publikasi Artikel Ilmiah Pada Media"
                                            value="{{ old('publikasi_artikel_ilmiah_media', $model->detail_risnov->first()?->publikasi_artikel_ilmiah_media) }}"
                                            inputmode="numeric" pattern="[0-9]*"
                                            oninput="if(this.value.length > 20) this.value = this.value.slice(0,16)" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jumlah Publikasi Pada Peer
                                Reviewed
                                Jurnal</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">

                                        <input type="number" name="publikasi_peer_reviewed_jurnal"
                                            id="publikasi_peer_reviewed_jurnal"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Jumlah Publikasi Pada Peer Reviewed Jurnal"
                                            value="{{ old('publikasi_peer_reviewed_jurnal', $model->detail_risnov->first()?->publikasi_peer_reviewed_jurnal) }}"
                                            inputmode="numeric" pattern="[0-9]*"
                                            oninput="if(this.value.length > 20) this.value = this.value.slice(0,16)" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Afiliasi</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="afiliasi" id="afiliasi"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Afiliasi"
                                            value="{{ old('afiliasi', $model->detail_risnov->first()?->afiliasi) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Url Scopus</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="url_scopus" id="url_scopus"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Url Scopus"
                                            value="{{ old('url_scopus', $model->detail_risnov->first()?->url_scopus) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Url Google Scholar</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="url_google_scholar" id="url_google_scholar"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Url Google Scholar"
                                            value="{{ old('url_google_scholar', $model->detail_risnov->first()?->url_google_scholar) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pengalaman Menjadi Anggota
                                Kelompok
                                Riset</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="menjadi_anggota_riset" id="menjadi_anggota_riset"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Pengalaman Menjadi Anggota Kelompok Riset"
                                            value="{{ old('menjadi_anggota_riset', $model->detail_risnov->first()?->menjadi_anggota_riset) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Perolehan Hibah Penelitian
                                Nasional</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">

                                        <input type="number" name="hibah_penelitian_nasional"
                                            id="hibah_penelitian_nasional"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Perolehan Hibah Penelitian Nasional"
                                            value="{{ old('hibah_penelitian_nasional', $model->detail_risnov->first()?->hibah_penelitian_nasional) }}"
                                            inputmode="numeric" pattern="[0-9]*"
                                            oninput="if(this.value.length > 20) this.value = this.value.slice(0,16)" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Perolehan Hibah Penelitian
                                Internasional</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">

                                        <input type="number" name="hibah_penelitian_internasional"
                                            id="hibah_penelitian_internasional"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Perolehan Hibah Penelitian Internasional"
                                            value="{{ old('hibah_penelitian_internasional', $model->detail_risnov->first()?->hibah_penelitian_internasional) }}"
                                            inputmode="numeric" pattern="[0-9]*"
                                            oninput="if(this.value.length > 20) this.value = this.value.slice(0,16)" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jumlah Publikasi Pada Peer
                                Reviewed
                                Jurnal
                                Sebagai Lead Author</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">


                                        <input type="number" name="jumlah_publikasi_peer_reviewed_jurnal_lead_author"
                                            id="jumlah_publikasi_peer_reviewed_jurnal_lead_author"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Jumlah Publikasi Pada Peer Reviewed Jurnal Sebagai Lead Author"
                                            value="{{ old('jumlah_publikasi_peer_reviewed_jurnal_lead_author', $model->detail_risnov->first()?->jumlah_publikasi_peer_reviewed_jurnal_lead_author) }}"
                                            inputmode="numeric" pattern="[0-9]*"
                                            oninput="if(this.value.length > 20) this.value = this.value.slice(0,16)" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Bidang kepakaran</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="bidang_kepakaran" id="bidang_kepakaran"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Bidang kepakaran"
                                            value="{{ old('bidang_kepakaran', $model->detail_risnov->first()?->bidang_kepakaran) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Pengalaman Menjadi Pimpinan
                                Kelompok
                                Riset/R&D/Lab</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="pengalaman_pimpinan_kelompok_riset_rnd_lab"
                                            id="pengalaman_pimpinan_kelompok_riset_rnd_lab"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Pengalaman Menjadi Pimpinan Kelompok Riset/R&D/Lab"
                                            value="{{ old('pengalaman_pimpinan_kelompok_riset_rnd_lab', $model->detail_risnov->first()?->pengalaman_pimpinan_kelompok_riset_rnd_lab) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Post Doctoral</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="post_doctoral" id="post_doctoral"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Post Doctoral"
                                            value="{{ old('post_doctoral', $model->detail_risnov->first()?->post_doctoral) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Skor H-Index</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">

                                        <input type="number" name="skor_h_index" id="skor_h_index"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Skor H-Index"
                                            value="{{ old('skor_h_index', $model->detail_risnov->first()?->skor_h_index) }}"
                                            inputmode="numeric" pattern="[0-9]*"
                                            oninput="if(this.value.length > 20) this.value = this.value.slice(0,16)" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Paten (Berstatus
                                Granted)</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="number" name="jumlah_paten" id="jumlah_paten"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Jumlah Paten (Berstatus Granted)"
                                            value="{{ old('jumlah_paten', $model->detail_risnov->first()?->jumlah_paten) }}"
                                            inputmode="numeric" pattern="[0-9]*"
                                            oninput="if(this.value.length > 20) this.value = this.value.slice(0,16)" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nilai Perilaku Ilmiah,
                                Konsistensi,
                                Outcome</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="nilai_perilaku_ilmiah_konsistensi_outcome"
                                            id="nilai_perilaku_ilmiah_konsistensi_outcome"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Nilai Perilaku Ilmiah, Konsistensi, Outcome"
                                            value="{{ old('nilai_perilaku_ilmiah_konsistensi_outcome', $model->detail_risnov->first()?->nilai_perilaku_ilmiah_konsistensi_outcome) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- END FORM RISET INOVASI --}}
                    {{-- START FORM SENI BUDAYA --}}
                    <div id="form_senbud_wrapper" style="display: none;">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jenjang Pendidikan</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="jenjang_pendidikan" id="jenjang_pendidikan"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Jenjang Pendidikan"
                                            value="{{ old('jenjang_pendidikan', $model->detail_senbud->first()?->jenjang_pendidikan) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Lama Praktik Artistik</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <select name="lama_praktek_artistik" id="lama_praktek_artistik"
                                            class="form-select form-select-solid form-select-lg"
                                            data-placeholder="Pilih Lama Praktik Artistik"
                                            aria-label="Pilih Lama Praktik Artistik">
                                            <option value="">Pilih Lama Praktik Artistik</option>
                                            <option value="< 3 tahun" @selected(old('lama_praktek_artistik', $model->detail_senbud->first()?->lama_praktek_artistik) == '< 3 tahun')>
                                                &lt; 3 tahun
                                            </option>
                                            <option value="3-10 tahun" @selected(old('lama_praktek_artistik', $model->detail_senbud->first()?->lama_praktek_artistik) == '3-10 tahun')>
                                                3–10 tahun
                                            </option>
                                            <option value="10-25 tahun" @selected(old('lama_praktek_artistik', $model->detail_senbud->first()?->lama_praktek_artistik) == '10-25 tahun')>
                                                10–25 tahun
                                            </option>
                                            <option value="> 25 tahun" @selected(old('lama_praktek_artistik', $model->detail_senbud->first()?->lama_praktek_artistik) == '> 25 tahun')>
                                                &gt; 25 tahun
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Rekognisi</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">

                                        <select name="rekognisi" id="rekognisi"
                                            class="form-select form-select-solid form-select-lg"
                                            data-placeholder="Rekognisi" aria-label="Rekognisi">
                                            <option value="">Rekognisi</option>
                                            <option value="Lokal" @selected(old('rekognisi', $model->detail_senbud->first()?->rekognisi) == 'Lokal')>
                                                Lokal
                                            </option>
                                            <option value="Nasional" @selected(old('rekognisi', $model->detail_senbud->first()?->rekognisi) == 'Nasional')>
                                                Nasional
                                            </option>
                                            <option value="Regional" @selected(old('rekognisi', $model->detail_senbud->first()?->rekognisi) == 'Regional')>
                                                Regional
                                            </option>
                                            <option value="Internasional" @selected(old('rekognisi', $model->detail_senbud->first()?->rekognisi) == 'Internasional')>
                                                Internasional
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END Form Senibudaya --}}

                    {{-- START FORM OLAHRAGA --}}

                    <div id="form_olahraga_wrapper" style="display: none;">

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nomor/ Kategori</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="nomor_kategori" id="nomor_kategori"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Nomor Kategori"
                                            value="{{ old('nomor_kategori', $model->detail_olahraga->first()?->nomor_kategori) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Cabor/ IOCO</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="cabor_ioco" id="cabor_ioco"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Cabor /IOCO"
                                            value="{{ old('cabor_ioco', $model->detail_olahraga->first()?->cabor_ioco) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Jaringan Kopetensi</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <select name="jaringan_kopetensi" id="jaringan_kopetensi"
                                            class="form-select form-select-solid form-select-lg"
                                            data-placeholder="Pilih Jaringan Kompetensi"
                                            aria-label="Pilih Jaringan Kompetensi">
                                            <option value="">Pilih Jaringan Kompetensi</option>
                                            <option value="Daerah" @selected(old('jaringan_kopetensi', $model->detail_olahraga->first()?->jaringan_kopetensi) == 'Daerah')>Daerah</option>
                                            <option value="Nasional" @selected(old('jaringan_kopetensi', $model->detail_olahraga->first()?->jaringan_kopetensi) == 'Nasional')>Nasional</option>
                                            <option value="Regional" @selected(old('jaringan_kopetensi', $model->detail_olahraga->first()?->jaringan_kopetensi) == 'Regional')>Regional</option>
                                            <option value="Internasional" @selected(old('jaringan_kopetensi', $model->detail_olahraga->first()?->jaringan_kopetensi) == 'Internasional')>Internasional
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Wadah Pembinaan</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-12 fv-row">
                                        <input type="text" name="wadah_pembinaan" id="wadah_pembinaan"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Wadah Pembinaan"
                                            value="{{ old('wadah_pembinaan', $model->detail_olahraga->first()?->wadah_pembinaan) }}" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END FORM OLAHRAGA --}}

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Rekomendasi Intervensi</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-12 fv-row">
                                    <div class="col-12 fv-row">
                                        <textarea name="rekomendasi_intervensi" id="rekomendasi_intervensi"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Rekomendasi Intervensi (maksimal 500 kata)" rows="6" oninput="countWords()">{{ old('rekomendasi_intervensi', $relasi ? $model->{$relasi}->first()?->rekomendasi_intervensi : null) }}</textarea>
                                        <small id="wordCount" class="text-muted">0 / 500 kata</small>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <x-lembaga-selection lembaga-induk-name="lembaga_induk_id" lembaga-unit-name="lembaga_unit_id"
                        lembaga-name="lembaga_id" :init-lembaga-induk-id="$model->lembaga_induk_id" :init-lembaga-unit-id="$model->lembaga_unit_id" :init-lembaga-id="$model->lembaga_id"
                        :with-add="true"></x-lembaga-selection>

                    <x-address-selection province-name="province_id" regency-name="regency_id" :init-province-id="$model->province_id"
                        :init-regency-id="$model->regency_id"></x-address-selection>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{ $model->id ?? '' }}" />
                    <a href="{{ route('data-master.talenta.index') }}"
                        class="btn btn-light btn-active-light-primary me-2">Batal</a>
                    <button type="submit" class="btn btn-info me-2" id="btn-draft">Simpan</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        const isEdit = {{ $model->id ? 'true' : 'false' }};
        const levelTalenta = {{ Js::from(\App\Constants\Common::getLevelTalenta()) }};
        const bidangId = {{ $model->bidang_id ?? 'null' }};
        const levelTalentaId = {{ $model->level_talenta_id ?? 'null' }};
        KTUtil.onDOMContentLoaded(function() {
            const form = document.querySelector('#add-form');
            var validator = FormValidation.formValidation(
                form, {
                    fields: {
                        foto_talenta: {
                            validators: {
                                file: {
                                    extension: 'jpeg,jpg,png',
                                    type: 'image/jpeg,image/png',
                                    maxSize: 2097152, // 2048 * 1024
                                    message: 'format Foto Talenta tidak valid',
                                },
                            },
                        },
                        'nama_talenta': {
                            validators: {
                                notEmpty: {
                                    message: 'Nama Talenta is required'
                                },
                            }
                        },
                        'nik': {
                            validators: {
                                notEmpty: {
                                    message: 'NIK is required'
                                },
                            }
                        },
                        'tgllahir': {
                            validators: {
                                notEmpty: {
                                    message: 'Tanggal lahir is required'
                                },
                            }
                        },
                        'bidang_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Bidang is required'
                                },
                            }
                        },
                        'level_talenta_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Level talenta is required'
                                },
                            }
                        },

                        'lembaga_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Direktorat/Jurusan is required'
                                },
                            }
                        },
                        'lembaga_induk_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Lembaga Induk is required'
                                },
                            }
                        },
                        'lembaga_unit_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Pusat/Unit/Fakultas is required'
                                },
                            }
                        },
                        'province_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Province is required'
                                },
                            }
                        },
                        'regency_id': {
                            validators: {
                                notEmpty: {
                                    message: 'Regency is required'
                                },
                            }
                        },
                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton({}),
                        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                });
            if (bidangId !== null) {
                $('#level_talenta_id').empty().append('<option>Pilih Kategori Talenta</option>');
                const levels = getListLevelTalenta(bidangId);
                levels.forEach(function(l) {
                    $('#level_talenta_id').append(
                        `<option value="${l.id}" ${levelTalentaId == l.id ? 'selected' : ''}>${l.name}</option>`
                    );
                })
            }
            $('#bidang_id').on('change', function() {
                $('#level_talenta_id').empty().append('<option>Pilih Kategori Talenta</option>');
                if ($(this).val() != '') {
                    const levels = getListLevelTalenta(Number($(this).val()));
                    levels.forEach(function(l) {
                        $('#level_talenta_id').append(`<option value="${l.id}">${l.name}</option>`);
                    })
                }
            });
        });

        function getListLevelTalenta(bidangId = null) {
            if (bidangId) {
                return levelTalenta.filter(function(l) {
                    return l.bidang_id == bidangId;
                })
            }
            return [];
        }

        function countWords() {
            const textarea = document.getElementById('rekomendasi_intervensi');
            const wordCountDisplay = document.getElementById('wordCount');

            // Hitung jumlah kata
            let words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);
            let count = words.length;

            // Batasi maksimal 500 kata
            if (count > 500) {
                textarea.value = words.slice(0, 500).join(" ");
                count = 500;
            }

            wordCountDisplay.textContent = `${count} / 500 kata`;
        }


        function toggleRisetFields() {
            const bidangSelect = document.getElementById('bidang_id');
            const selectedOption = bidangSelect.options[bidangSelect.selectedIndex];
            const selectedValue = bidangSelect.value;
            const selectedName = selectedOption.getAttribute('data-nama');
            const wrappers = {
                '1': 'form_riset_wrapper',
                '2': 'form_senbud_wrapper',
                '3': 'form_olahraga_wrapper'
            };

            // Sembunyikan semua wrapper
            Object.values(wrappers).forEach(id => document.getElementById(id).style.display = 'none');

            // Tampilkan wrapper sesuai bidang
            if (wrappers[selectedValue]) {
                document.getElementById(wrappers[selectedValue]).style.display = 'block';
            } else if (selectedName === 'riset dan inovasi') {
                document.getElementById('form_riset_wrapper').style.display = 'block';
            }
        }

        // Jalankan saat halaman dimuat agar menghitung otomatis jika ada nilai lama
        document.addEventListener('DOMContentLoaded', toggleRisetFields, countWords, );
    </script>
@endsection
