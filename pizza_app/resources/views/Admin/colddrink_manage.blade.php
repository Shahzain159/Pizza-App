@extends('Admin.layout')

@section('title', 'Manage Cold Drinks')

@section('content')

    <div class="container mt-2">

        @if(Session::has('success'))
            <div class="alert alert-success" id="success_message">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage Cold Drinks</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('colddrinkpost') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Cold Drink Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    class="form-control">
                                @if ($errors->has('name'))
                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="size">Cold Drink Size</label>
                                <input type="text" value="{{ old('size') }}" name="size" id="name"
                                    class="form-control">
                                @if ($errors->has('size'))
                                    <div class="error text-danger">{{ $errors->first('size') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="price">Price ($)</label>
                                <input type="number" step="0.1" value="{{ old('price') }}" name="price"
                                    id="price" class="form-control">
                                @if ($errors->has('price'))
                                    <div class="error text-danger">{{ $errors->first('price') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($errors->has('image'))
                                    <div class="error text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Add Cold Drink</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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

                            <th class="th-sm">Size
                            </th>
                            <th class="th-sm">Price
                            </th>
                            <th class="th-sm">Image
                            </th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($coldDrinks as $drink)
                            <tr>
                                <td>{{ $drink->name }}</td>
                                <td>{{ $drink->size }}</td>
                                <td>{{ $drink->price }}</td>
                                <td><img src="{{ asset('cold_drink_images/' . $drink->image) }}" alt="{{ $drink->name }}" width="100"></td>
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
