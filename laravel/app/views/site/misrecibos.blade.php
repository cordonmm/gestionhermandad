@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left">Mis recibos</div>
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
                                                <th>Nº</th>
                                                <th>Descripción</th>
                                                <th>Fecha emisión</th>
                                                <th>Total</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Agosto 2015</td>
                                                <td>01/08/2015</td>
                                                <td>45,50</td>
                                                <td>Pagado</td>
                                                <td><button disabled="" type="button" class="btn btn-sm btn-danger">Pagar</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Septiembre 2015</td>
                                                <td>01/09/2015</td>
                                                <td>45,50</td>
                                                <td>Pendiente</td>
                                                <td><button type="button" class="btn btn-sm btn-danger">Pagar</button></td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Descripción</th>
                                                <th>Fecha emisión</th>
                                                <th>Total</th>
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
                            <!-- Footer goes here -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
