@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">

                <div class="col-md-12">


                    <div class="widget wgreen">

                        <div class="widget-head">
                            <div class="pull-left">RESERVA DE INSIGNIAS</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <!--<a href="#" class="wclose"><i class="fa fa-times"></i></a>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- CONSULTAMOS LOS PASOS -->
                        {{--*/ $pasos = Paso::orderby('id','asc')->get() /*--}}

                        <div class="widget-content">
                            <div class="padd">

                                <form class="form-horizontal" method="post" action="">
                                    <div class="form-group">

                                            <label class="col-lg-4 control-label">{{$pasos[0]->descripcion}}</label>
                                            <div class="col-lg-2"></div>

                                            <label class="col-lg-4 control-label">{{$pasos[1]->descripcion}}</label>
                                            <div class="col-lg-2"></div>

                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Listado Insignias</label>
                                        <div class="col-lg-4">
                                            <!-- CONSULTAMOS LAS INSINIAS POR PASO -->
                                            {{--*/ $insignias = Insignia::where('paso_id', '=', $pasos[0]->id)->orderby('id','desc')->get() /*--}}
                                            @foreach($insignias as $insignia)
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" value="{{$insignia->id}}"> {{$insignia->descripcion}}
                                                </label>
                                                <br>
                                            @endforeach
                                        </div>

                                        <label class="col-lg-2 control-label">Listado Insignias</label>
                                        <div class="col-lg-4">
                                            <!-- CONSULTAMOS LAS INSINIAS POR PASO -->
                                            {{--*/ $insignias = Insignia::where('paso_id', '=', $pasos[1]->id)->orderby('id','desc')->get() /*--}}
                                            @foreach($insignias as $insignia)
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox1" value="{{$insignia->id}}"> {{$insignia->descripcion}}
                                                </label>
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-lg-offset-2 col-lg-6">
                                            <button type="submit" class="btn btn-sm btn-danger">Reservar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop