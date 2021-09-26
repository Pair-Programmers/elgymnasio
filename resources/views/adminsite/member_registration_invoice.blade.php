<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Invoice</title>

    <link href="{{asset('adminsite')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('adminsite')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?=$sidebar; ?>
    

        <div id="page-wrapper" class="gray-bg">
            <?=$header;?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Invoice</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            Other Pages
                        </li>
                        <li class="active">
                            <strong>Invoice</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                        <a href="#" class="btn btn-white"><i class="fa fa-check "></i> Save </a>
                        <a href="{{url::to('invoice_print', ['id' => $member->id])}}" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <h1 style="font-size: 65px;">EL-Gymnasio</h1>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <img src="{{asset('images/members/') .'/' .  $member->image_path}}" alt="male picture" width="150" height="150">
                                        
                                    </div>
                                    <h4></h4>
                                    <h2>Member Information</h2>
                                    <h4>{{$member->name}} (Age <?php echo date_diff(date_create($member->date_of_birth), date_create('now'))->y;;?>)</h4>
                                    <h4>{{$member->phone}}</h4>
                                    <h4></h4>
                                    
                                    <address>{{$member->adress}}</address>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Reg Invoice No.</h4>
                                    <h4 class="text-navy">REG-INV-{{$member->id}}</h4>
                                    
                                    <p>
                                        <span><strong>Date: </strong> {{$member->date}}</span>
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Package</th>
                                        <th>Timing</th>
                                        <th>Trainer</th>
                                        <th>Tax</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><div><strong>{{$package->name}} ({{$package->no_of_months}} Month)</strong></div>
                                            <small>@foreach($package->services as $service) {{$service}},  @endforeach</small></td>
                                        <td>{{$member->timing}}</td>
                                        <td>@if($member->hire_trainer == '1'){{$trainer->name}} @endif </td>
                                        <td>RS 0.00</td>
                                        <td>RS {{$package->price}}.00</td>
                                    </tr>
                                    
                                    

                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                    <tr>
                                        <td><strong>Sub Total :</strong></td>
                                        <td>RS {{$package->price}}.00</td>
                                    </tr>
                                <tr>
                                    <td><strong>Admission Fee :</strong></td>
                                    <td>RS {{$member->admission_fee}}.00</td>
                                </tr>
                                @if($member->discount>0)
                                <tr>
                                    <td><strong>Discount on Package</strong></td>
                                    <td>RS {{$package->price*($member->discount/100)}}.00</td>
                                </tr>
                                @endif

                                @if($member->hire_trainer == '1')
                                <tr>
                                    <td><strong>Trainer Fee :</strong></td>
                                    <td>RS {{$member->trainer_fee}}.00</td>
                                </tr>
                                @endif
                                
                                <tr>
                                    <td><strong>TAX :</strong></td>
                                    <td>RS 0.00</td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="table invoice-total">
                                <tbody>
                                
                                
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>
                                        @if($member->discount>0)
                                            @if($member->hire_trainer == '1')
                                                RS {{($member->admission_fee + $member->trainer_fee + $package->price) - ($package->price*($member->discount/100))}}.00
                                            @else
                                                RS {{($member->admission_fee + $package->price) - ($package->price*($member->discount/100))}}.00
                                            @endif
                                        @else
                                            @if($member->hire_trainer == '1')
                                                RS {{$member->admission_fee + $member->trainer_fee + $package->price}}.00
                                            @else
                                                RS {{$member->admission_fee + $package->price}}.00
                                            @endif
                                        @endif
                                        
                                    </td>
                                </tr>
                                </tbody>
                            </table>


                            {{-- <div class="row">
                                
                                <h2 >GYM Rules & Regulations</h2>
                                <div class="col-sm-12">
                                    
                                    <ol>
                                        <li>Use a Towel and Wipe Down Equipment</li>
                                        <li>Don’t Hog the Machines</li>
                                        <li>Put Away Your Equipment</li>
                                        <li>Keep Your Gym Bag Off the Floor</li>
                                        <li>UDon’t Criticize Othersse</li>
                                        <li>Weight plates are not to be leaned against equipment stands and machines.</li>
                                        <li>After utilizing equipment, strip bars and return plates and dumbbells to proper storage areas.</li>
                                        <li>Dumbbells and weight plates cannot be dropped on the floor for any reason.</li>
                                        <li>The Wellness Center staff is not responsible for the storage of the users' valuables.</li>
                                        <li>Users are not allowed to leave bags or backpacks in the workout area. All personal belongings should be left in the lockers.</li>
                                    </ol>
                                    
                                </div>

                                
                            </div> --}}

                           
                        </div>
                </div>
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


</body>

</html>
