@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Country</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- table responsive --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Country</th>
                                    <th>User</th>
                                    {{-- <th>No. of city </th> --}}
                                    <th>City</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>
                                            {{ $country->users_count }}
                                        </td>
                                        {{-- <td>
                                            <ul>
                                                @forelse ($country->cities as $city)
                                                    <li>{{ $city->name }}</li>
                                                @empty
                                                    <li class="text-warning">No cities</li>
                                                @endforelse
                                            </ul>
                                        </td> --}}
                                        <td>{{ $country->cities_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection