@extends('layouts.master')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection

@section('main-content')*
@php
$user = Auth()->user()
@endphp
    <div class="breadcrumb">
                <h1>Profile</h1>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="card user-profile o-hidden mb-4">
                <div class="header-cover" style="background-image: url({{asset('assets/images/photo-wide-5.jpeg')}}"></div>
                <div class="user-info">
                    <img class="profile-picture avatar-lg mb-2" src="{{asset('assets/images/faces/1.jpg')}}" alt="">
                    <p class="m-0 text-24">{{$user->nom}} {{$user->prenom}}</p>
                    <p class="text-muted m-0">{{$user->profession}}</p>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">A propos</a>
                        </li>
                     
                    </ul>

                    <div class="tab-content" id="profileTabContent">

                        <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <h4>Informations personnelles</h4>
                            
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i>Date de naissance</p>
                                        <span>{{$user->dateNaissance}}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i>Lieu de naissance</p>
                                        <span>{{$user->lieuNaissance}}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Vie à</p>
                                        <span>{{$user->lieuHabitation}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Genre</p>
                                        <span>{{$user->genre}}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p>
                                        <span>{{$user->email}}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Site web</p>
                                        <span>{{$user->siteWeb}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Profession</p>
                                        <span>{{$user->profession}}</span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Professor text-16 mr-1"></i> Experience</p>
                                        <span>{{$user->experience}}</span>
                                    </div>
                                </div>
                            </div>
                            <hr>                           
                        </div>
                    </div>
                </div>
            </div>



@endsection

@section('page-js')
 <script src="{{asset('assets/js/vendor/spin.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/ladda.js')}}"></script>
<script src="{{asset('assets/js/ladda.script.js')}}"></script>
@endsection
