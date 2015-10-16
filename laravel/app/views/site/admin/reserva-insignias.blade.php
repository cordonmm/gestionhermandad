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





                        <div class="widget-content">
                            <div class="padd">

                                <form class="form-horizontal" method="post" action="{{ URL::to('gestionhdad/insignias/reservar') }}" autocomplete="off">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <!-- ./ csrf token -->

                                    @if(Auth::user()->hasRole('admin'))
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Listado de Hermanos</label>
                                            <div class="col-lg-10">
                                                <select onchange="$('.js-example-basic-multiple').select2({maximumSelectionLength: $('.js-hermanos option:selected').attr('id')});" name="hermano" style="width: 100%;" class="js-hermanos" required>
                                                    <option>Seleccione un hermano</option>
                                                    @foreach(Hermano::orderby('id','asc')->get() as $hermano)
                                                        @if(count($hermano->insigniasReservadas) < 4)
                                                        <option name="cantidad" value="{{$hermano->id}}" id="{{(4 - count($hermano->insigniasReservadas))}}">{{$hermano->nombre}} {{$hermano->apellidos}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Listado Insignias</label>
                                        <div class="col-lg-10">

                                            <select name="insignias[]" style="width: 100%;" class="js-example-basic-multiple" multiple="multiple">
                                                @foreach(Paso::orderby('id','asc')->get() as $paso)
                                                    @foreach(Insignia::where('paso_id', '=', $paso->id)->orderby('id','desc')->get() as $insignia)
                                                        <option value="{{$insignia->id}}"><b>{{$paso->descripcion}}</b> - {{$insignia->descripcion}}</option>
                                                    @endforeach
                                                @endforeach

                                            </select>
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
@section('scripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2({
            placeholder: "Selecciona 4 insignias por orden de prioridad",
            maximumSelectionLength: 4
        });

        $(".js-hermanos").select2({
            placeholder: "Selecciona un hermano",
        });

    </script>
@stop