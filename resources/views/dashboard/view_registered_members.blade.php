@extends('dashboard.admin_layout')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tables</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <img src="/assets/img/cck-logo.png" width="200px">
                            </div>
                        </div>

                        <div class="section-title" data-aos="zoom-out" style="text-align:center !important;">
                            <h2>Registered Members</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Registered Members
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>ID NO</th>
                            <th>Phone No</th>
                            <th>Gender</th>
                            <th>Previous Party</th>
                            <th>Polling center</th>
                            <th>Ward</th>
                            <th>Constituency</th>
                            <th>County</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>ID NO</th>
                            <th>Phone No</th>
                            <th>Gender</th>
                            <th>Previous Party</th>
                            <th>Polling center</th>
                            <th>Ward</th>
                            <th>Constituency</th>
                            <th>County</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{$member -> first_name}} {{$member -> last_name}}</td>
                            <td>{{$member -> id_no}}</td>
                            <td>{{$member -> phone_number}}</td>
                            <td>{{$member -> gender}}</td>
                            <td>{{$member -> current_party}}</td>
                            <td>{{$member -> polling_center}}</td>
                            <td>{{$member -> ward}}</td>
                            <td>{{$member -> constituency}}</td>
                            <td>{{$member -> county}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
