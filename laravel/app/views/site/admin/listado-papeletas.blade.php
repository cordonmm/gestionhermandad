@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">LISTADO DE PAPELETAS DE SITIO | SEMANA SANTA DE {{date('Y')}}</div>
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
                                                <th>Tipo de papeleta</th>
                                                <th>Insignia</th>
                                                <th>Fecha solicitud</th>
                                                <th>Donativo</th>
                                                <th>Observaciones</th>
                                                <th>Recogida</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @foreach($papeletas as $papeleta)
                                                <tr>
                                                    <td>{{$papeleta->nombre}} {{$papeleta->apellidos}}</td>
                                                    <td>{{$papeleta->num_hermano}}</td>
                                                    <td>{{date('d/m/Y', strtotime($papeleta->fecha_alta))}}</td>
                                                    <td>{{$papeleta->tpdescrip}}</td>
                                                    <td>{{$papeleta->idescrip}}</td>
                                                    <td>{{date('d/m/Y', strtotime($papeleta->fecha_solicitud))}}</td>
                                                    <td>{{$papeleta->donativo}}</td>
                                                    <td>{{$papeleta->observaciones}}</td>

                                                    @if($papeleta->recogida == 1)
                                                        <td>Sí</td>
                                                        <td>
                                                            <button disabled type="button" data-toggle="modal" data-target="#recoge{{$papeleta->id_papeleta}}" class="btn btn-sm btn-success">Marcar como recogida</button>
                                                            <button type="button" data-toggle="modal" data-target="#cancela{{$papeleta->id_papeleta}}" class="btn btn-sm btn-danger">Cancelar</button>
                                                        </td>
                                                    @else
                                                        <td>No</td>
                                                        <td>
                                                            <button type="button" data-toggle="modal" data-target="#recoge{{$papeleta->id_papeleta}}" class="btn btn-sm btn-success">Marcar como recogida</button>
                                                            <button type="button" data-toggle="modal" data-target="#cancela{{$papeleta->id_papeleta}}" class="btn btn-sm btn-danger">Cancelar</button>
                                                        </td>
                                                    @endif

                                                </tr>


                                                <!-- Modal -->
                                                <div class="modal fade" id="cancela{{$papeleta->id_papeleta}}" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">¿Está seguro?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Va a cancelar la papeleta número {{$papeleta->id_papeleta}}.</p>
                                                                <p>Si cancela esta papeleta de sitio, el hermano correspondiente querdará sin sitio en la cofradía.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button onclick="window.location.href='{{URL::to('gestionhdad/'.$papeleta->id_papeleta.'/cancelar-papeleta/')}}'" type="button" class="btn btn-sm btn-success" data-dismiss="modal">Sí</button>

                                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="recoge{{$papeleta->id_papeleta}}" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">¿Está seguro?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Va a marcar la papeleta número {{$papeleta->id_papeleta}} como recogida.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button onclick="window.location.href='{{URL::to('gestionhdad/'.$papeleta->id_papeleta.'/recogida/')}}'" type="button" class="btn btn-sm btn-success" data-dismiss="modal">Sí</button>

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
                                                <th>Tipo de papeleta</th>
                                                <th>Insignia</th>
                                                <th>Fecha solicitud</th>
                                                <th>Donativo</th>
                                                <th>Observaciones</th>
                                                <th>Recogida</th>
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

            <div class="row">

                {{--*/ $configuracion = Confighdad::first() /*--}}
                {{--*/ $hoy = date('Y-m-d') /*--}}
                @if($hoy > $configuracion->fecha_fin_papeletas)
                <div class="col-md-12">
                        <div class="widget-content">
                            <div class="padd">
                                <!-- Form starts.  -->
                                <form class="form-horizontal" method="post" action="{{ URL::to('gestionhdad/insignias/crear') }}" autocomplete="off">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <!-- ./ csrf token -->

                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-sm btn-danger">Calcular tramos temporales</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
                @endif

            </div>




        </div>
    </div>
@stop
