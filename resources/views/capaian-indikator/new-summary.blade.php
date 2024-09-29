@extends('layouts/dashboard')
@section('title', 'Ringkasan Talenta')
@section('body')
    <section class="services-section-three bg-lighter pt-50 rel z-1 bg-white">
        <div class="card ">
            <div class="card-header card-header-stretch">
                <h3 class="card-title">Ringkasan Jumlah Talenta</h3>
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0" id="talenta-tab" role="tablist">
                        <li class="nav-item p-10" role="presentation" onclick="showTahapanSasaranMtn(event, 'talenta-tab-1')">
                            <button class="nav-link" id="talenta-1-tab" data-toggle="tab" data-target="#talenta-1"
                                type="button" role="tab" aria-controls="talenta-1" aria-selected="false">Bidang Riset &
                                Inovasi</button>
                        </li>
                        <li class="nav-item p-10" role="presentation"
                            onclick="showTahapanSasaranMtn(event, 'talenta-tab-2')">
                            <button class="nav-link " id="talenta-2-tab" data-toggle="tab" data-target="#talenta-2"
                                type="button" role="tab" aria-controls="talenta-2" aria-selected="false">Bidang Seni
                                Budaya</button>
                        </li>
                        <li class="nav-item p-10" role="presentation"
                            onclick="showTahapanSasaranMtn(event, 'talenta-tab-3')">
                            <button class="nav-link " id="talenta-3-tab" data-toggle="tab" data-target="#talenta-3"
                                type="button" role="tab" aria-controls="talenta-3" aria-selected="false">Bidang
                                Olahraga</button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tab Riset Inovasi -->
            <div class="tab-content m-10" id="talenta-tab-1">
                <div class="tab-pane fade show active" id="talenta-1" role="tabpanel" aria-labelledby="talenta-1-tab">
                    <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50 wow fadeInUp delay-0-2s">
                        <div class="container">
                            <div class="row" id="talenta-tab-1-details">
                                <!-- Content for Riset & Inovasi goes here -->
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <!-- End Tab Riset Inovasi -->

            <!-- Tab Seni Budaya -->
            <div class="tab-content m-10" id="talenta-tab-2">
                <div class="tab-pane fade show active" id="talenta-2" role="tabpanel" aria-labelledby="talenta-2-tab">
                    <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50">
                        <div class="container">
                            <div class="row" id="talenta-tab-2-details">
                                <!-- Content for Seni Budaya goes here -->
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <!-- End Tab Seni Budaya -->

            <!-- Tab Olahraga -->
            <div class="tab-content  m-10" id="talenta-tab-3">
                <div class="tab-pane fade show active" id="talenta-3" role="tabpanel" aria-labelledby="talenta-3-tab">
                    <ul class="nav solutions-tab-nav nav-pills flex-xl-column nav-fill mb-50">
                        <div class="container">
                            <div class="row" id="talenta-tab-3-details">
                                <!-- Content for Olahraga goes here -->
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <!-- End Tab Olahraga -->
        </div>
    </section>

