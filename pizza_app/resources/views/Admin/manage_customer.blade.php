@extends('Admin.layout')

@section('title', 'Manage Customers')

@section('content')

    <div class="container mt-2">

        @if(Session::has('success'))
            <div class="alert alert-success" id="success_message">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">

                    </div>
                    <table id="dt-cell-sellection" class="table" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="th-sm">Name
                            </th>

                            <th class="th-sm">Email
                            </th>
                            <th class="th-sm">Address
                            </th>
                            <th class="th-sm">Phone Number
                            </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            @endforeach

                        </tbody>

                      </table>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
    </div>

@endsection
