@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">
                <div class="col-md-12">

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">LISTADO DE INSIGNIAS RESERVADAS | SEMANA SANTA DE {{date('Y')}}</div>
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
                                                <th>Hermano</th>
                                                <th>Nº Hermano</th>
                                                <th>Antigüedad</th>
                                                <th>Insignia</th>
                                                <th>Fecha solicitud</th>
                                                <th>Prioridad</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($insignias as $insignia)
                                                <tr>
                                                    <td>{{$insignia->nombre}} {{$insignia->apellidos}}</td>
                                                    <td>{{$insignia->num_hermano}}</td>
                                                    <td>{{date('d/m/Y', strtotime($insignia->fecha_alta))}}</td>
                                                    <td>{{$insignia->descripcion}}</td>
                                                    <td>{{date('d/m/Y', strtotime($insignia->fecha_solicitud))}}</td>
                                                    <td>{{$insignia->prioridad}}</td>
                                                    <td>{{ucfirst($insignia->estado)}}</td>
                                                    @if($insignia->estado == 'asignada')
                                                        <td>
                                                            <button type="button" data-toggle="modal" data-target="#desasignar{{$insignia->ri_id}}" class="btn btn-sm btn-warning">Desasignar</button>
                                                            <button type="button" data-toggle="modal" data-target="#cancelar{{$insignia->ri_id}}" class="btn btn-sm btn-danger">Cancelar reserva</button>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <button type="button" data-toggle="modal" data-target="#cancelar{{$insignia->ri_id}}" class="btn btn-sm btn-danger">Cancelar reserva</button>
                                                        </td>
                                                    @endif
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="cancelar{{$insignia->ri_id}}" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">¿Está seguro?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Va a cancelar la reserva de insignia número {{$insignia->ri_id}}, realizada por el hermano/a <b>{{$insignia->nombre}} {{$insignia->apellidos}}</b>.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button onclick="window.location.href='{{URL::to('gestionhdad/insignia-reservada/'.$insignia->ri_id.'/cancelar/')}}'" type="button" class="btn btn-sm btn-success" data-dismiss="modal">Sí</button>

                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="asignar{{$insignia->ri_id}}" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">¿Está seguro?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Va a asignar la reserva de insignia número {{$insignia->ri_id}} al hermano/a {{$insignia->nombre}} {{$insignia->apellidos}}.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button onclick="window.location.href='{{URL::to('gestionhdad/insignia-reservada/'.$insignia->ri_id.'/asignar/')}}'" type="button" class="btn btn-sm btn-success" data-dismiss="modal">Sí</button>

                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="desasignar{{$insignia->ri_id}}" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">¿Está seguro?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Va a desasignar la reserva de insignia número {{$insignia->ri_id}} que tenía realizada el hermano/a {{$insignia->nombre}} {{$insignia->apellidos}}.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button onclick="window.location.href='{{URL::to('gestionhdad/insignia-reservada/'.$insignia->ri_id.'/desasignar/')}}'" type="button" class="btn btn-sm btn-success" data-dismiss="modal">Sí</button>

                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Hermano</th>
                                                <th>Nº Hermano</th>
                                                <th>Antigüedad</th>
                                                <th>Insignia</th>
                                                <th>Fecha solicitud</th>
                                                <th>Prioridad</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="widget-foot">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
