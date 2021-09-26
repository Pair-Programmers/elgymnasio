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
                        <a href="{{url::to('payment_invoice_print', ['id' => $payment->id])}}" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>
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
                                    
                                    <h2>Member Payment Slip</h2>
                                    <h4>{{$payment->member->name}} (Age <?php echo date_diff(date_create($payment->member->date_of_birth), date_create('now'))->y;;?>)</h4>
                                    <h4>{{$payment->member->phone}}</h4>
                                    
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Registration No. : {{$payment->member->id}}</h4>
                                    <h4 class="text-navy">PAY-INV-{{$payment->id}}</h4>
                                    
                                    <p>
                                        <span><strong>Payment Date: </strong> {{$payment->member->date}}</span>
                                    </p>
                                </div>
                            </div>

                            

                            <table class="table invoice-total">
                                <tbody>
                                    <tr>
                                        <td><strong>Sub Total :</strong></td>
                                        <td>RS {{$payment->member->package->price}}.00</td>
                                    </tr>
                                
                                @if($payment->member->discount>0)
                                <tr>
                                    <td><strong>Discount on Package</strong></td>
                                    <td>RS {{$payment->member->package->price*($payment->member->discount/100)}}.00</td>
                                </tr>
                                @endif

                                @if($payment->member->hire_trainer == '1')
                                <tr>
                                    <td><strong>Trainer Fee :</strong></td>
                                    <td>RS {{$payment->member->trainer_fee}}.00</td>
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
                                        @if($payment->member->discount>0)
                                            @if($payment->member->hire_trainer == '1')
                                                RS {{($payment->member->trainer_fee + $payment->member->package->price) - ($payment->member->package->price*($payment->member->discount/100))}}.00
                                            @else
                                                RS {{($payment->member->package->price) - ($payment->member->package->price*($payment->member->discount/100))}}.00
                                            @endif
                                        @else
                                            @if($payment->member->hire_trainer == '1')
                                                RS {{$payment->member->trainer_fee + $payment->member->package->price}}.00
                                            @else
                                                RS {{$payment->member->package->price}}.00
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
