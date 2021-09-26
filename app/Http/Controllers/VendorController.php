<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Payee;


class VendorController extends Controller
{
    public function showCreatePage()
    {
        $view = View::make('adminsite/vendor_add');
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    
    public function showEditPage($id)
    {
        $vendor = Payee::find($id);

        $view = View::make('adminsite/vendor_edit', ['vendor'=>$vendor]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }


    public function showListPage()
    {
        $vendors = Payee::whereGroup('Vendor')->orderby('id', 'DESC')->get();

        $view = View::make('adminsite/vendor_list', ['vendors'=>$vendors]);
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

        $requestData['group'] = 'Vendor';

        Payee::create($requestData);
        //return redirect()->back()->with('success', 'Created Successfuly !');
        return redirect('display_vendor_list');
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

        $vendor = Payee::find($request->id);
        $vendor->update($requestData);
        //return redirect()->back()->with('success', 'Updated Successfuly !');
        return redirect('display_vendor_list');

    }

    public function destroy($id)
    {
        Payee::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }

}
