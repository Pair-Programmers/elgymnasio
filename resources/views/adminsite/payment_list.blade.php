<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Data Tables</title>

    <link href="{{ asset('adminsite') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('adminsite') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('adminsite') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="{{ asset('adminsite') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('adminsite') }}/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?= $sidebar ?>


        <div id="page-wrapper" class="gray-bg">
            <?= $header ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>List of Member</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Members</a>
                        </li>
                        <li class="active">
                            <strong>List</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
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
                                <form method="post" class="form-horizontal" action="{{route('payment.show_search_list')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Start</label>

                                        <div class="col-sm-2">
                                            <input type="date" class="form-control" name="start_date" value="<?php echo date('Y-m-01'); ?>" required>

                                            {{-- <select class="form-control" name="account_id" required>
                                                <option value="All">All</option>
                                                <option value="2021">2021</option>
                                                <option value="2021">2022</option>
                                            </select> --}}
                                        </div>

                                        <label class="col-sm-1 control-label">End</label>

                                        <div class="col-sm-2">
                                            <input type="date" class="form-control" name="end_date" value="<?php echo date('Y-m-d'); ?>" required>
                                            {{-- <select class="form-control" name="account_id" required>
                                                <option value="All">All</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select> --}}
                                        </div>

                                        <div class="col-sm-2">

                                            <button class="btn btn-primary" type="submit">Search</button>

                                        </div>
                                    </div>



                                    <div class="ibox-content">
                                        <h1 style="color: rgb(97, 97, 219)">
                                            <small>Total &nbsp;&nbsp;&nbsp;&nbsp;</small>{{$totalAmount}} <small style="color: rgb(97, 97, 219)">Rs</small>
                                        </h1>

                                    </div>

                                </form>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>All the Packages are listed here..</h5>
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
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Member Name</th>
                                                <th>Ammount</th>
                                                <th>Payment Type</th>
                                                <th>Payment Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $counter = 1;
                                            @endphp

                                            @foreach ($payments as $payment)
                                                <tr class="gradeX">
                                                    <td>{{ $counter }}</td>
                                                    {{-- <td><img src="{{asset('images/members')}}/male_avatar.png" alt="male picture" width="40" height="40"> </td> --}}
                                                    <td class="center">@isset($payment->member)
                                                        {{ $payment->member->name }} @endisset</td>
                                                    <td class="center">{{ $payment->amount }}</td>
                                                    <td class="center">{{ $payment->type }}</td>
                                                    <td class="center">{{ $payment->date }}</td>

                                                </tr>

                                                @php
                                                    $counter = $counter + 1;
                                                @endphp
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Member Name</th>
                                                <th>Ammount</th>
                                                <th>Payment Type</th>
                                                <th>Payment Date</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= $footer ?>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="{{ asset('adminsite') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('adminsite') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('adminsite') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('adminsite') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('adminsite') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="{{ asset('adminsite') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('adminsite') }}/js/inspinia.js"></script>
    <script src="{{ asset('adminsite') }}/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
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
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function(sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function(value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"
            ]);

        }
    </script>

</body>

</html>
