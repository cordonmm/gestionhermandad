@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Listado de insignias</div>
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
                                                <th>Paso</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            {{--*/ $insignias = Insignia::orderby('id','desc')->get() /*--}}
                                            @foreach($insignias as $insignia)
                                                <tr>
                                                    <td>{{$insignia->paso->descripcion}}</td>
                                                    <td>{{$insignia->descripcion}}</td>
                                                    <td>{{$insignia->cantidad}}</td>
                                                    <td><a href="{{URL::to('gestionhdad/insignias/'.$insignia->id.'/ficha/')}}"><button type="button" class="btn btn-sm btn-success">Editar</button></a></td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Paso</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
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