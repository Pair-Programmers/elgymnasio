<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>El-Gymnasio | Expense</title>

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
                    <h2>Add Expense</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Expenses</a>
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
                            <form method="post" class="form-horizontal" action="save_expense" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Payee</label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="payee_id">
                                            @foreach ($payees as $payee)
                                                <option value="{{$payee->id}}">{{$payee->name}} --> {{$payee->group}} </option>
                                            @endforeach
                                        </select> 
                                    </div>

                                    <label class="col-sm-2 control-label">Date</label>

                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d')?>">
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Amount</label>

                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rs</span> 
                                            <input type="number" class="form-control" name="amount"> 
                                        </div>
                                    </div>

                                    <label class="col-sm-2 control-label">Image</label>

                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" name="image[]" multiple="multiple">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Category</label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="exp_subcategory_id" required>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}">{{$subcategory->main_category_name}} &nbsp;:&nbsp; {{$subcategory->name}}</option>
                                            @endforeach
                                            {{-- @foreach ($categories as $category)
                                                <option value="">{{$category->name}}</option>
                                                @foreach ($subcategories as $subcategory)
                                                    @if ($subcategory->main_category_id == $category->id)
                                                        <option value="{{$subcategory->id}}"> &nbsp;&nbsp;&nbsp;{{$subcategory->name}}</option>
                                                    @endif
                                                    
                                                @endforeach
                                            @endforeach --}}
                                            
                                           
                                        </select> 
                                    </div>
                                    

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Account</label>

                                    <div class="col-sm-4">
                                        <select class="form-control" name="account_id" required>
                                            @foreach ($accounts as $account)
                                                <option value="{{$account->id}}">{{$account->name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Note</label>
                                    <div class="col-sm-4">
                                        <textarea name="note" id="" cols="50" rows="5"></textarea>
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save</button>
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
