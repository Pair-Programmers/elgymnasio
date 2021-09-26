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
    <style type="text/css">@media print {.info-user{margin-top: 20px}.title{margin-top: -20px !important;}.invoice-section{position: absolute;top: 15%;right: 10%;}.signature{display: block;bottom: 0%;}.table>thead>tr>th{background-color: transparent !important;border: none !important; }.table>tbody>tr>td{background-color: transparent !important;border: none !important;}}
           .waterMark{position: absolute;top: 15%;z-index: -1; opacity: 0.3;}
           .title-developer{position: absolute;bottom: 0px;left: 0px;}
           .user-name,.user-phone,.user-address{margin-left: -17px;font-size: 17px;}
           .signature{position: absolute;bottom: 2%;right: 5%;color: black;}

    </style>
</head>

<body>

    <div id="wrapper">     
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <h1 class="title" style="font-size: 65px;">EL-Gymnasio</h1>
                                <div class="col-sm-6 p-0 info-user">
                                    <div class="row">
                                        <img src="{{asset('images/members/') .'/' .  $member->image_path}}" alt="male picture" width="150" height="150">
                                    </div>
                                    <h4 class="user-name" style="margin-top: 10px; "><span style="font-size: 30px">{{$member->name}}</span> (Age <?php echo date_diff(date_create($member->date_of_birth), date_create('now'))->y;;?>)</h4>
                                    <h4 class="user-phone">Phone: {{$member->phone}} CNIC: {{$member->cnic}}</h4>
                                    {{-- <address class="user-address">{{$member->adress}}</address> --}}
                                </div>

                                <div class="col-sm-6 text-right invoice-section">
                                    <h4>Reg Invoice No.</h4>
                                    <h4 class="text-navy">REG-INV-{{$member->id}}</h4>
                                    
                                    <p>
                                        <span><strong>Date: </strong> {{$member->date}}</span>
                                    </p>

                                    <p>
                                        <span><strong>Package Exp: </strong> {{$member->package_expire_at}}</span>
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
                                @if($member->hire_trainer == '1')
                                <tr>
                                    <td><strong>Trainer Fee :</strong></td>
                                    <td>RS {{$member->trainer_fee}}.00</td>
                                </tr>
                                @endif
                                @if($member->discount>0)
                                <tr>
                                    <td><strong>Discount on Package :</strong></td>
                                    <td>RS {{$package->price*($member->discount/100)}}.00</td>
                                </tr>
                                @endif
                                <tr>
                                    <td><strong>TAX :</strong></td>
                                    <td>RS 0.00</td>
                                </tr>

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

                            {{-- <table class="table invoice-total">
                                <tbody>
                                
                                
                                <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>
                                        @if($member->hire_trainer == '1')
                                            RS {{$member->admission_fee + $member->trainer_fee + $package->price}}.00
                                        @else
                                            RS {{$member->admission_fee + $package->price}}.00
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table> --}}


                            <div class="row">
                                
                                <h2 >GYM Rules & Regulations</h2>
                                <div class="col-sm-12">
                                    
                                    <ol>
                                        <li>Equipments must be handled with care and should be returend to their propper place after use; any abuse (droping weights) will result in loss of privilieges and membership.</li>
                                        <li>Proprer Attire/Outfit is must, please wear T-shirt, Trouser/Shorts & Shoes. And try to use good odor/perfume.</li>
                                        <li>Keeping personal belongings (e.g. Mobile & Purse) into locker are at the Member's risk. We are not ressponsible for any loss.</li>
                                        <li>Plase behave soft/gentle in gym & consideration of the rights of others must be observed at all times.</li>
                                        <li>Monthly dues must be paid with in 3 days of the due date.</li>
                                        <li>Admission Fee and Gym Fee are Non-Refundable and cannot be transfer to other Member.</li>
                                        <li>Rights of entry at ELGymnasio are reserved. Management can cancel any membership without assigning a reason.</li>
                                    </ol>
                                    
                                </div>

                                
                            </div>
                           <img class="waterMark" src="{{asset('images')}}/logo/logo.jpeg"/>
                           <div class="signature">Signature   _____________________</div>
                        

                        </div>
                </div>
            </div>
        </div>
        </div>
           <div class="title-developer">Software developed by Pair Programmers <br/>(Email: support@pairprogrammers.com, Phone: +92 323 9991999)</div>


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
