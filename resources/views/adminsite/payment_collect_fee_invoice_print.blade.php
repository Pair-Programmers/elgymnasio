<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>elgymnasio.pk</title>

    <link href="{{asset('adminsite')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('adminsite')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/style.css" rel="stylesheet">
    <style type="text/css">@media print {.info-user2{}.program1-slip,.program2-slip{position: absolute;top: 42%;}.program2-slip{top: 90%}.info-user{margin-top: 20px}.title{margin-top: -20px !important;}.invoice-section{position: absolute;top: 15%;right: 10%;}.signature{display: block;bottom: 0%;}.table>thead>tr>th{background-color: transparent !important;border: none !important; }.table>tbody>tr>td{background-color: transparent !important;border: none !important;}}
           .waterMark{position: absolute;top: 15%;z-index: -1; opacity: 0.3;}
           .title-developer{position: absolute;bottom: 0px;left: 0px;}
           .user-name,.user-phone,.user-address{margin-left: -17px;font-size: 17px;}
           .signature{position: absolute;bottom: 2%;right: 5%;color: black;}
           .wrapper {padding: 0 10px;}.wrapper-content {padding: 20px 10px 20px;}
    </style>
</head>

<body>

    <div id="wrapper">     
        <div class="row">
            
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    {{-- first_slip --}}
                    <div class="ibox-content p-xl">
                        <div class="row">
                            <h1 class="title" style="font-size: 65px;">EL-Gymnasio</h1><h2>Payment Slip</h2>
                            <div class="col-sm-6 p-0 info-user">
                                
                                <h4 class="user-name" style="margin-top: 10px; "><span style="font-size: 30px">{{$payment->member->name}}</span> (Age <?php echo date_diff(date_create($payment->member->date_of_birth), date_create('now'))->y;;?>)</h4>
                                <h4 class="user-phone">Phone: {{$payment->member->phone}} CNIC: {{$payment->member->cnic}}</h4>
                                <h4 class="user-phone">Package: {{$payment->member->package->name}} ({{$payment->member->package->no_of_months}} Months)</h4>
                                {{-- <address class="user-address">{{$member->adress}}</address> --}}
                            </div>

                            <div class="col-sm-6 text-right invoice-section">
                                <h4>Reg No. : {{$payment->member->id}}</h4>
                                <h4 class="text-navy">PAY-INV-{{$payment->id}}</h4>
                                
                                <p>
                                    <span><strong>Date: </strong> {{$payment->member->date}}</span>
                                </p>

                                <p>
                                    <span><strong>Package Exp: </strong> {{$payment->member->package_expire_at}}</span>
                                </p>
                            </div>
                        </div>

                        
                        <table class="table invoice-total">
                            <tbody>
                                <tr>
                                    <td><strong>Package Recharge :</strong></td>
                                    <td>RS {{$payment->member->package->price}}.00</td>
                                </tr>
                            
                            @if($payment->member->hire_trainer == '1')
                            <tr>
                                <td><strong>Trainer Fee :</strong></td>
                                <td>RS {{$payment->member->trainer_fee}}.00</td>
                            </tr>
                            @endif
                            @if($payment->member->discount>0)
                            <tr>
                                <td><strong>Discount on Package :</strong></td>
                                <td>RS {{$payment->memberpackage->price*($payment->member->discount/100)}}.00</td>
                            </tr>
                            @endif
                            <tr>
                                <td><strong>TAX :</strong></td>
                                <td>RS 0.00</td>
                            </tr>

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
                    
                        <div class="program1-slip">
                            <b>Gym Contact: +92-111-111-111</b><br/>
                            Software developed by Pair Programmers <br/>(Email: support@pairprogrammers.com, Phone: +92 323 9991999)</div>
                        </div>
                    {{-- first_slip --}}
                    {{-- second_slip --}}
                    <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                        <div class="row">
                            <h1 class="title" style="font-size: 65px;">EL-Gymnasio</h1><h2>Payment Slip</h2>
                            <div class="col-sm-6 p-0 info-user2">
                                <h4 class="user-name" style="margin-top: 10px; "><span style="font-size: 30px">{{$payment->member->name}}</span> (Age <?php echo date_diff(date_create($payment->member->date_of_birth), date_create('now'))->y;;?>)</h4>
                                <h4 class="user-phone">Phone: {{$payment->member->phone}} CNIC: {{$payment->member->cnic}}</h4>
                                <h4 class="user-phone">Package: {{$payment->member->package->name}} ({{$payment->member->package->no_of_months}} Months)</h4>
                                {{-- <address class="user-address">{{$member->adress}}</address> --}}
                            </div>

                            <div class="col-sm-6 text-right invoice-section">
                                <h4>Reg No. : {{$payment->member->id}}</h4>
                                <h4 class="text-navy">PAY-INV-{{$payment->id}}</h4>
                                
                                <p>
                                    <span><strong>Date: </strong> {{$payment->member->date}}</span>
                                </p>

                                <p>
                                    <span><strong>Package Exp: </strong> {{$payment->member->package_expire_at}}</span>
                                </p>
                            </div>
                        </div>

                        
                        <table class="table invoice-total">
                            <tbody>
                                <tr>
                                    <td><strong>Package Recharge :</strong></td>
                                    <td>RS {{$payment->member->package->price}}.00</td>
                                </tr>
                            
                            @if($payment->member->hire_trainer == '1')
                            <tr>
                                <td><strong>Trainer Fee :</strong></td>
                                <td>RS {{$payment->member->trainer_fee}}.00</td>
                            </tr>
                            @endif
                            @if($payment->member->discount>0)
                            <tr>
                                <td><strong>Discount on Package :</strong></td>
                                <td>RS {{$payment->memberpackage->price*($payment->member->discount/100)}}.00</td>
                            </tr>
                            @endif
                            <tr>
                                <td><strong>TAX :</strong></td>
                                <td>RS 0.00</td>
                            </tr>

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
                        <div class="program2-slip">
                            <b>Gym Contact: +92-111-111-111</b><br/>
                            Software developed by Pair Programmers <br/>(Email: support@pairprogrammers.com, Phone: +92 323 9991999)</div>
                        </div>
                          </div>
                    </div>
                    {{-- second_slip --}}
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
     <script type="text/javascript">
        window.print();
    </script> 

</body>

</html>
