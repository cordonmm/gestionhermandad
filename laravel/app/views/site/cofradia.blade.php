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
                                    <div style="max-width: 340px; margin: 5% 1% 5% 5%;" class="col-md-3">

                                        <div style="border: solid 1px #7F7F7F" class="panel-danger center">
                                            <div class="panel-heading tile__name">Tramo 1

                                                <select name="diputado" style="width: 100%;" class="js-hermanos" required>
                                                    <option>Seleccione un diputado</option>
                                                    @foreach(Hermano::where('activo', '=', 1)->orderby('id','asc')->get() as $hermano)
                                                        <option name="cantidad" value="{{$hermano->id}}">{{$hermano->nombre}} {{$hermano->apellidos}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
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
                                                <div class="customThumbnail" data-id="1"><img style="max-width: 9em"class="img-thumbnail" src="{{ asset('template/js/st/nazareno.jpg')}}" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Hermano Nº 2023 <br> José Perez Lopéz</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="max-width: 340px; margin: 5% 1% 5% 2%;" class="col-md-3">
                                        <div style="border: solid 1px #7F7F7F" class="panel-danger center">
                                            <div class="panel-heading tile__name">Tramo 2

                                                <select name="diputado" style="width: 100%;" class="js-hermanos" required>
                                                    <option>Seleccione un diputado</option>
                                                    @foreach(Hermano::where('activo', '=', 1)->orderby('id','asc')->get() as $hermano)
                                                        <option name="cantidad" value="{{$hermano->id}}">{{$hermano->nombre}} {{$hermano->apellidos}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
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
                                                <div class="customThumbnail" data-id="3"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/1" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Hermano Nº 2025 <br> Luis Alfredo Perez Lopéz</p>
                                                    </div>
                                                </div>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div style="max-width: 340px; margin: 5% 1% 5% 2%;" class="col-md-3">
                                        <div style="border: solid 1px #7F7F7F" class="panel-danger center">
                                            <div class="panel-heading tile__name">Tramo 3

                                                <select name="diputado" style="width: 100%;" class="js-hermanos" required>
                                                    <option>Seleccione un diputado</option>
                                                    @foreach(Hermano::where('activo', '=', 1)->orderby('id','asc')->get() as $hermano)
                                                        <option name="cantidad" value="{{$hermano->id}}">{{$hermano->nombre}} {{$hermano->apellidos}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
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
                                                <div class="customThumbnail" data-id="3"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/1" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Hermano Nº 2025 <br> Luis Alfredo Perez Lopéz</p>
                                                    </div>
                                                </div>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div style="max-width: 340px; margin: 5% 5% 5% 1%;" class="col-md-3">
                                        <div style="border: solid 1px #7F7F7F" class="panel-danger center">
                                            <div class="panel-heading tile__name">Tramo 4

                                                <select name="diputado" style="width: 100%;" class="js-hermanos" required>
                                                    <option>Seleccione un diputado</option>
                                                    @foreach(Hermano::where('activo', '=', 1)->orderby('id','asc')->get() as $hermano)
                                                        <option name="cantidad" value="{{$hermano->id}}">{{$hermano->nombre}} {{$hermano->apellidos}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
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
                                                <div class="customThumbnail" data-id="3"><img class="img-thumbnail" src="http://lorempixel.com/100/100/people/1" draggable="false" class="">
                                                    <div class="caption">
                                                        <p>Hermano Nº 2025 <br> Luis Alfredo Perez Lopéz</p>
                                                    </div>
                                                </div>
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
@section('styles')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <!--<link href="{{ asset('template/js/st/app.css')}}" rel="stylesheet" />-->
@stop
@section('scripts')
    <script src="{{ asset('template/js/Sortable.js')}}"></script>
    <script src="{{ asset('template/js/st/app.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2({
            placeholder: "Selecciona 4 insignias por orden de prioridad",
            maximumSelectionLength: "1"
        });
        $(".js-hermanos").select2({
            placeholder: "Selecciona un diputado"
        });
    </script>
@stop



