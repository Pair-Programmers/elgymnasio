<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>El-Gymnasio | Services</title>

    <link href="{{asset('adminsite')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/style.css" rel="stylesheet">

    <link href="{{asset('adminsite')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <?=$sidebar; ?>

        <div id="page-wrapper" class="gray-bg">
            <?=$header; ?>            
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Employee Add</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Employee</a>
                        </li>
                        <li class="active">
                            <strong>Add</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="{{ URL::to('/update_employee') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-4">
                                        <input type="hidden" name="id" value="{{$vendor->id}}">
                                        <input type="text" class="form-control" name="name" value="{{$employee->name}}">
                                    </div>

                                    <label class="col-sm-2 control-label">Image</label>

                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" name="image_path" >
                                        <input type="hidden" name="image_path_temp" value="{{$employee->image_path}}">
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="phone" value="{{$employee->phone}}">
                                    </div>

                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Type</label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="type" required>
                                            @if ($employee->type == 'Trainer')
                                                <option value="Trainer" selected>Trainer</option>
                                                <option value="Cleaner">Cleaner</option>
                                                <option value="Accountant">Accountant</option>
                                            @elseif($employee->type == 'Cleaner')
                                                <option value="Trainer">Trainer</option>
                                                <option value="Cleaner" selected>Cleaner</option>
                                                <option value="Accountant">Accountant</option>
                                            @elseif($employee->type == 'Accountant')
                                                <option value="Trainer">Trainer</option>
                                                <option value="Cleaner">Cleaner</option>
                                                <option value="Accountant" selected>Accountant</option>
                                            @else
                                                <option value="Trainer">Trainer</option>
                                                <option value="Cleaner">Cleaner</option>
                                                <option value="Accountant">Accountant</option>
                                            @endif
                                            
                                        </select> 
                                    </div>
                                    

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Adress</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="adress" value="{{$employee->adress}}">
                                        {{-- <input type="hidden" class="form-control" name="group" value="vendor"> --}}
                                    </div>
                                    

                                    
                                </div>

                                

                                

                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br>
                
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div>

     <!-- Mainly scripts -->
    <script src="{{asset('adminsite')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('adminsite')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('adminsite')}}/js/inspinia.js"></script>
    <script src="{{asset('adminsite')}}/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="{{asset('adminsite')}}/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>

</body>

</html>
