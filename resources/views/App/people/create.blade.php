@extends('layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('people.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row p-3">
                <div class="col-12 pt-2 pb-2">
                    <h3>Kişi Ekle</h3>
                </div>
                <div class="col-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-10 ml-auto mr-auto">
                    <div class="form-group">
                        <label for="title">Ünvan</label>
                        <input type="text" class="form-control form-control-alternative" id="title" name="title" placeholder="Ünvan Giriniz...">
                    </div>
                </div>
                <div class="col-5 ml-auto">
                    <div class="form-group">
                        <label for="name">Adı</label>
                        <input type="text" class="form-control form-control-alternative" id="name" name="name" placeholder="Adı Giriniz...">
                    </div>
                </div>
                <div class="col-5 mr-auto">
                    <div class="form-group">
                        <label for="lastName">Soyad</label>
                        <input type="text" class="form-control form-control-alternative" id="lastName" name="lastName" placeholder="Soyad Giriniz...">
                    </div>
                </div>
                <div class="col-5 ml-auto">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control form-control-alternative" id="email" name="email" placeholder="E-posta Giriniz...">
                    </div>
                </div>
                <div class="col-5 mr-auto">
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="text" class="form-control form-control-alternative" id="phone" name="phone" placeholder="Telefon Giriniz...">
                    </div>
                </div>
                <div class="col-10 ml-auto mr-auto">
                    <div class="form-group">
                        <label for="companyName">Şirket Adı</label>
                        <select class="form-control" name="companyName" id="companyName">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-10 text-right ml-auto mr-auto">
                    <button type="submit" class="btn btn-success">Ekle</button>
                </div>
            </div>
        </form>
    </div>
@endsection