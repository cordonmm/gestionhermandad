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
                                                <th>Concepto</th>
                                                <th>Fecha emisión</th>
                                                <th>Total</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(Recibo::where('hermano_id','=',Auth::user()->id)->orderby('fecha_cobro','desc')->get() as $recibo)
                                                <tr>
                                                    <td>{{$recibo->id}}</td>
                                                    <td>{{$recibo->concepto}}</td>
                                                    <td>{{date('d/m/Y',strtotime($recibo->fecha_cobro))}}</td>
                                                    <td>{{$recibo->total}}</td>
                                                    <td>Pagado</td>
                                                    <td><button disabled="" type="button" class="btn btn-sm btn-danger">Pagar</button></td>
                                                </tr>
                                            @endforeach

                                            {{--*/ $recibos= Hermano::find(Auth::user()->id)->recibospendientes() /*--}}
                                            {{--*/$max = Recibo::where('hermano_id','=',Auth::user()->id)->max('id')/*--}}

                                            @for($i = 1; $i <= $recibos ; $i = $i+1 )
                                                <tr>
                                                    <td>{{$max + $i}}</td>
                                                    {{--*/ $tipopago = Hermano::find(Auth::user()->id)->tipo_pago /*--}}
                                                    {{--*/ $cuantia = 0 /*--}}

                                                    @if($tipopago == 'anual')
                                                        <td>Año {{date('Y')}}</td>
                                                        {{--*/ $cuantia = Confighdad::first()->cuota /*--}}
                                                    @endif
                                                    @if($tipopago == 'semestral')
                                                        <td>{{(2-$recibos)+ $i}}º semestre</td>
                                                        {{--*/ $cuantia = Confighdad::first()->cuota / 2 /*--}}
                                                    @endif
                                                    @if($tipopago == 'trimestral')
                                                        <td>{{4-Hermano::find(Auth::user()->id)->recibospendientes()+ $i}}º trimestre</td>
                                                        {{--*/ $cuantia = Confighdad::first()->cuota/4 /*--}}
                                                    @endif
                                                    @if($tipopago == 'mensual')
                                                        <td>{{12-Hermano::find(Auth::user()->id)->recibospendientes()+ $i}}º mes</td>
                                                        {{--*/ $cuantia = Confighdad::first()->cuota/12 /*--}}
                                                    @endif


                                                    <td>---</td>
                                                    <td>{{$cuantia}}</td>
                                                    <td>Pendiente</td>
                                                    @if($i ==  1)
                                                        <td><button enable="" type="button" onclick="window.location.href = '{{URL::to('gestionhdad/pagarRecibo')}}';" class="btn btn-sm btn-danger">Pagar</button></td>
                                                    @else
                                                        <td><button disabled="" type="button" class="btn btn-sm btn-danger">Pagar</button></td>
                                                    @endif

                                                </tr>

                                            @endfor

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
