<?php

namespace App\Http\Controllers\Backend\Hotels;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HotelService;

class hotelsServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function list(){
        $services=HotelService::all();
        return view('Backend.Hotels.Service.index',['services'=>$services]);
    }
    Public function add(Request $request){

        $this->validate($request, [
            'hotel_service_name' => 'required',
            'hotel_service_hour' => '',
            'hotel_service_type' => '',
            'hotel_service_cost' => '',
            'hotel_service_cost_unit' => '',
            'hotel_service_description' => '',
            'hotel_service_remark' => '',
        ]);
        $hotel_services = new HotelService();
        $hotel_services->service_name = $request->input('hotel_service_name');
        $hotel_services->service_description = $request->input('hotel_service_description');
        $hotel_services->service_hour= $request->input('hotel_service_hour');
        $hotel_services->service_type = $request->input('hotel_service_type');
        $hotel_services->cost = $request->input('hotel_service_cost');
        $hotel_services->unit = $request->input('hotel_service_cost_unit');
        $hotel_services->remarks = $request->input('hotel_service_remark');
        $hotel_services->save();
        return redirect()->back()->with(['success' => 'Created Successfully']);
    }

    public function activate($id)
    {
        $service = HotelService::findorfail($id);
        $service->enable = 1;
        $service->update();
        return redirect()->route('hotels.services.list')->with(['success' => 'Successfully changed']);
    }

    public function deactivate($id)
    {
        $service = HotelService::findorfail($id);
        $service->enable = 0;
        $service->update();
        return redirect()->route('hotels.services.list')->with(['success' => 'Successfully changed']);
    }
    public function edit($id){
        $service=HotelService::findorFail($id);
        return view('Backend.Hotels.Service.edit',['service'=>$service]);
    }
    Public function update(Request $request,$id){
        $this->validate($request, [
            'hotel_service_name' => 'required',
            'hotel_service_hour' => '',
            'hotel_service_type' => '',
            'hotel_service_cost' => '',
            'hotel_service_cost_unit' => '',
            'hotel_service_description' => '',
            'hotel_service_remark' => '',
        ]);
        $hotel_services = HotelService::findorFail($id);
        $hotel_services->service_name = $request->input('hotel_service_name');
        $hotel_services->service_description = $request->input('hotel_service_description');
        $hotel_services->service_hour= $request->input('hotel_service_hour');
        $hotel_services->service_type = $request->input('hotel_service_type');
        $hotel_services->cost = $request->input('hotel_service_cost');
        $hotel_services->unit = $request->input('hotel_service_cost_unit');
        $hotel_services->remarks = $request->input('hotel_service_remark');
        $hotel_services->enable=$request->input('hotel_service_enable');
        $hotel_services->save();
        return redirect()->route('hotels.services.list')->with(['success' => 'Created Successfully']);
    }
}
