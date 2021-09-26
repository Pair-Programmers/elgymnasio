<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Account;

class AccountController extends Controller
{
    public function showCreatePage()
    {
        $view = View::make('adminsite/account_add');
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    
    public function showEditPage($id)
    {
        $account = Account::find($id);

        $view = View::make('adminsite/account_edit', ['account'=>$account]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }


    public function showListPage()
    {
        $accounts = Account::all();

        $view = View::make('adminsite/account_list', ['accounts'=>$accounts]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    
    public function store(Request $request)
    {
        Account::create($request->all());
        return redirect()->back()->with('success', 'Created Successfuly !');
    }

    public function update(Request $request)
    {
        $account = Account::find($request->id);
        $account->update($request->all());
        return redirect()->back()->with('success', 'Updated Successfuly !');
    }

    public function destroy($id)
    {
        Account::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }
}
