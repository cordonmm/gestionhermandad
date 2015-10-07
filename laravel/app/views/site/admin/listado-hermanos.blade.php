@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Listado de hermanos</div>
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
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            {{--*/ $hermanos = Hermano::orderby('id','desc')->get() /*--}}
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
                                                    <td>
                                                        <a href="{{URL::to('gestionhdad/hermanos/'.$hermano->id.'/ficha/')}}"><button type="button" class="btn btn-sm btn-success">Ver</button></a>
                                                        <a href="{{URL::to('gestionhdad/hermanos/'.$hermano->id.'/baja/')}}"><button type="button" class="btn btn-sm btn-danger">Dar de baja</button></a>
                                                    </td>
                                                </tr>
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
