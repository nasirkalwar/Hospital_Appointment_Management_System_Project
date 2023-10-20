<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\doctors;
use App\Models\appointment;
use App\Models\contactus;



class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = doctors::paginate(3);
                return view('home.userpage',compact('doctor'));
            }
            else
            {
                $total_doctors=doctors::all()->count();
                $total_appoints=appointment::all()->count();
                $total_users=user::where('usertype','=','0')->get()->count();
                $skin_doctors=doctors::where('speacility','=','skin')->get()->count();
                $heart_doctors=doctors::where('speacility','=','heart')->get()->count();
                $heart_appoints=appointment::where('doctor','=','heart')->get()->count();
                $skin_appoints=appointment::where('doctor','=','Nasir--skin')->get()->count();
                $general_appoints=appointment::where('doctor','=','general')->get()->count();
                return view('admin.adminpage',compact('total_users','total_doctors','skin_doctors','heart_doctors','total_appoints','heart_appoints','skin_appoints','general_appoints'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index()
    {
        $doctor = doctors::paginate(3);
        return view('home.userpage',compact('doctor'));
    }
    public function appointment(Request $request)
    {
        if(Auth::id())
        {
            $data=new appointment;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->date=$request->date;
            $data->doctor=$request->doctor;
            $data->number=$request->number;
            $data->message=$request->message;
            $data->status='In progress';
            if(Auth::id())
            {
            $data->user_id=Auth::user()->id;
            }
            $data->save();
            return redirect()->back()->with('message','Appointment Send Successfully, We will connect You Soon');
        }
        else
        {
            return redirect('/login');
        }

    }
    public function my_appointment()
    {
        if(Auth::id())
        {
            $userid= Auth::user()->id;
            $appointment = appointment::where('user_id',$userid)->get();
            return view('home.my_appointment',compact('appointment'));
        }
        else
        {
            return redirect()->back();
        }            
    }
    public function cancel_appoint($id)
    {
        $appointment= appointment::where($id);
        $appointment->delete();
        return redirect()->back()->with('message','Appointment Delete Successfully');
    }
    public function contactus()
    {
        return view('home.contactus');
    }
    public function contactus_message(Request $request)
    {
            $data=new contactus;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->subject=$request->subject;
            $data->message=$request->message;
            $data->save();
            return redirect()->back()->with('message','Message Send Successfully, We will connect You Soon');
    }
    public function doctor_search(Request $request)
    {
        $doctor = doctors::all();
        $search = $request->search;
        $doctor = doctors::where('name','Like','%'.$search.'%')->orwhere('speacility','Like','%'.$search.'%')->get();
        return view('home.userpage',compact('doctor'));
    }
    public function aboutus()
    {
        return view('home.aboutus');
    }
    public function view_doctors()
    {
        $doctor = doctors::paginate(6);
        return view('home.view_doctors',compact('doctor'));
    }
    public function search_doctor(Request $request)
    {
        $doctor = doctors::all();
        $search = $request->search;
        $doctor = doctors::where('name','Like','%'.$search.'%')->orwhere('speacility','Like','%'.$search.'%')->get();
        return view('home.view_doctors',compact('doctor'));
    }
}
