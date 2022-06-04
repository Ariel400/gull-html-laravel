@extends('layouts.master')
@section('page-css')

@endsection

@section('main-content')
    <div data-sidebar-container="chat" class="card chat-sidebar-container">
                <div data-sidebar="chat" class="chat-sidebar-wrap">
                    <div class="border-right">
                        

                        <div class="contacts-scrollable perfect-scrollbar">
                            <div class="mt-4 pb-2 pl-3 pr-3 font-weight-bold text-muted border-bottom">Contact</div>

                            <div class="p-3 d-flex align-items-center border-bottom online contact">
                                <img src="{{asset('assets/images/faces/13.jpg')}}" class="avatar-sm rounded-circle mr-3" alt="">
                                <div>
                                    <h6 class="m-0">Aya de crédit access</h6>
                                    <span class="text-muted text-small">3 Oct, 2018</span>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
                <div data-sidebar-content="chat" class="chat-content-wrap">
                    <div class="d-flex pl-3 pr-3 pt-2 pb-2 o-hidden box-shadow-1 chat-topbar">
                        <a data-sidebar-toggle="chat" class="link-icon d-md-none">
                            <i class="icon-regular i-Right ml-0 mr-3"></i>
                        </a>
                        <div class="d-flex align-items-center">
                            <img src="{{asset('assets/images/faces/13.jpg')}}" alt="" class="avatar-sm rounded-circle mr-2">
                            <p class="m-0 text-title text-16 flex-grow-1">Frank Powell</p>
                        </div>
                    </div>

                    <div class="chat-content perfect-scrollbar" data-suppress-scroll-x="true">
                        @foreach (\DB::table('messages')->get() as $item)
                        @if($item->idClient == Auth()->user()->id)   
                        <div class="d-flex mb-4">
                            @if($item->idClient != $item->idRecepteur)
                            <img src="{{asset('assets/images/faces/1.jpg')}}" alt="" class="avatar-sm rounded-circle mr-3">
                            @endif
                            <div class="message flex-grow-1">
                                <div class="d-flex">
                                    <p class="mb-1 text-title text-16 flex-grow-1">Frank Powell</p>
                                    <span class="text-small text-muted">25 min ago</span>
                                </div>
                                <p class="m-0">{{$item->message}}</p>
                            </div>
                            @if($item->idClient == $item->idRecepteur)
                            <img src="{{asset('assets/images/faces/13.jpg')}}" alt="" class="avatar-sm rounded-circle ml-3">
                            @endif
                        </div>
                        @endif
                        @endforeach

                   
                    

                    </div>

                    <div class="pl-3 pr-3 pt-3 pb-3 box-shadow-1 chat-input-area" >
                        <form  class="inputForm" >
                            <div class="form-group">
                                <textarea class="form-control form-control-rounded"  placeholder="Type your message"
                                    name="message" id="message" cols="30" rows="3"></textarea>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1"></div>
                                <button class="btn btn-icon btn-rounded btn-primary mr-2">
                                    <i class="i-Paper-Plane"></i>
                                </button>
                                <button class="btn btn-icon btn-rounded btn-outline-primary" type="button">
                                    <i class="i-Add-File"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


@endsection

@section('bottom-js')

 <script src="{{asset('assets/js/sidebar.script.js')}}"></script>

@endsection
