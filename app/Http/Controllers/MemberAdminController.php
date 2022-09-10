<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Package;
use App\Models\Member;
use App\Models\Payee;

class MemberAdminController extends Controller
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
    public function showCreate()
    {
        $packages = Package::all();
        $trainers = Payee::whereType('Trainer')->get();

        $view = View::make('adminsite/member_register', ['packages'=>$packages, 'trainers'=>$trainers]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
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
        $request->validate([

            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'unique:members',

        ]);

        $requestData = $request->all();

        if(!empty($request->image_path)){
            $imageName = time().'_'.$request->name.'.'.$request->image_path->extension();
            $request->image_path->move(public_path('images/members'), $imageName);
            $requestData['image_path'] = $imageName;
        }
        else{
            if($requestData['gender'] == 'male'){
                $requestData['image_path'] = 'male_avatar.png';
            }else if($requestData['gender'] == 'female'){
                $requestData['image_path'] = 'female_avatar.png';
            }else{
                $requestData['image_path'] = 'male_avatar.png';
            }
        }

        $package_no_of_nomonth = Package::find($requestData['package_id'])['no_of_months'];
        $requestData['user_id'] = 1;
        $requestData['package_expire_at'] = date('Y-m-d', strtotime($package_no_of_nomonth . ' month'));

        Member::create($requestData);
        return redirect()->back()->with('success', 'Created Successfuly !');
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

    public function showList($query)
    {
        switch ($query) {
            case 'Registered'://product list
                $members = Member::join('packages', 'packages.id', 'package_id')
                                    ->leftJoin('payees', 'payees.id', 'payee_id')
                                    ->select('members.*',
                                    'packages.name as package_name',
                                    'packages.no_of_months as package_months',
                                    'payees.name as trainer_name')
                                    ->orderby('members.created_at', 'DESC')
                                    ->get();
                break;

            case 'Archive Members'://Archive Members list
                $members = Member::join('packages', 'packages.id', 'package_id')
                                    ->leftJoin('payees', 'payees.id', 'payee_id')
                                    ->select('members.*',
                                    'packages.name as package_name',
                                    'packages.no_of_months as package_months',
                                    'payees.name as trainer_name')
                                    ->where('is_active', '-1')
                                    ->orderby('members.created_at', 'DESC')
                                    ->get();
                break;
            case 'Basic Members'://Archive Members list
                $members = Member::join('packages', 'packages.id', 'package_id')
                                    ->leftJoin('payees', 'payees.id', 'payee_id')
                                    ->select('members.*',
                                    'packages.name as package_name',
                                    'packages.no_of_months as package_months',
                                    'payees.name as trainer_name')
                                    ->where('packages.name', 'Basic')
                                    ->orderby('members.created_at', 'DESC')
                                    ->get();
                break;
            case 'Platinum Members'://Archive Members list
                $members = Member::join('packages', 'packages.id', 'package_id')
                                    ->leftJoin('payees', 'payees.id', 'payee_id')
                                    ->select('members.*',
                                    'packages.name as package_name',
                                    'packages.no_of_months as package_months',
                                    'payees.name as trainer_name')
                                    ->where('packages.name', 'Platinum')
                                    ->orderby('members.created_at', 'DESC')
                                    ->get();
                break;
            case 'Upcoming Fees'://Auction list
                $members = Member::join('packages', 'packages.id', 'package_id')
                                    ->leftJoin('payees', 'payees.id', 'payee_id')
                                    ->select('members.*',
                                    'packages.name as package_name',
                                    'packages.no_of_months as package_months',
                                    'payees.name as trainer_name')
                                    ->whereRaw('datediff(package_expire_at, now()) <= 5 AND datediff(package_expire_at, now()) >= 1')
                                    ->whereIsActive('1')
                                    ->orderBy('members.created_at', 'desc')
                                    ->get();
                break;
            case 'Pending Fees'://instax list
                $members = Member::join('packages', 'packages.id', 'package_id')
                                    ->leftJoin('payees', 'payees.id', 'payee_id')
                                    ->select('members.*',
                                    'packages.name as package_name',
                                    'packages.no_of_months as package_months',
                                    'payees.name as trainer_name')
                                    ->where('package_expire_at', '<=', date('Y-m-d'))
                                    ->whereIsActive('1')
                                    ->orderBy('members.created_at', 'desc')
                                    ->get();
                break;
            case 'Members With Trainer'://instax list
                $members = Member::join('packages', 'packages.id', 'package_id')
                                    ->leftJoin('payees', 'payees.id', 'payee_id')
                                    ->select('members.*',
                                    'packages.name as package_name',
                                    'packages.no_of_months as package_months',
                                    'payees.name as trainer_name')
                                    ->whereIsActive('1')
                                    ->whereHireTrainer('1')
                                    ->orderBy('members.created_at', 'desc')
                                    ->get();
                break;
            default:
                $products = array();
        }
        //return Member::all();


        $lateFeeMessage = 'Its%20Fee%20auto%20reminder%20message%20at%20Elgymnasio,%20your%20Gym%20fee%20is%20due%20now%20kindly%20pay%20your%20fees,%20thanks.';
        $view = View::make('adminsite/member_list', ['members'=>$members, 'query'=>$query, 'lateFeeMessage'=>$lateFeeMessage]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
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
