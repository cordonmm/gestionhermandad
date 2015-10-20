@extends('site.layouts.default')

@section('content')
    <div class="matter">
        <div class="container">
            @include('notifications')
            <div class="row">

                <div class="col-md-12">
                    <!-- List starts -->
                    <ul class="today-datas">
                        <!-- List #1 -->
                        <li>
                            <!-- Graph -->
                            <div><span id="todayspark1" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                            <!-- Text -->
                            <div class="datas-text">12,000 visitors/day</div>
                        </li>
                        <li>
                            <div><span id="todayspark2" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                            <div class="datas-text">30,000 Pageviews</div>
                        </li>
                        <li>
                            <div><span id="todayspark3" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                            <div class="datas-text">15.66% Bounce Rate</div>
                        </li>
                        <li>
                            <div><span id="todayspark4" class="spark"><canvas width="77" height="30" style="display: inline-block; width: 77px; height: 30px; vertical-align: top;"></canvas></span></div>
                            <div class="datas-text">$12,000 Revenue/Day</div>
                        </li>
                    </ul>
                </div>

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
