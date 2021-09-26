<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\Service;

class ServiceAdminController extends Controller
{
    
    public function showAddServicePage()
    {
        $view = View::make('adminsite/service_add');
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function showEditServicePage($id)
    {
        $service = Service::find($id);

        $view = View::make('adminsite/service_edit', ['service'=>$service]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function showServiceListPage()
    {
        $services = Service::all();
        $view = View::make('adminsite/service_list', ['services'=>$services]);
        $view->nest('sidebar','adminsite/templates/sidebar');
        $view->nest('header','adminsite/templates/header');
        return $view;
    }

    public function store(Request $request)
    {
        Service::create($request->all());
        return redirect('display_list_service');
    }

    public function update(Request $request)
    {
        $service = Service::find($request->id);
        $service->update($request->all());
        return redirect('display_list_service');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('display_list_service');
    }

    

}
