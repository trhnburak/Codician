@extends('layouts.app')

@section('content')
    <!-- Dark table -->
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="text-white mb-0">Kişiler</h3>

                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('people.create') }}" class="btn btn-primary text-right pull-right">Ekle</a>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="sort" data-sort="lastName">Ünvanı</th>
                            <th scope="col" class="sort" data-sort="name">Adı</th>
                            <th scope="col" class="sort" data-sort="lastName">Soyadı</th>
                            <th scope="col" class="sort" data-sort="budget">Email</th>
                            <th scope="col" class="sort" data-sort="budget">Telefon</th>
                            <th scope="col" class="sort" data-sort="status">Şirket Adı</th>
                            <th scope="col" class="sort" data-sort="status">Aksiyonlar</th>

                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($people as $person)
                            <tr>
                                <td>{{ $person->title }}</td>
                                <td>{{ $person->name }}
                                <td>{{ $person->last_name }}</td>
                                <td>{{ $person->email }}</td>
                                <td>{{ $person->phone }}</td>
                                <td>{{ $person->company_id }}</td>
                                <td>
                                    <a href="{{ route('people.edit', $person->id)}}" class="btn btn-success"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('people.delete', $person->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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