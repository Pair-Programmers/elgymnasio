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
                    <h2>Edit Package</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Package</a>
                        </li>
                        <li class="active">
                            <strong>Edit</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="{{ URL::to('/update_package') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-4">
                                        <input type="hidden" name="id" value="{{$package->id}}">
                                        <input type="text" class="form-control" name="name" value="{{$package->name}}">
                                    </div>


                                    
                                </div>

                                <div class="form-group">
                                    

                                    <label class="col-sm-2 control-label">Price</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="price" value="{{$package->price}}">
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Valid Month</label>

                                    <div class="col-sm-4">
                                        @php
                                            $monhths = [['value'=>'1', 'text'=>'1 Month'], ['value'=>'3', 'text'=>'3 Month'], ['value'=>'6', 'text'=>'6 Month'], ['value'=>'12', 'text'=>'12 Month'],]
                                        @endphp
                                        <select class="form-control" name="no_of_months" required>

                                            @foreach($monhths as $month)
                                                @if ($package->no_of_months == $month['value'])
                                                    <option value="{{$month['value']}}" selected>{{$month['text']}}</option>
                                                @else
                                                    <option value="{{$month['value']}}" >{{$month['text']}}</option>
                                                @endif
                                            @endforeach
                                            
                                        </select> 
                                    </div>
                                    

                                    
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Services</label>

                                    @php
                                        $counter = 1;
                                        $flag = true;
                                    @endphp

                                    @foreach($services as $service)

                                        @foreach($package->services as $serviceToSelect)
                                            @if ($service->name == $serviceToSelect)
                                                <div class="col-sm-3">
                                                    <div class="i-checks">
                                                        <label> <input type="checkbox" value="{{$service->name}}" name="services[]" checked> <i></i>{{$service->name}}</label>
                                                    </div>
                                                </div>
                                                @php
                                                    $flag = false;
                                                @endphp
                                                @break
                                            @endif

                                            
                                        @endforeach
                                        
                                        @if ($flag)
                                            <div class="col-sm-3">
                                                <div class="i-checks">
                                                    <label> <input type="checkbox" value="{{$service->name}}" name="services[]" > <i></i>{{$service->name}}</label>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($counter%3 == 0)
                                            <label class="col-sm-2 control-label"></label>
                                        @endif
                                        
                                        @php
                                            $counter = $counter + 1;
                                            $flag = true;
                                        @endphp
                                    @endforeach


                                    
                                </div>

                                

                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Update</button>
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
