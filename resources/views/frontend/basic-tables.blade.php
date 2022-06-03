@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/frontend.min.css')}}">
@endsection

@section('main-content')
  <div class="breadcrumb">
                <h1>Mes Demandes</h1>
                <ul>
                    {{-- <li><a href="">UI Kits</a></li> --}}
                    {{-- <li>Mes </li> --}}
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>

            {{-- <div class="row mb-4">
                <div class="col-md-12">
                    <h4>Datatables</h4>
                    <p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, build upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table.</p>
                </div>
            </div> --}}
            <!-- end of row -->

            <div class="row">
                <div class="col-md">
                    <div class="card o-hidden mb-4">
                        <div class="card-header">
                            <div class="dropdown dropleft text-right w-50 float-right">
                                <a href="{{route('demande')}}">
                                    <button type="button" class="btn btn-primary btn-icon m-1">
                                        <span class="ul-btn__icon"><i class="i-Add-Window"></i></span>
                                        <span class="ul-btn__text">Nouvelle demande</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Détail</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="user_table" class=" table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date demande</th>
                                            <th scope="col">Montant du crédit</th>
                                            <th scope="col">Date de l'emprunt</th>
                                            <th scope="col">Type de demande</th>
                                            <th scope="col">Statut</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Smith Doe</td>
                                            <td>
                                                <img class="rounded-circle m-0 avatar-sm-table " src="{{asset('assets/images/faces/1.jpg')}}" alt="">
                                            </td>
                                            <td>Smith@gmail.com</td>
                                            <td><span class="badge badge-success">Active</span></td>
                                            <td><span class="badge badge-warning">Not Active</span></td>
                                            <td>
                                                <a href="#" class="text-success mr-2" data-toggle="modal" data-target="#exampleModalLong">
                                                    <i class="nav-icon i-Eye font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jhon Doe</td>
                                            <td>
                                                <img class="rounded-circle m-0 avatar-sm-table " src="{{asset('assets/images/faces/1.jpg')}}" alt="">
                                            </td>
                                            <td>Jhon@gmail.com</td>
                                            <td><span class="badge badge-info">Pending</span></td>
                                            <td><span class="badge badge-warning">Not Active</span></td>
                                            <td>
                                                <a href="#" class="text-success mr-2" data-toggle="modal" data-target="#exampleModalLong">
                                                    <i class="nav-icon i-Eye font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Alex</td>
                                            <td>

                                                <img class="rounded-circle m-0 avatar-sm-table " src="{{asset('assets/images/faces/1.jpg')}}" alt="">

                                            </td>

                                            <td>Otto@gmail.com</td>
                                            <td><span class="badge badge-warning">Not Active</span></td>
                                            <td><span class="badge badge-warning">Not Active</span></td>
                                            <td>
                                                <a href="#" class="text-success mr-2" data-toggle="modal" data-target="#exampleModalLong">
                                                    <i class="nav-icon i-Eye font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of col-->
            </div>
            <!-- end of row -->



@endsection

@section('page-js')

    <script src="{{asset('assets/js/vendor/frontend.min.js')}}"></script>
    <script src="{{asset('assets/js/frontend.script.js')}}"></script>
    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/es5/dashboard.v2.script.js')}}"></script>

@endsection
