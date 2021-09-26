<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Payee;
use App\Models\Expense;
use App\Models\Account;
use App\Models\ExpCategory;
use App\Models\ExpSubCategory;


class ExpenseController extends Controller
{
    
    public function showAddPage()
    {
        $payees = Payee::all();
        $accounts = Account::all();
        $categories = ExpCategory::all();
        $subcategories = ExpSubCategory::select('exp_sub_categories.id as id',
                'exp_sub_categories.name as name',
                'exp_categories.name as main_category_name',
                'exp_categories.id as main_category_id',
                'exp_sub_categories.created_at',
                'exp_sub_categories.updated_at')
        ->join('exp_categories', 'exp_categories.id', 'exp_sub_categories.category_id')
        ->orderby('main_category_id')
        ->get();
         
        $view = View::make('adminsite/expense_add', 
            ['payees'=>$payees, 'accounts'=>$accounts, 'categories'=>$categories, 'subcategories'=>$subcategories]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function showEditPage($id)
    {
        $payees = Payee::all();
        $accounts = Account::all();
        $categories = ExpCategory::all();
        $subcategories = ExpSubCategory::select('exp_sub_categories.id as id',
                'exp_sub_categories.name as name',
                'exp_categories.name as main_category_name',
                'exp_categories.id as main_category_id',
                'exp_sub_categories.id as sub_category_id',
                'exp_sub_categories.created_at',
                'exp_sub_categories.updated_at')
        ->join('exp_categories', 'exp_categories.id', 'exp_sub_categories.category_id')
        ->orderby('main_category_id')
        ->get();
        $expense = Expense::find($id);
         
        $view = View::make('adminsite/expense_edit',
            ['payees'=>$payees, 'accounts'=>$accounts, 'categories'=>$categories, 'subcategories'=>$subcategories, 'expense'=>$expense]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function showListPage()
    {
        //return Expense::all();
        $expenses = Expense::select('expenses.id', 
                                            'accounts.name as account_name',
                                            'payees.name as payee_name',
                                            'amount',
                                            'exp_sub_categories.name as subcategory_name',
                                            'exp_categories.name as category_name',
                                            'date',
                                            'note')
                            ->join('payees', 'payees.id', 'expenses.payee_id')
                            ->join('accounts', 'accounts.id', 'expenses.account_id')
                            ->join('exp_sub_categories', 'exp_sub_categories.id', 'expenses.exp_subcategory_id')
                            ->join('exp_categories', 'exp_sub_categories.category_id', 'exp_categories.id')
                            ->orderby('expenses.created_at', 'DESC')
                            ->get();
                            

        $view = View::make('adminsite/expense_list', ['expenses'=>$expenses]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    // public function showCategoryListPage()
    // {
    //     $view = View::make('adminsite/expense_category_list');
    //     $view->nest('sidebar','adminsite/templates/sidebar');
    //     $view->nest('header','adminsite/templates/header');
    //     return $view;
    // }

    public function store(Request $request)
    {
        //return $request;
        Expense::create($request->all());
        return redirect()->back()->with('success', 'Created Successfuly !');
    }

    public function update(Request $request)
    {
        $expense = Expense::find($request->id);
        $expense->update($request->all());
        return redirect()->back()->with('success', 'Updated Successfuly !');
    }

    public function destroy($id)
    {
        Expense::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }

    /////////////////////////////////////////////////////////////Expense category///////////////////////////////////////////////////
    public function showCategoryPage()
    {
        $categories = ExpCategory::all();
         
        $view = View::make('adminsite/expense_category', ['categories'=>$categories]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function store_category(Request $request)
    {
        //return $request;
        ExpCategory::create($request->all());
        return redirect()->back()->with('success', 'Created Successfuly !');
    }

    public function destroy_category($id)
    {
        ExpCategory::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }

    public function showEditCategoryPage($id)
    {
        $category = ExpCategory::find($id);
         
        $view = View::make('adminsite/expense_edit_category', ['category'=>$category]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function update_category(Request $request)
    {
        //return $request;
        $expense = ExpCategory::find($request->id);
        $expense->update($request->all());
        return redirect('display_expense_category');
    }


    
    /////////////////////////////////////////////////////////////Expense Sub Category///////////////////////////////////////////////////
    public function showSubCategoryPage()
    {
        $subcategories = ExpSubCategory::
        select('exp_sub_categories.id as id',
                'exp_sub_categories.name as name',
                'exp_categories.name as category_name',
                'exp_sub_categories.created_at',
                'exp_sub_categories.updated_at')
        ->join('exp_categories', 'exp_categories.id', 'exp_sub_categories.category_id')
        ->get();
        $categories = ExpCategory::all();
         
        $view = View::make('adminsite/expense_subcategory', ['subcategories'=>$subcategories, 'categories'=>$categories]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function store_subcategory(Request $request)
    {
        //return $request;
        ExpSubCategory::create($request->all());
        return redirect()->back()->with('success', 'Created Successfuly !');
    }

    public function destroy_subcategory($id)
    {
        ExpSubCategory::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }

    public function showEditSubCategoryPage($id)
    {
        $subcategory = ExpSubCategory::find($id);
        $categories = ExpCategory::all();

        $view = View::make('adminsite/expense_edit_subcategory', ['subcategory'=>$subcategory, 'categories'=>$categories]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function update_subcategory(Request $request)
    {
        //return $request;
        $subcategory = ExpSubCategory::find($request->id);
        $subcategory->update($request->all());
        return redirect('display_expense_subcategory');
    }

}
