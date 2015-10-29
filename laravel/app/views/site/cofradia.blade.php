@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">

            @include('notifications')



            <div class="row">
                <!-- google maps widget -->
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Cofradia</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <div id="multi" style="">
                                <div class="row top-buffer">
                                    <!-- google maps widget -->
                                    <div class="col-md-4">

                                        <div class="panel-danger center">
                                            <div class="panel-heading tile__name">Group A</div>
                                            <div class="panel-body tile__list">


                                                <div class="customThumbnail" data-id="1"><img style="max-width: 9em"class="img-thumbnail" src="{{ asset('template/js/st/nazareno.jpg')}}" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Hermano Nº 2023 <br> José Perez Lopéz</p>
                                                    </div>
                                                </div>
                                                <div class="customThumbnail" data-id="2"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/2" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Hermano Nº 2024 <br> Francisco Ruíz Lopéz</p>
                                                    </div>
                                                </div>
                                                <div class="customThumbnail" data-id="3"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/1" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Hermano Nº 2025 <br> Luis Alfredo Perez Lopéz</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel-danger  center">
                                            <div class="panel-heading tile__name">Group B</div>
                                            <div class="panel-body tile__list">
                                                <div class="customThumbnail"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/4" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Pie</p>
                                                    </div>
                                                </div>
                                                <div class="customThumbnail"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/5" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Pie</p>
                                                    </div>
                                                </div>
                                                <div class="customThumbnail"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/6" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Pie</p>
                                                    </div>
                                                </div>
                                                <div class="customThumbnail"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/7" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Pie</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="panel-danger  center">
                                            <div class="panel-heading tile__name">Group C</div>
                                            <div class="panel-body tile__list">
                                                <img class="img-circle" src="http://lorempixel.com/100/100/people/8">
                                                <img class="img-circle" src="http://lorempixel.com/100/100/people/9">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-foot">
                                <!-- Footer goes here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <input type="button" onclick="alert(arrayAux[0].toArray());" value="test"/>
@stop

@section('scripts')
    <script src="{{ asset('template/js/sortable.js')}}"></script>
    <script src="{{ asset('template/js/st/app.js')}}"></script>


@stop



