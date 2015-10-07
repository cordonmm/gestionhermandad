@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">

                <div class="col-md-12">


                    <div class="widget wgreen">

                        <div class="widget-head">
                            <div class="pull-left">{{$insignia->descripcion}}</div>
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
                                <form class="form-horizontal" method="post" action="@if (isset($insignia)){{ URL::to('gestionhdad/insignias/' . $insignia->id . '/editar') }}@endif" autocomplete="off">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <!-- ./ csrf token -->

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Descripción</label>
                                        <div class="col-lg-3 {{{ $errors->has('descripcion') ? 'error' : '' }}}">
                                            <input name="descripcion" type="text" class="form-control" placeholder="Nombre" value="{{{ Input::old('descripcion', isset($insignia) ? $insignia->descripcion : null) }}}"">
                                            {{ $errors->first('descripcion', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Cantidad</label>
                                        <div class="col-lg-3 {{{ $errors->has('cantidad') ? 'error' : '' }}}">
                                            <input name="cantidad" type="text" class="form-control" placeholder="Nombre" value="{{{ Input::old('cantidad', isset($insignia) ? $insignia->cantidad : null) }}}"">
                                            {{ $errors->first('cantidad', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Paso</label>
                                        <div class="col-lg-3">
                                            <select name="paso_id" class="form-control">
                                                {{--*/ $pasos = Paso::orderby('id','desc')->get() /*--}}
                                                @foreach($pasos as $paso)
                                                    <option {{ $insignia->paso_id == $paso->id ? 'selected' : ''}} value="{{$paso->id}}">{{$paso->descripcion}}</option>
                                                @endforeach
                                            </select>
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
                        <div class="widget-foot">
                            <!-- Footer goes here -->
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@stop
