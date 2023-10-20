<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctors;
use App\Models\appointment;
use App\Models\contactus;



class AdminController extends Controller
{
    public function add_doctors()
    {
        return view('admin.add_doctors');
    }
    public function add_new_doctor(Request $request)
    {
        $doctors=new doctors;
        $doctors->name=$request->name;
        $doctors->speacility=$request->speacility;
        $doctors->room=$request->room;
        $doctors->phone=$request->phone;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimages','$imagename');
        $doctors->image=$imagename;
        $doctors->save();
        return redirect()->back()->with('message','New Doctor added Successfully');
    }
    public function show_doctors()
    {
        $doctor = doctors::all();
        return view('admin.show_doctors',compact('doctor'));
    }
    public function delete_doctors($id)
    {
        $doctors= doctors::find($id);
        $doctors->delete();
        return redirect()->back()->with('message','Doctor Deleted Successfully');
    }
    public function show_appointment()
    {
        $appointment = appointment::all();
        return view('admin.show_appointment',compact('appointment'));
    }
    public function delete_appoint($id)
    {
        $appointment = appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }
    public function cancel_appoint($id)
    {
        $appointment = appointment::find($id);
        $appointment->status='canceled';
        $appointment->save();
        return redirect()->back();
    }
    public function approved_appoint($id)
    {
        $appointment = appointment::find($id);
        $appointment->status='approved';
        $appointment->save();
        return redirect()->back();
    }
    public function show_contactus()
    {
        $contactus = contactus::all();
        return view('admin.show_contactus',compact('contactus'));
    }
    public function send_mail($id)
    {
        return view('admin.send_mail');
    }
    public function edit_doctors($id)
    {
        $doctors = doctors::find($id);
        return view('admin.edit_doctors',compact('doctors'));
    }
    public function update_doctor(Request $request)
    {
        $doctors->name=$request->name;
        $doctors->speacility=$request->speacility;
        $doctors->room=$request->room;
        $doctors->phone=$request->phone;
        $image=$request->file;
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimages','$imagename');
        $doctors->image=$imagename;
        }
        $doctors->save();
        return redirect()->back()->with('message','Update Doctor Successfully');
    }
    public function doctor_search(Request $request)
    {
        $doctor = doctors::all();
        $search = $request->search;
        $doctor = doctors::where('name','Like','%'.$search.'%')->orwhere('speacility','Like','%'.$search.'%')->get();
        return view('admin.show_doctors',compact('doctor'));
    }
    public function delete_contactus($name)
    {
        $contactus = contactus::find($id);
        $contactus->delete();
        return redirect()->back();
    }
    public function search_appoint_req(Request $request)
    {
        $apppointment = appointment::all();
        $search = $request->search;
        $appointment = appointment::where('name','Like','%'.$search.'%')->get();
        return view('admin.show_appointment',compact('appointment'));
    }
}