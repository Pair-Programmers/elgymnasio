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
                    <h2>Member Registration</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Members</a>
                        </li>
                        <li class="active">
                            <strong>Registration</strong>
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
                            <form method="post" class="form-horizontal" action="save_member" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name" required minlength="3" maxlength="40">
                                    </div>

                                    <label class="col-sm-2 control-label">Image</label>

                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" name="image_path" >
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Date of Birth</label>

                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date_of_birth" required>
                                    </div>

                                    <label class="col-sm-2 control-label">Registeration Date</label>

                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>

                         
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gender</label>

                                    <div class="col-sm-1"><label> 
                                        <input type="radio" checked value="Male" id="optionsRadios1" name="gender"> Male </label></div>
                                        <div class="col-sm-2"><label> <input type="radio" value="Female" id="optionsRadios2" name="gender"> Female</label></div>
                                        <div class="col-sm-2"><label> <input type="radio" value="Other" id="optionsRadios1" name="gender"> Other</label></div>
                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="phone" required value="03" placeholder="03XXXXXXXXX" min="03000000000" max="03999999999">
                                    </div>

                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" name="email" placeholder="Optional">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">CNIC</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="cnic" placeholder="Optional" >
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Adress</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="adress" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="password" placeholder="Optional">
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Admission Fee</label>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="admission_fee" value="0" required placeholder="Add 0 if no admission fee ..">
                                    </div>

                                    <label class="col-sm-2 control-label">Discount on Package</label>

                
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span> 
                                            <input type="number" class="form-control" name="discount" min="0" max="100" value="0" required> 
                                        </div>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Package</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="package_id" required>
                                            @foreach ($packages as $package)
                                                <option value="{{$package->id}}">{{$package->name}} {{$package->no_of_months}} Month </option>
                                            @endforeach
                                        
                                        </select> 
                                        
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label" >Timing</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="timing" required>
                                        <option value="6 AM - 9 AM">Morning 6 AM - 9 AM</option>
                                        <option value="9:30 AM - 4 PM">Morning-Evening 9:30 AM - 4 PM</option>
                                        <option value="4:30 PM - 11 PM">Evening-Night 4:30 PM - 11 PM</option>
                                    </select> 
                                        
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" ></label>
                                    <div class="col-sm-3">
                                        <div class="i-check" >
                                            <input  type="checkbox" value="1"  name="hire_trainer" onclick="participate()">
                                            <label  for="hire_trainer" >Include Personal Trainer ?</label>
                                        </div>

                                        
                                    </div>
                                        
                                </div>
                                <div id="trainers" style="display: none">
                                <div class="form-group" ><label class="col-sm-2 control-label">Trainer</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="payee_id">
                                            <option value="">Select</option>
                                            @foreach ($trainers as $trainer)
                                                <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                                            @endforeach
                                        </select> 
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" >Trainer Fee</label>
                                    <div class="col-sm-2">
                                        <div class="i-check" >
                                            <div class="i-checks" ><label> <input checked type="radio" value="12000" name="trainer_fee">  12000 Rs </label></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="i-check" >
                                            <div class="i-checks"><label> <input type="radio" value="8000" name="trainer_fee">  8000 Rs </label></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="i-check" >
                                            <div class="i-checks"><label> <input type="radio" value="5000" name="trainer_fee" >  5000 Rs </label></div>
                                        </div>
                                    </div>
                                    
                                    
                                        
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
