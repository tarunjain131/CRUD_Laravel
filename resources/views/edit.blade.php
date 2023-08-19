@extends('layouts.layouts')

@section('content')
    <h2 style="text-align: center">User Data</h2>

    <div class="container">
        <div class="row justify align-content-center">
            <div class="col-sm-8">
                <h3>Edit Details</h3>
                    <form action ="{{ route('update', $data->id) }}" method="POST" onsubmit="return validateInputs()">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name',$data->name)}}"><div class="error"></div>
                            @if ($errors->has('name'))
                                <span class="text-danger"> {{$errors->first('name')}} </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email',$data->email)}}"><div class="error"></div>
                            @if ($errors->has('email'))
                                <span class="text-danger"> {{$errors->first('email')}} </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="number" name="salary" id="salary" class="form-control" value="{{old('salary',$data->salary)}}"><div class="error"></div>
                            @if ($errors->has('salary'))
                                <span class="text-danger"> {{$errors->first('salary')}} </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-dark mt-2">Save Changes</button>
                    </form>
                    <script src="{{ asset('js/validate4.js') }}"></script>
            </div>
        </div>
    </div>
    @endsection
