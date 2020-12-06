@extends('layouts.app')

@section('content')
    <!-- Dark table -->
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="text-white mb-0">Şirketler</h3>

                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('company.create') }}" class="btn btn-primary text-right pull-right">Ekle</a>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">Şirket Adı</th>
                            <th scope="col" class="sort" data-sort="budget">İnternet Adresi</th>
                            <th scope="col" class="sort" data-sort="status">Aksiyonlar</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->company_name }}</td>
                                <td>{{ $company->web_site }}</td>

                                <td>
                                    <a href="{{ route('company.edit', $company->id)}}" class="btn btn-success"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('company.delete', $company->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection