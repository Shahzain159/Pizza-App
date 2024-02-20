
@extends('Admin.layout')

@section('title', 'Manage Pizza')

@section('content')

    <div class="container mt-2">

        <h4>Manage Pizzas </h4>
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
                            <th class="th-sm">Description
                            </th>
                            <th class="th-sm">Price
                            </th>
                            <th class="th-sm">Image
                            </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($pizzas as $pizza)
                            <tr>
                                <td>{{ $pizza->name }}</td>
                                <td>{{ $pizza->description }}</td>
                                <td>{{ $pizza->price }}</td>
                                <td><img src="{{ asset('pizza_images/' . $pizza->image) }}" alt="{{ $pizza->name }}" width="150"></td>
                            </tr>
                            @endforeach

                        </tbody>

                      </table>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->


    </div>

@endsection
