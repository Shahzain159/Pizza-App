@extends('Admin.layout')

@section('title', 'Add Pizza')

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
                    <div class="card-header">Add Pizza</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('addpizzapost') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Pizza Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    class="form-control">
                                @if ($errors->has('name'))
                                    <div class="error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="error text-danger">{{ $errors->first('description') }}</div>
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

                            <button type="submit" class="btn btn-primary">Add Pizza</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
