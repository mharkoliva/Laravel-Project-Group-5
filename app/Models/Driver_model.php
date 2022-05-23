<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\MySqlConnection;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Driver_model extends Model
{
    use HasFactory;

    public function login($id_no, $password){
            // fetch database record that matches the posted data
            if(DB::table('account')->where('id_no', $id_no)->where('password', $password)->exists()) {
                return "Successful";
            }else{
                return "Not Successful";
            }
        }

        public function register($id_no, $id_num){
            // get current date
            $day = date('jS'); 
            $message;
            $month = date('F'); 
            $tableName = lcfirst(date('FY'));

            // check if user's input of ID Number matches login ID Number
            if ($id_no == $id_num) {
                // check if current date field exist on the database
                if (Schema::hasTable($tableName)) {
                // if ($this->db->table_exists($tableName)) {

                    if (Schema::hasColumn($tableName, $day))
                    {

                        $queryy = DB::table($tableName)->where('id_no', $id_no)->get();

                        foreach ($queryy as $result)
                        {
                            // check if user's input of ID Number matches database record
                            if($id_num == $result->id_no) {
                                // fetch database record
                                $query = DB::table($tableName)->where('id_no', $result->id_no)->first();

                                // increment value of current day column
                                $data = ($query->$day) + 1;

                                // update the value of current day column
                                DB::update('update '.$tableName.' set '.$day.' = '.$data.' where id_no = '.$result->id_no);
                            }
                        }
                    } else {
                    // create column field for the current day
                        Schema::table($tableName, function (Blueprint $table){
                            $day = date('jS'); 
                            
                            $table->string($day , 9);
                        });
                        
                        // fetch database record
                        $queryy = DB::table($tableName)->where('id_no', $id_no)->get();
                    
                        foreach ($queryy as $result)
                        {
                            // check if user's input of ID Number matches database record
                            if($id_num == $result->id_no) {

                                DB::update('update '.$tableName.' set '.$day.' = 1 where id_no = '.$result->id_no);
                            } else {
                                return "error";
                            }
                        }
                    }
                   return $message = "Success!";
                } else {
                    
                    Schema::create($tableName, function (Blueprint $table){
                        $day = date('jS');
                        $tableName = lcfirst(date('FY'));

                        $table->id($tableName.'_id')->autoIncrement()->from(1);
                        $table->foreignId('id_no');
                        $table->string($day, 5);
                    });
                    
                    DB::table($tableName)->insert([
                        'id_no' => $id_no, 
                        $day => 1
                    ]);
                }
            } else {
                return $message = "Error!";
            }
        }

        public function computeRevenue($startDate, $endDate, $id_no){
            $passengerCount = 9;
            $gas = 175;
            $allowance = 50;
            $fare = 100;
            $trip = 0;
            $totalPassengerCount = 0;
            $totalRevenue = 0;
            $id_number = $id_no;

            $period = CarbonPeriod::create($startDate, $endDate);
            foreach ($period as $datee) {
                $datee->format('Y-m-d');
            }

            $dateArr = $period->toArray();

            foreach ($dateArr as $date)
            {
                $newDate = (date_parse($date)); 

                $yearr = $newDate['year'];
                $tableName = lcfirst(date('FY', mktime(0, 0, 0, ($newDate['month'] + 1), 0, $yearr))); 

                $dayy = $newDate['day']; 
                $day = date('jS', mktime(0, 0, 0, 0, $dayy, 0)); 

                 if (Schema::hasTable($tableName)) {

                    if (Schema::hasColumn($tableName, $day))
                    {
                        // fetch database record
                        $row = DB::table($tableName)->where('id_no', $id_no)->get();

                        foreach ($row as $key) {
                            if ($key == null) {
                                $roww = 0;

                                // computation of the revenue
                                $trip = $trip + $roww;
                            } else {
                                $trip = $trip + $key->$day;
                            }
                        }

                        $totalPassengerCount = $trip * $passengerCount;
                        $tripGain = $totalPassengerCount * $fare;
                        $totalGas = $trip * $gas;
                        $totalRevenue = $tripGain - $totalGas;
                    }
                }
            }

            $array = array(
                    'startDate' => $startDate,
                    'endDate' => $endDate,
                    'totalRevenue' => $totalRevenue,
                    'fare' => $fare,
                    'totalPassengerCount' => $totalPassengerCount,
                    'trip' => $trip,
                );

            return $array;
        }

        public function insertMessageRecord($data){
            if(DB::table('contact_message')->insert([
                        'name' => $data['name'], 
                        'message_email' => $data['message_email'], 
                        'subject' => $data['subject'], 
                        'message' => $data['message'] 
                    ])){
                return "Message Submitted!";
            } else {
                return "ERROR!";
            }
        }
}