@endsection
@section('js')

    <script>
        // Mendapatkan base URL dari halaman saat ini
        const baseUrl = `${window.location.protocol}//${window.location.host}/`;

        document.addEventListener('DOMContentLoaded', function() {
            // Simulasikan klik pada tab default saat halaman dimuat
            const defaultTab = document.querySelector('#talenta-1-tab');
            if (defaultTab) {
                showTahapanSasaranMtn({
                    currentTarget: defaultTab
                }, 'talenta-tab-1');
            }
        });

        function showTahapanSasaranMtn(evt, tabName) {
            // Dapatkan semua elemen dengan class="tab-content" dan sembunyikan
            const tabContent = document.getElementsByClassName('tab-content');
            let bidang = (tabName === "talenta-tab-1") ?
                "Riset dan Inovasi" :
                (tabName === "talenta-tab-2") ?
                "Seni Budaya" :
                "Olahraga";

            for (let i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = 'none';
            }

            // Hapus class "active" dari semua elemen tablinks
            const tabLinks = document.getElementsByClassName('nav-link');
            for (let i = 0; i < tabLinks.length; i++) {
                tabLinks[i].classList.remove('active');
            }

            // Tampilkan tab yang dipilih dan tambahkan class "active" ke tombol yang dipilih
            document.getElementById(tabName).style.display = 'block';
            event.currentTarget.querySelector('.nav-link').classList.add('active');

            // Panggil fungsi untuk mengambil data dari API
            fetchDataForTab(bidang);
        }

        function fetchDataForTab(bidang) {
            let tabName = (bidang === "Riset dan Inovasi") ?
                "talenta-tab-1" :
                (bidang === "Seni Budaya") ?
                "talenta-tab-2" :
                "talenta-tab-3";

            let color = (bidang === "Riset dan Inovasi") ?
                "#3d81c3" :
                (bidang === "Seni Budaya") ?
                "#0EAA4B" :
                "#ff4133";

            const apiUrl = `${baseUrl}api/bidang-tahapan?_qb=${bidang}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    updateTabContent(tabName, color, data);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        function updateTabContent(tabName, color, data) {

            const contentElement = document.getElementById(`${tabName}-details`);
            // console.log(contentElement)
            if (!contentElement) return;

            let contentHtml = '';

            data.tahapan.forEach(item => {
                contentHtml += `
                <div class="col-md-3">
                    <div class="tahapan-card text-center wow fadeInUp delay-0-2s"
                         style="visibility: visible; animation-name: fadeInUp; background-color: ${color};">
                        <div class="icon-tahapan text-danger">
                            <img src="/assets/media/icons/tahapan/${item.image}" class="img" alt="">
                        </div>
                        <h5 class="text-white mt-5">${item.tahapan}</h5>
                        <h3 class="text-white">${item.total} Talenta</h3>
                    </div>
                </div>
            `;
            });

            contentElement.innerHTML = contentHtml;
        }
    </script>

@endsection

@section('css')
    <style>
        h3 {
            color: #5b5675;
            font-size: 24px;
        }

        .h1 {
            font-size: 2.5rem;
            color: unset;
        }

        .solutions-tab-nav {
            height: 100%;
        }

        .solutions-tab-nav .nav-item {
            margin-bottom: 20px;
        }

        .solutions-tab-nav .nav-link {
            display: flex;
            height: 100%;
            text-align: left;
            padding: 25px 35px;
            border-radius: 7px;
            align-items: center;
            border: 1px solid #FFFFFF;
        }

        .solutions-tab-nav .nav-link>i {
            margin-right: 20px;
            font-size: 60px;
            flex: none;
        }

        .solutions-tab-nav .nav-link h3 {
            letter-spacing: -0.5px;
        }

        .solutions-tab-nav .nav-link p {
            margin-bottom: 0;
        }

        .solutions-tab-nav .nav-link:hover,
        .solutions-tab-nav .nav-link.active {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .solutions-tab-nav .nav-item .nav-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .solutions-tab-nav .nav-item .nav-link .content {
            width: 200px;
        }

        .solutions-tab-nav .nav-item .nav-link p,
        .solutions-tab-nav .nav-item .nav-link .content-p {
            width: 60%;
            color: #5b5675;
        }

        .solutions-tab-nav .nav-item .nav-link .content-p {
            display: flex;
            gap: 1.5rem;
        }

        .solutions-tab-nav .nav-item .nav-link .content-p div {
            width: 50%;
        }

        .text-riset {
            color: #256FB2 !important;
        }

        .border-riset {
            border-color: #256FB2 !important;
        }

        .text-seni {
            color: #F3572C !important;
        }

        .border-seni {
            border-color: #F3572C !important;
        }

        .text-or {
            color: #1CA6B5 !important;
        }

        .border-or {
            border-color: #1CA6B5 !important;
        }

        #kt_user_table_wrapper {
            width: 100% !important;
        }
    </style>
@endsection
