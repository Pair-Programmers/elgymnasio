<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Package;
use View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registered_members = Member::all()->count();
        $active_members = Member::whereIsActive('1')->count();
        $in_active_members = Member::whereIsActive('0')->count();
        $archive_members = Member::whereIsActive('-1')->count();
        $members_with_trainer = Member::whereIsActive('1')->whereHireTrainer('1')->count();
        $paid_fees = Member::where('package_expire_at', '>', date('Y-m-d'))
        ->whereIsActive('1')
        ->count();
        $unpaid_fees = Member::where('package_expire_at', '<=', date('Y-m-d'))
        ->whereIsActive('1')
        ->count();
        $upcoming_fees = Member::
        whereRaw('datediff(package_expire_at, now()) <= 5 AND datediff(package_expire_at, now()) >= 1')
        ->whereIsActive('1')
        ->count();

        $basic_packages = Package::where('name', 'Basic')->get();
        $platinum_packages = Package::where('name', 'Platinum')->get();
        $gold_packages = Package::where('name', 'Gold')->get();
        $members_with_basic_p = 0;
        $members_with_platinum_p = 0;
        $members_with_gold_p = 0;
        foreach ($basic_packages as $key => $package) {
            $members_with_basic_p = $members_with_basic_p + count($package->members);
        }
        foreach ($platinum_packages as $key => $package) {
            $members_with_platinum_p = $members_with_platinum_p + count($package->members);
        }
        foreach ($gold_packages as $key => $package) {
            $members_with_gold_p = $members_with_gold_p + count($package->members);
        }


        $data = [   'registered_members'=>$registered_members,
                    'active_members'=>$active_members,
                    'in_active_members'=>$in_active_members,
                    'archive_members'=>$archive_members,
                    'paid_fees'=>$paid_fees,
                    'unpaid_fees'=>$unpaid_fees,
                    'upcoming_fees'=>$upcoming_fees,
                    'members_with_trainer'=>$members_with_trainer,
                    'members_with_basic_p'=>$members_with_basic_p,
                    'members_with_platinum_p'=>$members_with_platinum_p,
                    'members_with_gold_p'=>$members_with_gold_p];

        $members = Member::join('packages', 'packages.id', 'package_id')
            ->leftJoin('payees', 'payees.id', 'payee_id')
            ->select('members.*',
            'packages.name as package_name',
            'packages.no_of_months as package_months',
            'payees.name as trainer_name')
            ->orderBy('members.created_at', 'desc')
            ->where('members.created_at', '>', date('Y-m-d', strtotime('-1' . ' day')))
            ->get();

        $view = View::make('adminsite/home', ['data'=>$data, 'members'=>$members]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        $view->nest('footer','adminsite/templates/footer');
        return $view;
    }

    public function showLogin()
    {
        $view = View::make('adminsite/login');
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
