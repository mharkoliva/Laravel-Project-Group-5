<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Driver_model;

class UserController extends Controller
{
    protected $account;

    public function __construct(){
        $this->account = new Driver_model();
    }

    public function index(Request $request){
        //restrict users to go back to login if session has been set
        if($request->session()->get('account')){
            return view('rms_driver.home');
        }
        else{
            return redirect()->route('loginform')->with('error', 'Please login first');
        }
    }
 
    public function login(Request $request){
        // validate user's input data
        $input = $request->input();
        $rules = [
            'id_no' => 'required | numeric',
            'password' => 'required | min:5 | max:50',
        ];

        $inputs = $request->all();

        $validated = $request->validate($rules);

            // get input data with Cross Site Scripting prevention filter
            $id_no =  $request->input('id_no');
            $password =  $request->input('password');
     
            $data = $this->account->login($id_no, $password);
            if($data == "Successful"){
                $request->session()->put('account', $id_no);
                return redirect()->route('home');
            }
            else{
                return redirect()->route('loginform')->with('error', 'The ID Number or Password you entered did not match our records. Please double-check and try again');
            } 
        }

    public function home(){
        //restrict users to go to home if not logged in
        if($request->session()->get('account')){

            if ($request->session()->has('result')){
                $data['text'] = "confirm_compute";
                return view('rms_driver.home', $data);
            } else {
                $request->session()->forget('result');
                return redirect()->route('home');
            }
        }
        else{
            return redirect()->route('loginform')->with('error', 'Please login first');
        }
 
    }
 

    public function logout(Request $request){

        $request->session()->forget('account');
        $request->session()->forget('result');

        return redirect()->route('loginform');
    }
 
    public function register(Request $request){

        $input = $request->input();
        // validate input data
        $rules = [
            'id_no' => 'required | numeric',
            'id_num' => 'required | numeric',
        ];

        $inputs = $request->all();

        $validated = $request->validate($rules);

            $id_no =  $request->input('id_no');
            $id_num =  $request->input('id_num');
     
            $data = $this->account->register($id_no, $id_num);
            if($data == "Success!"){
                $request->session()->forget('result');
                return redirect()->route('home');
            }
            else{
                $request->session()->forget('result');
                return redirect()->route('home')->with('regerror',"The ID Number you entered did not match our records. Please double-check and try again");
            }
    }
 
    public function computeRevenue(Request $request){

        $input = $request->input();
        // validate input data
        $rules = [
            'startDate' => 'required',
            'endDate' => 'required',
            'id_no' => 'required | numeric',
        ];

        $inputs = $request->all();

        $validated = $request->validate($rules);

            $startDate =  $request->input('startDate');
            $endDate =  $request->input('endDate');
            $id_no =  $request->input('id_no');
     
            $data = $this->account->computeRevenue($startDate, $endDate, $id_no);
            if($data){
                $request->session()->put('result', $data);
                return view('rms_driver.home', ['text' => 'confirm_compute']);
            }
            else{
                $request->session()->forget('result');
                return redirect()->route('home')->with('error','Invalid. User not found');
            } 
    }

    public function insertMessage(Request $request)
    {
        $input = $request->input();
        // validate input data
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ];

        $inputs = $request->all();

        $validated = $request->validate($rules);
            // get input data with Cross Site Scripting prevention filter
            $data = array(
                'name' => $request->input('name'),
                'message_email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            );

            $res1 = $this->account->insertMessageRecord($data);

            if ($res1 === "Message Submitted!") {
                $request->session()->forget('result');
                return redirect()->route('home');
            } else {
                // display error if query is unsuccessful
                $request->session()->forget('result');
                echo $res1; 
            }
        }
}
