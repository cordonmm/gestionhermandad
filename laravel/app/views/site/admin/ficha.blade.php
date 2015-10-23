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
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <!-- ./ csrf token -->

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nombre</label>
                                        <div class="col-lg-3 {{{ $errors->has('nombre') ? 'error' : '' }}}">
                                            <input name="nombre" type="text" class="form-control" placeholder="Nombre" value="{{{ Input::old('nombre', isset($hermano) ? $hermano->nombre : null) }}}"">
                                            {{ $errors->first('nombre', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Apellidos</label>
                                        <div class="col-lg-5 {{{ $errors->has('apellidos') ? 'error' : '' }}}">
                                            <input name="apellidos" type="text" class="form-control" placeholder="Apellidos" value="{{{ Input::old('apellidos', isset($hermano) ? $hermano->apellidos : null) }}}"">
                                            {{ $errors->first('apellidos', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group {{{ $errors->has('titulo') ? 'error' : '' }}}">
                                        <label class="col-lg-2 control-label">DNI</label>
                                        <div class="col-lg-3 {{{ $errors->has('dni') ? 'error' : '' }}}">
                                            <input name="dni" readonly="" type="text" class="form-control" placeholder="DNI" value="{{{ Input::old('dni', isset($hermano) ? $hermano->dni : null) }}}"">
                                            {{ $errors->first('dni', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Fecha de nacimiento</label>
                                        <div class="col-lg-5 {{{ $errors->has('fecha_nacimiento') ? 'error' : '' }}}">
                                            <input name="fecha_nacimiento" type="date" class="form-control" placeholder="dd/mm/aaaa" value="{{{ Input::old('fecha_nacimiento', isset($hermano) ? date('Y-m-d', strtotime($hermano->fecha_nacimiento)) : null) }}}"">
                                            {{ $errors->first('fecha_nacimiento', '<span class="help-block">:message</span>') }}
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-2 control-label">Número de cuenta</label>
                                        <div class="col-lg-3 {{{ $errors->has('ccc') ? 'error' : '' }}}">
                                            <input name="ccc" type="text" class="form-control" placeholder="CCC"  value="{{{ Input::old('ccc', isset($hermano) ? $hermano->ccc : null) }}}"">
                                            {{ $errors->first('ccc', '<span class="help-block">:message</span>') }}
                                        </div>

                                        <label class="col-lg-2 control-label">Teléfono fijo</label>
                                        <div class="col-lg-5 {{{ $errors->has('tlf_fijo') ? 'error' : '' }}}">
                                            <input name="tlf_fijo" type="text" class="form-control" placeholder="Teléfono fijo" value="{{{ Input::old('tlf_fijo', isset($hermano) ? $hermano->tlf_fijo : null) }}}"">
                                            {{ $errors->first('tlf_fijo', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Teléfono móvil</label>
                                        <div class="col-lg-3 {{{ $errors->has('tlf_movil') ? 'error' : '' }}}">
                                            <input name="tlf_movil" type="text" class="form-control" placeholder="Teléfono móvil" value="{{{ Input::old('tlf_movil', isset($hermano) ? $hermano->tlf_movil : null) }}}"">
                                            {{ $errors->first('tlf_movil', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Correo electrónico</label>
                                        <div class="col-lg-5 {{{ $errors->has('email') ? 'error' : '' }}}">
                                            <input name="email" type="text" class="form-control" placeholder="Correo electrónico" value="{{{ Input::old('email', isset($hermano) ? $hermano->user->email : null) }}}"">
                                            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Dirección</label>
                                        <div class="col-lg-3 {{{ $errors->has('direccion') ? 'error' : '' }}}">
                                            <input name="direccion" type="text" class="form-control" placeholder="Dirección" value="{{{ Input::old('direccion', isset($hermano) ? $hermano->direccion : null) }}}"">
                                            {{ $errors->first('direccion', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Población</label>
                                        <div class="col-lg-5 {{{ $errors->has('poblacion') ? 'error' : '' }}}">
                                            <input name="poblacion" type="text" class="form-control" placeholder="Población" value="{{{ Input::old('poblacion', isset($hermano) ? $hermano->poblacion : null) }}}"">
                                            {{ $errors->first('poblacion', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Código postal</label>
                                        <div class="col-lg-3 {{{ $errors->has('cp') ? 'error' : '' }}}">
                                            <input name="cp" type="text" class="form-control" placeholder="Código postal" value="{{{ Input::old('cp', isset($hermano) ? $hermano->cp : null) }}}"">
                                            {{ $errors->first('cp', '<span class="help-block">:message</span>') }}
                                        </div>
                                        <label class="col-lg-2 control-label">Provincia</label>
                                        <div class="col-lg-5 {{{ $errors->has('provincia') ? 'error' : '' }}}">
                                            <input name="provincia" type="text" class="form-control" placeholder="Provincia" value="{{{ Input::old('provincia', isset($hermano) ? $hermano->provincia : null) }}}"">
                                            {{ $errors->first('provincia', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Usuario</label>
                                        <div class="col-lg-3">
                                            <input readonly="" type="text" class="form-control" placeholder="Usuario" value="{{$hermano->user->username}}">
                                        </div>
                                        <label class="col-lg-2 control-label">Contraseña</label>
                                        <div class="col-lg-5 {{{ $errors->has('password') ? 'error' : '' }}}">
                                            <input name="password" type="password" class="form-control" placeholder="Contraseña" value="{{{ Input::old('password', isset($hermano) ? $hermano->user->password : null) }}}"">
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
                                        <div class="col-lg-5 {{{ $errors->has('fecha_alta') ? 'error' : '' }}}">
                                            <input name="fecha_alta" type="date" class="form-control" placeholder="dd/mm/aaaa" value="{{{ Input::old('fecha_alta', isset($hermano) ? date('Y-m-d', strtotime($hermano->fecha_alta)) : null) }}}"">
                                            {{ $errors->first('fecha_alta', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    @if(Auth::user()->hasRole('admin'))
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Fecha último pago</label>
                                            <div class="col-lg-3">
                                                <input readonly="" type="text" class="form-control" placeholder="Usuario" value="{{date('d/m/Y', strtotime($hermano->pagado_hasta))}}">
                                            </div>
                                        </div>
                                    @endif

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

                {{--*/ $familiares = $hermano->parentescos /*--}}

                @if(count($familiares) != 0)
                    <div class="col-md-12">
                        <div class="widget wgreen">
                            <div class="widget-headverde">
                                <div class="pull-left">Familiares</div>
                                <div class="widget-icons pull-right">
                                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                    <!--<a href="#" class="wclose"><i class="fa fa-times"></i></a>-->
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget-content">
                                <div class="padd">
                                    <div class="page-tables">
                                        <div class="table-responsive">
                                            <table cellpadding="0" cellspacing="0" border="0" id="data-table-2" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Fecha nacimiento</th>
                                                    <th>Fecha alta</th>
                                                    <th>DNI</th>
                                                    <th>Pablación</th>
                                                    <th>Teléfono fijo</th>
                                                    <th>Teléfono Móvil</th>
                                                    <th>Parentesco</th>
                                                    <th>Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($familiares as $familiar)
                                                    <tr>
                                                        <td>{{$familiar->nombre}}</td>
                                                        <td>{{$familiar->apellidos}}</td>
                                                        <td>{{date('d/m/Y', strtotime($familiar->fecha_nacimiento))}}</td>
                                                        <td>{{date('d/m/Y', strtotime($familiar->fecha_alta))}}</td>
                                                        <td>{{$familiar->dni}}</td>
                                                        <td>{{$familiar->poblacion}}</td>
                                                        <td>{{$familiar->tlf_fijo}}</td>
                                                        <td>{{$familiar->tlf_movil}}</td>
                                                        <td>{{ucfirst($familiar->pivot->parentesco)}}</td>
                                                        <td>
                                                            <button onclick="window.location.href='{{URL::to('gestionhdad/hermanos/'.$familiar->id.'/ficha/')}}'" type="button" class="btn btn-sm btn-success">Ver</button>
                                                            <button type="button" data-toggle="modal" data-target="#elimina" class="btn btn-sm btn-danger">Eliminar parentesco</button>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="elimina" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">¿Está seguro?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Va a eliminar un parentesco de {{"<b>".$hermano->nombre." ".$hermano->apellidos."</b> con <b>".$familiar->nombre." ".$familiar->apellidos."</b>"}}.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button onclick="window.location.href='{{URL::to('gestionhdad/parentescos/'.$familiar->id.'/'.$hermano->id.'/eliminar/')}}'" type="button" class="btn btn-sm btn-success" data-dismiss="modal">Sí</button>

                                                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Fecha nacimiento</th>
                                                    <th>Fecha alta</th>
                                                    <th>DNI</th>
                                                    <th>Pablación</th>
                                                    <th>Teléfono fijo</th>
                                                    <th>Teléfono Móvil</th>
                                                    <th>Parentesco</th>
                                                    <th>Acciones</th>
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
                @endif

                <div class="col-lg-12 col-lg-6">
                    <button type="button" data-toggle="modal" data-target="#alta{{$hermano->id}}" class="btn btn-sm btn-success">Añadir parentesco</button>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="alta{{$hermano->id}}" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Nuevo parentesco</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="post" action="{{ URL::to('gestionhdad/parentescos/' . $hermano->id . '/crear')}}" >

                                    <label class="control-label">{{$hermano->nombre}} {{$hermano->apellidos}} es </label>

                                    <select name="parentesco" class="form-control">
                                        <option value="padre/madre">Padre/Madre de </option>
                                        <option value="hijo">Hijo de </option>
                                    </select>

                                    <br>

                                    <select style="width: 100%;" id="hermano_parentesco" name="hermano_parentesco" class="form-control">
                                        @foreach(Hermano::where('id', '<>', $hermano->id)->whereNotIn('id', $hermano->parentescos->lists('id'))->get() as $aux)
                                            <option value="{{$aux->id}}">{{$aux->num_hermano}} - {{$aux->nombre}} {{$aux->apellidos}}</option>
                                        @endforeach
                                    </select>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-success">Guardar</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>


                <br>

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
                                <div class="page-tables">
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

    <script type="text/javascript">
        $('#hermano_parentesco').select2({
            placeholder: "Selecciona un hermano/a"
        });

    </script>
@stop
