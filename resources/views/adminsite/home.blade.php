<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard v.2</title>

    <link href="{{asset('adminsite')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('adminsite')}}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="{{asset('adminsite')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <?=$sidebar; ?>

        <div id="page-wrapper" class="gray-bg">
            <?=$header; ?>
            <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Registered Members</h5>
                            </div>
                            <a href="{{URL::to('member_list', ['query'=>'Registered'])}}">
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['registered_members']}}</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total Registered</small>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-info pull-right">Annual</span> --}}
                                <h5>Active Members</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['active_members']}}</h1>
                                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                                <small>Total Active (Regular Member)</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-primary pull-right">Today</span> --}}
                                <h5>Inactive Members</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['in_active_members']}}</h1>
                                {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                                <small>Total Inactives (absent from a month)</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-danger pull-right">Low value</span> --}}
                                <h5>Archive Members</h5>
                            </div>
                            <a href="{{URL::to('member_list', ['query'=>'Archive Members'])}}">
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['archive_members']}}</h1>
                                {{-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> --}}
                                <small>Total Removed From GYM</small>
                            </div>
                            </a>
                        </div>
                    </div>


                    {{-- Fees --}}


                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Paid Fees</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['paid_fees']}}</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-info pull-right">Annual</span> --}}
                                <h5>Upcoming Fees</h5>
                            </div>

                            <a href="{{URL::to('member_list', ['query'=>'Upcoming Fees'])}}">
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['upcoming_fees']}}</h1>
                                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                                <small>Total Members</small>
                            </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-primary pull-right">Today</span> --}}
                                <h5>Pending Fees</h5>
                            </div>
                            <a href="{{URL::to('member_list', ['query'=>'Pending Fees'])}}">
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['unpaid_fees']}}</h1>
                                {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                                <small>New visits</small>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-primary pull-right">Today</span> --}}
                                <h5>Members With Trainer</h5>
                            </div>
                            <a href="{{URL::to('member_list', ['query'=>'Members With Trainer'])}}">
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['members_with_trainer']}}</h1>
                                {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                                <small>Total</small>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Basic Members</h5>
                            </div>
                            <a href="{{URL::to('member_list', ['query'=>'Basic Members'])}}">
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['members_with_basic_p']}}</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total Members with Basic Package</small>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Paltinum Members</h5>
                            </div>
                            <a href="{{URL::to('member_list', ['query'=>'Platinum Members'])}}">
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['members_with_platinum_p']}}</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total Members with Paltinum Package</small>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Gold Members</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">{{$data['members_with_gold_p']}}</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total Members with Gold Package</small>
                            </div>
                        </div>
                    </div>


                    {{-- attendance --}}


                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-success pull-right">Monthly</span> --}}
                                <h5>Members Present</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">--</h1>
                                {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                                <small>Total Present Members at GYM</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <span class="label label-info pull-right">Annual</span> --}}
                                <h5>Members Absent </h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">--</h1>
                                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                                <small>Total Present Members at GYM</small>
                            </div>
                        </div>
                    </div>

        </div>

        {{-- table start --}}
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>List of Newly Registered Member Today ..</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>No.</th>
                {{-- <th>Image</th> --}}
                <th>Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Timing</th>
                <th>Trainer</th>
                <th>Package</th>
                <th>Ends In</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                $counter = 1;
            @endphp

            @foreach($members as $member)
                <tr class="gradeX">
                    <td>{{$counter}}</td>
                    {{-- <td><img src="{{asset('images/members')}}/male_avatar.png" alt="male picture" width="40" height="40"> </td> --}}
                    <td class="center">{{$member->name}}</td>
                    <td class="center">{{$member->phone}}</td>
                    <td class="center">{{$member->gender}}</td>
                    <td class="center">{{$member->timing}}</td>
                    <td class="center">
                        @if($member->hire_trainer == '1')
                            $member->trainer_name
                        @else
                            No
                        @endif
                    </td>
                    <td class="center">{{$member->package_name}} ({{$member->package_months}} Month)</td>
                    <td class="center">{{round((strtotime($member->package_expire_at)-strtotime(date('Y-m-d')))/86400)}} Days</td>
                    <td>
                        <a href="{{ url('/display_edit_member', ['id' => $member->id]) }}">
                            <small class="label label-warning"><i class="fa"></i>Edit</small>
                        </a>
                        <a href="{{ url('/display_invoice_member', ['id' => $member->id]) }}">
                            <small class="label label-primary"><i class="fa"></i>View</small>
                        </a>
                        <a href="{{ url('/delete_member', ['id' => $member->id]) }}">
                            <small class="label label-danger"><i class="fa"></i>Delete</small>
                        </a>

                    </td>
                </tr>

                @php
                    $counter = $counter + 1;
                @endphp
            @endforeach


            </tbody>
            <tfoot>
            <tr>
                <th>No.</th>
                {{-- <th>Image</th> --}}
                <th>Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Timing</th>
                <th>Trainer</th>
                <th>Package</th>
                <th>Ends In</th>
                <th>Action</th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
        {{-- table end --}}





                </div>
        <?=$footer; ?>
        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('adminsite')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('adminsite')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="{{asset('adminsite')}}/js/plugins/flot/jquery.flot.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="{{asset('adminsite')}}/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="{{asset('adminsite')}}/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('adminsite')}}/js/inspinia.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="{{asset('adminsite')}}/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="{{asset('adminsite')}}/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="{{asset('adminsite')}}/js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="{{asset('adminsite')}}/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('adminsite')}}/js/demo/sparkline-demo.js"></script>

    <script src="{{asset('adminsite')}}/js/plugins/dataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>
</html>
