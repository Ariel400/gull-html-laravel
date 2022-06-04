@extends('layouts.master')

@section('page-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">

@endsection
@section('main-content')
       <div class="breadcrumb">
                <h1>Dashboard</h1>
                <ul>
                    <li><a href="/">Dashboard</a></li>
                    {{-- <li>Version 2</li> --}}
                </ul>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            @php
            $contrats=\DB::table('contrat')->where("id_client",Auth()->user()->id)->where("actif","1");
            $contrats_ant=\DB::table('contrat')->where("id_client",Auth()->user()->id)->where("status","terminer");
            $contrat_act = $contrats->where('status','en cours')->first();
            // $paie = 
            @endphp
            {{-- @dd($contrats_act) --}}
            <div class="row">
                <div class="col-lg col-md">
                    <!-- CARD ICON -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Data-Upload"></i>
                                    <p class="text-muted mt-2 mb-2">Crédit en cours</p>
                                   
                                    <p class="text-danger text-24 line-height-1 m-0">{{count($contrats->get())}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Add-User"></i>
                                    <p class="text-muted mt-2 mb-2">Crédit annulé</p>
                                    <p class="text-danger text-24 line-height-1 m-0">0</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Money-2"></i>
                                    <p class="text-muted mt-2 mb-2">Crédit antérieurs</p>
                                    <p class="text-danger text-24 line-height-1 m-0">{{count($contrats_ant->get())}}</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Money-2"></i>
                                    <p class="text-muted mt-2 mb-2">Montant crédit en cours</p>
                                    <p class="line-height-1 text-title text-18 mt-2 mb-0">{{$contrat_act?$contrat_act->montant_pret:"0"}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Gear"></i>
                                    <p class="text-muted mt-2 mb-2">Montant reste à payer</p>
                                    <p class="line-height-1 text-title text-18 mt-2 mb-0">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-icon-big mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Bell"></i>
                                    <p class="text-muted mt-2 mb-2">Montant crédits antérieurs</p>
                                    <p class="line-height-1 text-title text-18 mt-2 mb-0">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            
@endsection

@section('page-js')
     <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
     <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
      <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
     <script src="{{asset('assets/js/es5/dashboard.v2.script.js')}}"></script>

@endsection
