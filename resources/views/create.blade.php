@extends('layouts.layouts')

@section('content')
<style>
    .error {
        color: red;
    }
    .success {
        color: green;
    }
</style>

    <h2 style="text-align: center">Add User Data</h2>

    <div class="container">
        <div class="row justify align-content-center">
            <div class="col-sm-8">
                {{-- {{-- Use this when validating via JavaScript validate4.js  --}}
                {{-- <form id="myForm" action="{{ route('store') }}" method="POST" onsubmit="return validateInputs()"> --}}
                    <form id="myForm" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name<span aria-label="required" class="text-danger">*</span></label>
                        <input type="text" name="name" id="fname" class="form-control"
                            placeholder="Enter your Name" value="{{ old('name') }}"><span class="error" id="nameError"></span>
                        @if ($errors->has('name'))
                            <span class="text-danger"> {{ $errors->first('name') }} </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email<span aria-label="required" class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Enter your Email id" value="{{ old('email') }}"><span class="error" id="emailError"></span>
                        @if ($errors->has('email'))
                            <span class="text-danger"> {{ $errors->first('email') }} </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="salary">Salary<span aria-label="required" class="text-danger">*</span></label>
                        <input type="text" name="salary" id="salary" class="form-control"
                            placeholder="Enter your Salary" value="{{ old('salary') }}"><span class="error" id="salaryError"></span>
                        @if ($errors->has('salary'))
                            <span class="text-danger"> {{ $errors->first('salary') }} </span>
                        @endif
                    </div>


                    <input type="submit" value="Submit" class="btn btn-dark mt-2">
                </form>
                {{-- Client-side Validation using JavaScript--}}
                 <script src="{{ asset('js/validnew.js') }}"></script>
                {{-- <script src="{{ asset('js/validate4.js') }}"></script> --}}
                {{-- <script src="{{asset('js/validate_jQuery.js')}}"></script> --}}
                {{-- <script src="{{asset('js/validate_jQuery_plugin.js')}}"></script> --}}
            </div>
        </div>
    </div>
@endsection
