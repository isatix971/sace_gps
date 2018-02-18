<!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <!--tiles start-->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-red">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="180" data-speed="2500"> </h1>
                                <p>New Users</p>
                            </div>
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-turquoise">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="56" data-speed="2500"> </h1>
                                <p>New Comments</p>
                            </div>
                            <div class="icon"><i class="fa fa-comments"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-blue">
                            <div class="content">
                                <h1 class="text-left timer" data-from="0" data-to="32" data-speed="2500"> </h1>
                                <p>New Messages</p>
                            </div>
                            <div class="icon"><i class="fa fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="dashboard-tile detail tile-purple">
                            <div class="content">
                                <h1 class="text-left timer" data-to="105" data-speed="2500"> </h1>
                                <p>New Sales</p>
                            </div>
                            <div class="icon"><i class="fa fa-bar-chart-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!--tiles end-->
                <!--dashboard charts and map start-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sales for 2014</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div id="sales-chart" style="height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Office locations</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="map" id="map" style="height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--dashboard charts and map end-->
                <!--ToDo start-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">To do list</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="new-todo" type="text" class="form-control" placeholder="What needs to be done?">
                                            <section id='main'>
                                                <ul id='todo-list'></ul>
                                            </section>
                                        </div>
                                        <div class="form-group">
                                            <button id="todo-enter" class="btn btn-primary pull-right">Submit</button>
                                            <div id='todo-count'></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Server Status</h3>
                                        <div class="actions pull-right">
                                            <i class="fa fa-chevron-down"></i>
                                            <i class="fa fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="panel-body">

                                        <span class="sublabel">Memory Usage</span>
                                        <div class="progress progress-striped">
                                            <div class="progress-bar progress-bar-info" style="width: 20%">20%</div>
                                        </div>
                                        <!-- progress -->

                                        <span class="sublabel">CPU Usage </span>
                                        <div class="progress progress-striped">
                                            <div class="progress-bar progress-bar-default" style="width: 60%">60%</div>
                                        </div>
                                        <!-- progress -->

                                        <span class="sublabel">Disk Usage </span>
                                        <div class="progress progress-striped">
                                            <div class="progress-bar progress-bar-primary" style="width: 80%">80%</div>
                                        </div>
                                        <!-- progress -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-solid-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Weather</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="text-center small-thin uppercase">Today</h3>
                                        <div class="text-center">
                                            <canvas id="clear-day" width="110" height="110"></canvas>
                                            <h4>62°C</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="text-center small-thin uppercase">Tonight</h3>
                                        <div class="text-center">
                                            <canvas id="partly-cloudy-night" width="110" height="110"></canvas>
                                            <h4>44°C</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h6 class="text-center small-thin uppercase">Mon</h6>
                                        <div class="text-center">
                                            <canvas id="partly-cloudy-day" width="32" height="32"></canvas>
                                            <span>48°C</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <h6 class="text-center small-thin uppercase">Mon</h6>
                                        <div class="text-center">
                                            <canvas id="rain" width="32" height="32"></canvas>
                                            <span>39°C</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <h6 class="text-center small-thin uppercase">Tue</h6>
                                        <div class="text-center">
                                            <canvas id="sleet" width="32" height="32"></canvas>
                                            <span>32°C</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <h6 class="text-center small-thin uppercase">Wed</h6>
                                        <div class="text-center">
                                            <canvas id="snow" width="32" height="32"></canvas>
                                            <span>28°C</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <h6 class="text-center small-thin uppercase">Thu</h6>
                                        <div class="text-center">
                                            <canvas id="wind" width="32" height="32"></canvas>
                                            <span>40°C</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <h6 class="text-center small-thin uppercase">Fri</h6>
                                        <div class="text-center">
                                            <canvas id="fog" width="32" height="32"></canvas>
                                            <span>42°C</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>Browser Summary</h4>
                                <div id="donut-example"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--ToDo end-->
            </section>
        </section>
    </div>
    <!--main content end-->