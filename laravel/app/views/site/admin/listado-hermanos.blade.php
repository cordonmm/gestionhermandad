@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Listado de hermanos ACTIVOS</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
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
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Fecha nacimiento</th>
                                                <th>Fecha alta</th>
                                                <th>DNI</th>
                                                <th>Pablación</th>
                                                <th>Teléfono fijo</th>
                                                <th>Teléfono Móvil</th>
                                                <th>Activo</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            {{--*/ $hermanos = Hermano::where('activo', '=', 1)->orderby('id','desc')->get() /*--}}
                                            @foreach($hermanos as $hermano)
                                                <tr>
                                                    <td>{{$hermano->nombre}}</td>
                                                    <td>{{$hermano->apellidos}}</td>
                                                    <td>{{date('d/m/Y', strtotime($hermano->fecha_nacimiento))}}</td>
                                                    <td>{{date('d/m/Y', strtotime($hermano->fecha_alta))}}</td>
                                                    <td>{{$hermano->dni}}</td>
                                                    <td>{{$hermano->poblacion}}</td>
                                                    <td>{{$hermano->tlf_fijo}}</td>
                                                    <td>{{$hermano->tlf_movil}}</td>
                                                    <td>SÍ</td>
                                                    <td>
                                                        <button onclick="window.location.href='{{URL::to('gestionhdad/hermanos/'.$hermano->id.'/ficha/')}}'" type="button" class="btn btn-sm btn-success">Ver</button>
                                                        <button type="button" data-toggle="modal" data-target="#baja{{$hermano->id}}" class="btn btn-sm btn-danger">Dar de baja</button>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="baja{{$hermano->id}}" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">¿Está seguro?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Va a dar de baja al hermano número {{$hermano->num_hermano}}.</p>
                                                                <p>Si lo da de baja, éste quedará desactivado para todas las funciones de las que dispone este sitio.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button onclick="window.location.href='{{URL::to('gestionhdad/hermanos/'.$hermano->id.'/baja/')}}'" type="button" class="btn btn-sm btn-success" data-dismiss="modal">Sí</button>

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
                                                <th>Activo</th>
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

            </div>

            <!-- LISTADO DE HERMANOS NO ACTIVOS -->

            {{--*/ $hermanos = Hermano::where('activo', '=', 0)->orderby('id','desc')->get() /*--}}

            @if(count($hermanos) != 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-headrojo">
                            <div class="pull-left">Listado de hermanos dados de BAJA</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <div class="padd">
                                <div class="page-tables">
                                    <!-- Table -->
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
                                                <th>Activo</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($hermanos as $hermano)
                                                    <tr>
                                                        <td>{{$hermano->nombre}}</td>
                                                        <td>{{$hermano->apellidos}}</td>
                                                        <td>{{date('d/m/Y', strtotime($hermano->fecha_nacimiento))}}</td>
                                                        <td>{{date('d/m/Y', strtotime($hermano->fecha_alta))}}</td>
                                                        <td>{{$hermano->dni}}</td>
                                                        <td>{{$hermano->poblacion}}</td>
                                                        <td>{{$hermano->tlf_fijo}}</td>
                                                        <td>{{$hermano->tlf_movil}}</td>
                                                        <td>NO</td>
                                                        <td>
                                                            <button onclick="window.location.href='{{URL::to('gestionhdad/hermanos/'.$hermano->id.'/ficha/')}}'" type="button" class="btn btn-sm btn-success">Ver</button>
                                                            <button type="button" data-toggle="modal" data-target="#alta{{$hermano->id}}" class="btn btn-sm btn-warning">Dar de alta</button>
                                                        </td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="alta{{$hermano->id}}" role="dialog">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">¿Está seguro?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Va a dar de alta de nuevo al hermano número {{$hermano->num_hermano}}.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button onclick="window.location.href='{{URL::to('gestionhdad/hermanos/'.$hermano->id.'/alta/')}}'" type="button" class="btn btn-sm btn-success" data-dismiss="modal">Sí</button>

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
                                                <th>Activo</th>
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
        </div>
        @endif
    </div>

@stop
