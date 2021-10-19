<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>El-Gymnasio | Member Registration</title>

    <link href="{{asset('adminsite')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/style.css" rel="stylesheet">

    <link href="{{asset('adminsite')}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?=$sidebar;?>

        <div id="page-wrapper" class="gray-bg">
            <?=$header;?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Member Fee Collection</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Members</a>
                        </li>
                        <li class="active">
                            <strong>Fee Collection</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

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
                            <form method="post" class="form-horizontal" action="{{route('payment.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group" ><label class="col-sm-2 control-label">Member</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" value="{{$member->id}}" name="member_id">
                                        <label class="control-label">{{$member->name}}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">package</label>

                                    <div class="col-sm-8">
                                        <label class="control-label">{{$member->package->name}} {{$member->package->no_of_months}} Months</label>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Amount</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="amount" required value="{{$member->package->price}}" >
                                    </div>

                                    <label class="col-sm-2 control-label">Payment Date</label>

                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>

                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control" name="amount" required value="{{$member->package->price}}" >
                                    </div>

                                    <label class="col-sm-2 control-label">Package Expire At</label>

                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="package_expire_at_date" value="{{$package_expire_at}}" required>
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Account</label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="account_id" required>
                                            <option value="">Select</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{$account->id}}">{{$account->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Note</label>

                                    <div class="col-sm-4">
                                        <textarea name="note" id="" cols="49" rows="3"></textarea>
                                    </div>


                                </div>













                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
            <?=$footer;?>
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

        <script>

            let count=0;
         function participate(e){
                if(count==0){
                    console.log('msg1');
                    count=1;
                    $('#trainers').fadeIn(10)
                }
                else{
                    console.log('msg2');
                    count=0;
                    $('#trainers').fadeOut(10)
                }
            }

        </script>
</body>

</html>
