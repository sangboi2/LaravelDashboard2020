<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Servicecategory;
use App\Models\Servicelist;
use Illuminate\Http\Request;

class ServicelistController extends Controller
{
    public function index()
    {
       /*  $service_category = Servicecategory::all();
            return view('admin.service-list.index')
            ->with(' service_category',  $service_category)
        ; */

        $categories = Servicecategory::all();
        $service_list = Servicelist::all();
        return view('admin.service-list.index', compact('categories', 'service_list'));
    }

    public function store(Request $request)

    {
        $serlist = new Servicelist();
        $serlist->serv_cate_id = $request->input('serv_cate_id');
        $serlist->title = $request->input('title');
        $serlist->description = $request->input('description');
        $serlist->price = $request->input('price');
        $serlist->duration = $request->input('duration');

        $serlist->save();
         return redirect()->back()->with('status','Service List is added' );
    }

    public function edit($id)
    {
        $ser_list = Servicelist::find($id);
        $categories = Servicecategory::all();
        return view('admin.service-list.edit')
        ->with('ser_list', $ser_list)
        ->with('categories', $categories)
        ;

        //To check id
       // return $ser_list;

    }

    public function update(Request $request, $id)
    {
        $serv_list = Servicelist::find($id);
        $serv_list->serv_cate_id = $request->input('serv_cate_id');
        $serv_list->title = $request->input('title');
        $serv_list->description = $request->input('description');
        $serv_list->price = $request->input('price');
        $serv_list->duration = $request->input('duration');
        $serv_list->update();

        return redirect('/service-list')->with('status', 'Servicelist has been updated successfully');
    }

    public function delete($id)
    {
        $serv_delete = Servicelist::findOrFail($id);
        $serv_delete->delete();

        return redirect('service-list')->with('status', 'Servicelist has been deleted');
    }
}
