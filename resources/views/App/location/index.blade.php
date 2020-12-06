@extends('layouts.app')

@section('content')
    <style>
        html, body, #mapFrame {
            width: 100%;
            height: 500px;
            margin: 0;
            padding: 0;
            border: none;
        }
    </style>
    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <h3>Şirket Lokasyonları</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="harita" style="width:100%; height:100%">
                    <iframe id="mapFrame" src="http://sehirharitasi.ibb.gov.tr/">
                        <p>Tarayıcınız iframe özelliklerini desteklemiyor !</p>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('location.get') }}',
                type: 'GET',
                success: function (data) {

                    location(data)
                    console.log(JSON.parse(data))

                },
                error: function (jqXhr) {
                    console.log(jqXhr)
                }
            })


            function location(data) {
                var ibbMAP = new SehirHaritasiAPI({mapFrame: "mapFrame", apiKey: "387bc099bbe645be853cc49c67263dd7"}, function () {
                    $.each(data, function (index, value) {
                        ibbMAP.Map.GetInformation(
                            {
                                lon: value.longitude,
                                lat: value.latitude,
                                title: value.company_id
                            },
                        );
                    })

                });
            }

        })




    </script>

@endpush