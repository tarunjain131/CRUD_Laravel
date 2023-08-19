@extends('layouts.layouts')

@section('content')
    <div class="container mt-5">

        <div class="container">
            <h2 style="text-align: center">Table Data</h2>
            <div class="float-end">
                <a href="/create" class="btn btn-dark mt-2"><i class="fa fa-plus"></i> Add New Data</a>
            </div>
            <br><br>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" id="myElem" role="alert" data-bs-autohide="true"
                data-bs-delay="2000">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
        @endif

        @if (session('successful'))
            <div class="alert alert-success alert-dismissible fade show" id="myElem" role="alert"
                data-bs-autohide="true" data-bs-delay="3000">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('successful') }}
            </div>
        @endif

        <div class="container">
            <div class="row m-2">
                <form id="searchForm" action="" method="GET">
                    <div class="form-group">
                        <input name="search" type="search" id="search-input" class="form-control"
                            placeholder="Search here" value="{{ $search }}">
                    </div>
                    <button type="submit" class="btn btn-dark mt-2">Search</button>
                    <a href="{{ route('home') }}"> <button class="btn btn-dark mt-2" type="button"
                            onclick="resetSearch()">Reset</button> </a>
                </form>
            </div>
        </div>

        @if ($noResults)
            <div class="alert alert-light">
                <h3>No Data Found<h3>
            </div>
        @else
            <div id="table_data">
                @include('pagination_data')
            </div>
        @endif
    </div>

    <script>
        $("#myElem").show();
        setTimeout(function() {
            $("#myElem").hide();
        }, 2000);
    </script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                let search = $('#search-input').val();
                fetch_data(page, search);
            });

            function fetch_data(page, search) {
                $.ajax({
                    url: "/fetch_data?page=" + page,
                    data: {
                        search: search
                    },
                    success: function(avs) {
                        $('#table_data').html(avs);
                    }
                });
            }

        });
    </script>
@endsection
