@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">

                <div class="col-md-12">


                    <div class="widget wgreen">

                        <div class="widget-head">
                            <div class="pull-left">Configuración</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <!--<a href="#" class="wclose"><i class="fa fa-times"></i></a>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>



                        <div class="widget-content">
                            <div class="padd">

                                <br />
                                <!-- Form starts.  -->

                                {{--*/ $configuracion = Confighdad::first() /*--}}

                                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="@if (isset($configuracion)){{ URL::to('gestionhdad/configuracion/editar') }}@endif" autocomplete="off">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <!-- ./ csrf token -->

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nombre Hermandad</label>
                                        <div class="col-lg-3 {{{ $errors->has('nombre_hdad') ? 'error' : '' }}}">
                                            <input name="nombre_hdad" type="text" class="form-control" placeholder="Nombre Hermandad" value="{{{ Input::old('nombre_hdad', isset($configuracion) ? $configuracion->nombre_hdad : null) }}}"">
                                            {{ $errors->first('nombre_hdad', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Descripción</label>
                                        <div class="col-lg-5 {{{ $errors->has('descripcion') ? 'error' : '' }}}">
                                            <input name="descripcion" type="text" class="form-control" placeholder="Descripción" value="{{{ Input::old('descripcion', isset($configuracion) ? $configuracion->descripcion : null) }}}"">
                                            {{ $errors->first('descripcion', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nazarenos</label>
                                        <div class="col-lg-3 {{{ $errors->has('nazarenos') ? 'error' : '' }}}">
                                            <input name="nazarenos" type="text" class="form-control" placeholder="Nazarenos" value="{{{ Input::old('nazarenos', isset($configuracion) ? $configuracion->nazarenos : null) }}}"">
                                            {{ $errors->first('nazarenos', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Nº de tramos</label>
                                        <div class="col-lg-5 {{{ $errors->has('tramos') ? 'error' : '' }}}">
                                            <input name="tramos" type="text" class="form-control" placeholder="Tramos" value="{{{ Input::old('tramos', isset($configuracion) ? $configuracion->tramos : null) }}}"">
                                            {{ $errors->first('tramos', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Cuota anual adulto</label>
                                        <div class="col-lg-3 {{{ $errors->has('cuota') ? 'error' : '' }}}">
                                            <input name="cuota" type="text" class="form-control" placeholder="Cuota anual" value="{{{ Input::old('cuota', isset($configuracion) ? $configuracion->cuota : null) }}}"">
                                            {{ $errors->first('cuota', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Cuota anual menor</label>
                                        <div class="col-lg-5 {{{ $errors->has('cuota_menor') ? 'error' : '' }}}">
                                            <input name="cuota_menor" type="text" class="form-control" placeholder="Cuota anual" value="{{{ Input::old('cuota_menor', isset($configuracion) ? $configuracion->cuota_menor : null) }}}"">
                                            {{ $errors->first('cuota_menor', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group {{{ $errors->has('titulo') ? 'error' : '' }}}">
                                        <label class="col-lg-2 control-label">Precio papeleta</label>
                                        <div class="col-lg-3 {{{ $errors->has('preciopapeleta') ? 'error' : '' }}}">
                                            <input name="preciopapeleta" type="text" class="form-control" placeholder="Precio papeleta" value="{{{ Input::old('preciopapeleta', isset($configuracion) ? $configuracion->preciopapeleta : null) }}}"">
                                            {{ $errors->first('preciopapeleta', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <br>

                                    <div class="form-group {{{ $errors->has('titulo') ? 'error' : '' }}}">
                                        <label class="col-lg-2 control-label">Fecha inicio solicitud insignias</label>
                                        <div class="col-lg-3 {{{ $errors->has('fecha_inicio_insignias') ? 'error' : '' }}}">
                                            <input name="fecha_inicio_insignias" type="date" class="form-control" placeholder="dd/mm/aaaa" value="{{{ Input::old('fecha_inicio_insignias', isset($configuracion) ? date('Y-m-d', strtotime($configuracion->fecha_inicio_insignias)) : null) }}}"">
                                            {{ $errors->first('fecha_inicio_insignias', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Fecha fin solicitud insignias</label>
                                        <div class="col-lg-5 {{{ $errors->has('fecha_fin_insignias') ? 'error' : '' }}}">
                                            <input name="fecha_fin_insignias" type="date" class="form-control" placeholder="dd/mm/aaaa" value="{{{ Input::old('fecha_fin_insignias', isset($configuracion) ? date('Y-m-d', strtotime($configuracion->fecha_fin_insignias)) : null) }}}"">
                                            {{ $errors->first('fecha_fin_insignias', '<span class="help-block">:message</span>') }}
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Fecha inicio solicitud papeletas</label>
                                        <div class="col-lg-3 {{{ $errors->has('fecha_inicio_papeletas') ? 'error' : '' }}}">
                                            <input name="fecha_inicio_papeletas" type="date" class="form-control" placeholder="dd/mm/aaaa" value="{{{ Input::old('fecha_inicio_papeletas', isset($configuracion) ? date('Y-m-d', strtotime($configuracion->fecha_inicio_papeletas)) : null) }}}"">
                                            {{ $errors->first('fecha_inicio_papeletas', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Fecha fin solicitud papeletas</label>
                                        <div class="col-lg-5 {{{ $errors->has('fecha_fin_papeletas') ? 'error' : '' }}}">
                                            <input name="fecha_fin_papeletas" type="date" class="form-control" placeholder="dd/mm/aaaa" value="{{{ Input::old('fecha_fin_papeletas', isset($configuracion) ? date('Y-m-d', strtotime($configuracion->fecha_fin_papeletas)) : null) }}}"">
                                            {{ $errors->first('fecha_fin_papeletas', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Logo</label>
                                        <div class="col-lg-3 {{{ $errors->has('logo') ? 'error' : '' }}}">
                                            <input name="logo" type="file" class="form-control" value="{{{ Input::old('logo', isset($configuracion) ? $configuracion->logo : null) }}}"">
                                            {{ $errors->first('logo', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Logo actual</label>
                                        <div class="col-lg-3">
                                            <img class="img-responsive" alt="Logo" src="{{asset('template/css/images/logo.png')}}" />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-6">
                                            <button type="submit" class="btn btn-sm btn-danger">Modificar</button>
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
