@extends('site.layouts.default')

@section('content')
    <style>
        .priceRangeInfo{
            position: relative;
            height: 30px;
            margin-top: 60px;
        }
        .priceRangeInfo label{
            position: absolute;
            top: -30px;
            left: 10px;
        }                            /* moves label field */
        .priceRangeInfo #buying_slider_min{
            top: -40px;
            position: absolute;
            left: 100px;

        }       /* moves first input field */
        .priceRangeInfo #buying_slider_max{
            top: -40px;
            position: absolute;
            left: 170px;
        }      /* move second input field */
        .priceRangeInfo div.ui-slider{
            position: absolute;
        }                   /* move both sliders - adressing 1st slider with CSS is hard */
        .priceRangeInfo div:last-child{
            position: absolute;
            left: 0px;
        }
    </style>
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">

                <div class="col-md-12">


                    <div class="widget wgreen">

                        <div class="widget-head">
                            <div class="pull-left">Realiza un donativo</div>
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
                                <form class="form-horizontal" method="post" action="{{ URL::to('gestionhdad/donativo/create') }}" autocomplete="off">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <!-- ./ csrf token -->

                                    <div class="form-group">
                                        <label for="amount" class="col-lg-2 control-label">Cantidad</label>
                                        <input name="cantidad" type="text" id="amount" readonly style="border:0; color:#D31B1B; font-weight:bold; font-size: 20px; background-color: transparent;">
                                        <div class="col-lg-10">
                                            <div id="slider-range-min"></div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Comentario</label>
                                        <div class="col-lg-10">
                                            <textarea name="observaciones" class="form-control" rows="5" placeholder="Comenta tu donación si lo crees oportuno"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-6">
                                            <button type="submit" class="btn btn-sm btn-danger">Donar</button>
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

    <script>
        $(function() {
            $( "#slider-range-min" ).slider({
                range: "min",
                value: 25,
                min: 1,
                max: 1000,
                slide: function(event, ui) {
                    $( "#amount" ).val( ui.value + " €");
                }
            });
            $( "#amount" ).val( $( "#slider-range-min" ).slider( "value" ) + " €");
        });
    </script>
@stop