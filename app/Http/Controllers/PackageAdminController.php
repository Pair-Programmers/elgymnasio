<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Service;
use App\Models\Package;

class PackageAdminController extends Controller
{
    
    public function showAddPackagePage()
    {
        $services = Service::all();

        $view = View::make('adminsite/package_add', ['services'=>$services]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function showEditPackagePage($id)
    {
        $services = Service::all();
        $package = Package::find($id);

        $view = View::make('adminsite/package_edit', ['services'=>$services,'package'=>$package]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function showPackageListPage()
    {
        $packages = Package::all();

        $view = View::make('adminsite/package_list', ['packages'=>$packages]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function store(Request $request)
    {
        //return $request;
        Package::create($request->all());
        return redirect()->back()->with('success', 'Created Successfuly !');
    }

    public function update(Request $request)
    {
        //return $request;
        $package = Package::find($request->id);
        $package->update($request->all());
        return redirect()->back()->with('success', 'Updated Successfuly !');
    }

    public function destroy($id)
    {
        Package::destroy($id);
        return redirect()->back()->with('success', 'Deleted Successfuly !');
    }

}
