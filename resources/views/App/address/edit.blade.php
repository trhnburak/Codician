@extends('layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('address.update', $address->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row p-3">
                <div class="col-12 pt-2 pb-2">
                    <h3>Address Düzenle</h3>
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
                        <label for="companyName">Şirket Adı</label>
                        <select class="form-control" name="companyName" id="companyName">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" @if($company->company_name == $companyName->company_name)
                                selected @endif>{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-5 ml-auto">
                    <div class="form-group">
                        <label for="latitude">Enlem</label>
                        <input type="text" class="form-control form-control-alternative" id="latitude" name="latitude" value="{{ $address->latitude }}"
                               placeholder="Enlem Giriniz...">
                    </div>
                </div>
                <div class="col-5 mr-auto">
                    <div class="form-group">
                        <label for="longitude">Boylam</label>
                        <input type="text" class="form-control form-control-alternative" id="longitude" name="longitude" value="{{ $address->longitude }}"
                               placeholder="Boylam Giriniz...">
                    </div>
                </div>
                <div class="col-10 text-right ml-auto mr-auto">
                    <button type="submit" class="btn btn-success">Düzenle</button>
                </div>
            </div>
        </form>
    </div>
@endsection