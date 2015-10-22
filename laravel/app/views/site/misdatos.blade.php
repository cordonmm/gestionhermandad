@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">

                <div class="col-md-12">


                    <div class="widget wgreen">

                        <div class="widget-head">
                            <div class="pull-left">Hermano número  {{$hermano->num_hermano}}</div>
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
                                <form class="form-horizontal" method="post" action="@if (isset($hermano)){{ URL::to('gestionhdad/hermanos/' . $hermano->id . '/editar') }}@endif" autocomplete="on">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <!-- ./ csrf token -->

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nombre</label>
                                        <div class="col-lg-3 {{ $errors->has('nombre') ? 'error' : '' }}">
                                            <input name="nombre" type="text" class="form-control" placeholder="Nombre" value="{{ Input::old('nombre', isset($hermano) ? $hermano->nombre : null) }}">
                                            {{ $errors->first('nombre', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Apellidos</label>
                                        <div class="col-lg-5 {{ $errors->has('apellidos') ? 'error' : '' }}">
                                            <input name="apellidos" type="text" class="form-control" placeholder="Apellidos" value="{{ Input::old('apellidos', isset($hermano) ? $hermano->apellidos : null) }}">
                                            {{ $errors->first('apellidos', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('titulo') ? 'error' : '' }}">
                                        <label class="col-lg-2 control-label">DNI</label>
                                        <div class="col-lg-3 {{ $errors->has('dni') ? 'error' : '' }}">
                                            <input name="dni" readonly="" type="text" class="form-control" placeholder="DNI" value="{{ Input::old('dni', isset($hermano) ? $hermano->dni : null) }}">
                                            {{ $errors->first('dni', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Fecha de nacimiento</label>
                                        <div class="col-lg-5 {{ $errors->has('fecha_nacimiento') ? 'error' : '' }}">
                                            <input name="fecha_nacimiento" type="date" class="form-control" placeholder="dd/mm/aaaa" value="{{ Input::old('fecha_nacimiento', isset($hermano) ? date('Y-m-d', strtotime($hermano->fecha_nacimiento)) : null) }}">
                                            {{ $errors->first('fecha_nacimiento', '<span class="help-block">:message</span>') }}
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-2 control-label">Número de cuenta</label>
                                        <div class="col-lg-3 {{ $errors->has('ccc') ? 'error' : '' }}">
                                            <input name="ccc" type="text" class="form-control" placeholder="CCC"  value="{{ Input::old('ccc', isset($hermano) ? $hermano->ccc : null) }}">
                                            {{ $errors->first('ccc', '<span class="help-block">:message</span>') }}
                                        </div>

                                        <label class="col-lg-2 control-label">Teléfono fijo</label>
                                        <div class="col-lg-5 {{ $errors->has('tlf_fijo') ? 'error' : '' }}">
                                            <input name="tlf_fijo" type="text" class="form-control" placeholder="Teléfono fijo" value="{{ Input::old('tlf_fijo', isset($hermano) ? $hermano->tlf_fijo : null) }}">
                                            {{ $errors->first('tlf_fijo', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Teléfono móvil</label>
                                        <div class="col-lg-3 {{ $errors->has('tlf_movil') ? 'error' : '' }}">
                                            <input name="tlf_movil" type="text" class="form-control" placeholder="Teléfono móvil" value="{{ Input::old('tlf_movil', isset($hermano) ? $hermano->tlf_movil : null) }}">
                                            {{ $errors->first('tlf_movil', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Correo electrónico</label>
                                        <div class="col-lg-5 {{ $errors->has('email') ? 'error' : '' }}">
                                            <input name="email" type="text" class="form-control" placeholder="Correo electrónico" value="{{ Input::old('email', isset($hermano) ? $hermano->user->email : null) }}">
                                            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Dirección</label>
                                        <div class="col-lg-3 {{ $errors->has('direccion') ? 'error' : '' }}">
                                            <input name="direccion" type="text" class="form-control" placeholder="Dirección" value="{{ Input::old('direccion', isset($hermano) ? $hermano->direccion : null) }}">
                                            {{ $errors->first('direccion', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Población</label>
                                        <div class="col-lg-5 {{ $errors->has('poblacion') ? 'error' : '' }}">
                                            <input name="poblacion" type="text" class="form-control" placeholder="Población" value="{{ Input::old('poblacion', isset($hermano) ? $hermano->poblacion : null) }}">
                                            {{ $errors->first('poblacion', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Código postal</label>
                                        <div class="col-lg-3 {{ $errors->has('cp') ? 'error' : '' }}">
                                            <input name="cp" type="text" class="form-control" placeholder="Código postal" value="{{ Input::old('cp', isset($hermano) ? $hermano->cp : null) }}">
                                            {{ $errors->first('cp', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Provincia</label>
                                        <div class="col-lg-5 {{ $errors->has('provincia') ? 'error' : '' }}">
                                            <input name="provincia" type="text" class="form-control" placeholder="Provincia" value="{{ Input::old('provincia', isset($hermano) ? $hermano->provincia : null) }}">
                                            {{ $errors->first('provincia', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Usuario</label>
                                        <div class="col-lg-3">
                                            <input readonly="" type="text" class="form-control" placeholder="Usuario" value="{{$hermano->user->username}}">
                                        </div>
                                        <label class="col-lg-2 control-label">Contraseña</label>
                                        <div class="col-lg-5 {{ $errors->has('password') ? 'error' : '' }}">
                                            <input name="password" type="password" class="form-control" placeholder="Contraseña" value="{{ Input::old('password', isset($hermano) ? $hermano->user->password : null) }}">
                                            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Forma de pago</label>
                                        <div class="col-lg-3">
                                            <select name="tipo_pago" class="form-control">
                                                <option {{ $hermano->tipo_pago == 'anual' ? 'selected' : ''}} value="anual">Anual</option>
                                                <option {{ $hermano->tipo_pago == 'semestral' ? 'selected' : ''}} value="semestral">Semestral</option>
                                            </select>
                                        </div>
                                        <label class="col-lg-2 control-label">Fecha de alta</label>
                                        <div class="col-lg-5 {{ $errors->has('fecha_alta') ? 'error' : '' }}">
                                            <input name="fecha_alta" type="date" class="form-control" placeholder="dd/mm/aaaa" value="{{ Input::old('fecha_alta', isset($hermano) ? date('Y-m-d', strtotime($hermano->fecha_alta)) : null) }}">
                                            {{ $errors->first('fecha_alta', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Observaciones</label>
                                        <div class="col-lg-10">
                                            <textarea name="observaciones" class="form-control" rows="5" placeholder="Observaciones">{{HTML::decode($hermano->observaciones)}}</textarea>
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

                <div class="col-md-12">


                    <div class="widget wgreen">

                        <div class="widget-headrojo">
                            <div class="pull-left">Recibos cobrados</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <!--<a href="#" class="wclose"><i class="fa fa-times"></i></a>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="widget-content">
                            <div class="padd">

                                <!-- Table Page -->
                                <div class="page-tables">
                                    <!-- Table -->
                                    <div class="table-responsive">
                                        <table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Concepto</th>
                                                <th>Fecha de cobro</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            {{--*/ $recibos = Recibo::where('hermano_id','=',$hermano->id)->orderby('id','desc')->get() /*--}}
                                            @foreach($recibos as $recibo)
                                                <tr>
                                                    <td>{{$recibo->concepto}}</td>
                                                    <td>{{date('d/m/Y', strtotime($recibo->fecha_cobro))}}</td>
                                                    <td>{{$recibo->total}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Concepto</th>
                                                <th>Fecha de cobro</th>
                                                <th>Total</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
@stop
