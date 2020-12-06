@extends('layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('company.update', $company->id) }}" method="edit" enctype="multipart/form-data">
            @csrf
            <div class="row p-3">
                <div class="col-12 pt-2 pb-2">
                    <h3>Şirket Düzenle</h3>
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
                        <label for="companyName">Şirket Adı</label>
                        <input type="text" class="form-control form-control-alternative" id="companyName" name="companyName" value="{{ $company->company_name}}"
                               placeholder="Şirket Adı Giriniz...">
                    </div>
                </div>
                <div class="col-5 mr-auto">
                    <div class="form-group">
                        <label for="webSite">Web Sitesi</label>
                        <input type="text" class="form-control form-control-alternative" id="webSite" name="webSite" value="{{ $company->company_name}}"
                               placeholder="Web Sitesi Giriniz...">
                    </div>
                </div>
                <div class="col-10 text-right ml-auto mr-auto">
                    <button type="submit" class="btn btn-success">Düzenle</button>
                </div>
            </div>
        </form>
    </div>
@endsection