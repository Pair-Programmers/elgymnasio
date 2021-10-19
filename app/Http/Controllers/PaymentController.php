<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Package;
use App\Models\Member;
use App\Models\Payee;
use App\Models\Payment;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showCreatePage($id)
    {
        $member = Member::find($id);
        $accounts = Account::all();

        $expire_date = $member->package_expire_at;
        $no_of_months = $member->package->no_of_months;

        $view = View::make('adminsite/payment_add', ['member'=>$member, 'accounts'=>$accounts,
        'package_expire_at'=>date('Y-m-d',strtotime( $no_of_months .' month', strtotime($expire_date)))]);

        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        $view->nest('footer','adminsite/templates/footer');
        return $view;
    }

    public function showEditPage($id)
    {
        $packages = Package::all();
        $member = Member::find($id);
        $trainers = Payee::whereType('Trainer')->get();

        $view = View::make('adminsite/member_edit', ['member'=>$member, 'packages'=>$packages, 'trainers'=>$trainers]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }


    public function store(Request $request)
    {

        $inputs = $request->all();
        $inputs['group'] = "Credit";
        $inputs['type'] = "Package Charges";
        $payment = Payment::create($inputs);

        $member = Member::find($request->member_id);

        // $expire_date = $member->package_expire_at;
        // $no_of_months = $member->package->no_of_months;
        // $member->update(['package_expire_at'=>date('Y-m-d',strtotime( $no_of_months .' month', strtotime($expire_date)))]);

        $package_expire_at = $inputs['package_expire_at_date'];
        $member->update(['package_expire_at'=>$package_expire_at]);

        return redirect()->route('payment_show_fee_invoice', $payment->id);
    }


    public function showCollectFeeInvoicePage($id)
    {
        $payment = Payment::find($id);

        $view = View::make('adminsite/payment_collect_fee_invoice', compact('payment'));
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function showCollectFeeInvoicePrintPage($id)
    {
        $payment = Payment::find($id);

        $view = View::make('adminsite/payment_collect_fee_invoice_print', compact('payment'));
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function showEdit()
    {
        $view = View::make('adminsite/member_edit');
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function edit($id)
    {

    }


    public function update(Request $request)
    {
        $request;
        $request->validate([

            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $requestData = $request->all();

        if(!empty($request->image_path)){
            $imageName = time().'_'.$request->name.'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images/members'), $imageName);
            $requestData['image_path'] = $imageName;
        }
        else{
            $requestData['image_path'] = $request->image_path_temp;
        }

        $member = Member::find($request->id);
        $member->update($requestData);
        return redirect()->back()->with('success', 'Updated Successfuly !');
    }

    public function destroy($id)
    {
        Member::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }

    public function showListPage()
    {

        
        //\App\Models\User::create(['name'=>'Malik Qasim', 'email'=>'malikqaxim36@gmail.com', 'password'=>Hash::make('qasim12345')]);
        //return Member::all();
        $payments = Payment::all();

        $totalAmount = 0;
        foreach ($payments as $key => $payment) {
            $totalAmount =  $totalAmount + $payment->amount;
        }

        $view = View::make('adminsite/payment_list', ['payments'=>$payments, 'totalAmount'=>$totalAmount]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        $view->nest('footer','adminsite/templates/footer');
        return $view;
    }

    public function showMonthlySearchListPage(Request $request)
    {
        //return Member::all();
        $payments = Payment::where('date', '>=', $request->start_date)->where('date', '<=', $request->start_date)->get();

        $totalAmount = 0;
        foreach ($payments as $key => $payment) {
            $totalAmount =  $totalAmount + $payment->amount;
        }

        $view = View::make('adminsite/payment_list', ['payments'=>$payments, 'totalAmount'=>$totalAmount]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        $view->nest('footer','adminsite/templates/footer');
        return $view;
    }


    /////////////////////////////////////////////////Invoices//////////////////////

    public function showRegistrationInvoice($id)
    {
        $member = Member::find($id);
        $package = Package::find($member->package_id);
        $trainer = Payee::find($member->payee_id);


        $view = View::make('adminsite/member_registration_invoice', ['member'=>$member, 'package'=>$package, 'trainer'=>$trainer]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');

        return $view;
    }

    public function showRegistrationInvoicePrint($id)
    {
        $member = Member::find($id);
        $package = Package::find($member->package_id);
        $trainer = Payee::find($member->payee_id);
        $view = View::make('adminsite/member_registration_invoice_print', ['member'=>$member, 'package'=>$package, 'trainer'=>$trainer]);

        return $view;
    }


}
