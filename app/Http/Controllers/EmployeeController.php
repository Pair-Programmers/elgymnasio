<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Payee;

class EmployeeController extends Controller
{
    public function showCreatePage()
    {
        $view = View::make('adminsite/employee_add');
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    
    public function showEditPage($id)
    {
        $employee = Payee::find($id);

        $view = View::make('adminsite/employee_edit', ['employee'=>$employee]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }


    public function showListPage()
    {
        $employees = Payee::whereGroup('Employee')->get();

        $view = View::make('adminsite/employee_list', ['employees'=>$employees]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    
    public function store(Request $request)
    {
        $request->validate([

            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $requestData = $request->all();

        if(!empty($request->image_path)){
            $imageName = time().'_'.$request->name.'.'.$request->image_path->extension();  
            $request->image_path->move(public_path('images/vendors'), $imageName);
            $requestData['image_path'] = $imageName;
        }
        else{
            $requestData['image_path'] = 'male_avatar.png';
        }

        $requestData['group'] = 'Employee';
        Payee::create($requestData);
        return redirect()->back()->with('success', 'Created Successfuly !');
    }

    public function update(Request $request)
    {
        $request->validate([

            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $requestData = $request->all();

        if(!empty($request->image_path)){
            $imageName = time().'_'.$request->name.'.'.$request->image_path->extension();  
            $request->image_path->move(public_path('images/vendors'), $imageName);
            $requestData['image_path'] = $imageName;
        }
        else{
            $requestData['image_path'] = $request->image_path_temp;
        }

        $employee = Payee::find($request->id);
        $employee->update($requestData);
        return redirect()->back()->with('success', 'Updated Successfuly !');
    }

    public function destroy($id)
    {
        Payee::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }
}
