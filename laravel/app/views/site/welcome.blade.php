@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">

                <div class="col-md-12">
                    <!-- Widget -->
                    <div class="widget">
                        <!-- Widget title -->
                        <div class="widget-head">
                            <div class="pull-left">Comentarios recientes</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <!-- Widget content -->
                            <div class="padd">

                                <ul class="recent">


                                    <li>

                                        <div class="recent-content">
                                            <div class="recent-meta">Posted on 25/1/2120 by Ashok</div>
                                            <div>Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </li>



                                    <li>

                                        <div class="recent-content">
                                            <div class="recent-meta">Posted on 25/1/2120 by Ashok</div>
                                            <div>Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </li>



                                    <li>

                                        <div class="recent-content">
                                            <div class="recent-meta">Posted on 25/1/2120 by Ashok</div>
                                            <div>Vivamus diam elit diam, consectetur fermentum sed dapibus eget, Vivamus consectetur dapibus adipiscing elit.
                                            </div>



                                            <div class="clearfix"></div>
                                        </div>
                                    </li>


                                </ul>

                            </div>
                            <!-- Widget footer -->
                            <div class="widget-foot">


                                <ul class="pagination pagination-sm pull-right">
                                    <li><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>

                                <div class="clearfix"></div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

            </div>

        </div>
    </div>
@stop
