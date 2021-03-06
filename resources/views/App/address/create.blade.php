@extends('layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('address.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row p-3">
                <div class="col-12 pt-2 pb-2">
                    <h3>Adres Ekle</h3>
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
                <div class="col-5 ml-auto">
                    <div class="form-group">
                        <label for="latitude">Enlem</label>
                        <input type="text" class="form-control form-control-alternative" id="latitude" name="latitude" placeholder="Enlem Giriniz...">
                    </div>
                </div>
                <div class="col-5 mr-auto">
                    <div class="form-group">
                        <label for="longitude">Boylam</label>
                        <input type="text" class="form-control form-control-alternative" id="longitude" name="longitude" placeholder="Boylam Giriniz...">
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