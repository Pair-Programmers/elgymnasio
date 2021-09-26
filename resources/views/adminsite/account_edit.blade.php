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
                    <h2>Edit Account</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Account</a>
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
                            <form method="post" class="form-horizontal" action="{{ URL::to('/update_account') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-4">
                                        <input type="hidden"  name="id" value="{{$account->id}}">
                                        <input type="text" class="form-control" name="name" value="{{$account->name}}">
                                    </div>

                                    

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Bank Name</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="bank_name" value="{{$account->bank_name}}">
                                    </div>

                                    <label class="col-sm-2 control-label">Type</label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="type" required>
                                            @if ($account->type == 'Cash')
                                                <option value="Cash" selected>Cash</option>
                                                <option value="Bank Account" >Bank Account</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="JazzCash">JazzCash</option>
                                                <option value="Easypaisa">Easypaisa</option>
                                            @elseif($account->type == 'Bank Account')
                                                <option value="Cash">Cash</option>
                                                <option value="Bank Account" selected>Bank Account</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="JazzCash">JazzCash</option>
                                                <option value="Easypaisa">Easypaisa</option>
                                            @elseif($account->type == 'Credit Card')
                                                <option value="Cash">Cash</option>
                                                <option value="Bank Account">Bank Account</option>
                                                <option value="Credit Card" selected>Credit Card</option>
                                                <option value="JazzCash">JazzCash</option>
                                                <option value="Easypaisa">Easypaisa</option>
                                            @elseif($account->type == 'JazzCash')
                                                <option value="Cash">Cash</option>
                                                <option value="Bank Account">Bank Account</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="JazzCash" selected>JazzCash</option>
                                                <option value="Easypaisa">Easypaisa</option>
                                            @elseif($account->type == 'Easypaisa')
                                                <option value="Cash">Cash</option>
                                                <option value="Bank Account">Bank Account</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="JazzCash">JazzCash</option>
                                                <option value="Easypaisa" selected>Easypaisa</option>
                                            @else
                                                <option value="Cash">Cash</option>
                                                <option value="Bank Account">Bank Account</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="JazzCash">JazzCash</option>
                                                <option value="Easypaisa">Easypaisa</option>
                                            @endif
                                            
                                        </select> 
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Account Title</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="account_title" value="{{$account->account_title}}">
                                    </div>
                                   
                                    <label class="col-sm-2 control-label">Account #</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="account_number" value="{{$account->account_number}}">
                                    </div>

                                    
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Opening Balance</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="opening_balance" value="{{$account->account_number}}">
                                    </div>

                                    <label class="col-sm-2 control-label">As off</label>

                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="as_off_date" value="{{$account->as_off_date}}" >
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
