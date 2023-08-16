<?php

namespace Database\Seeders;

use App\Models\NursingCollege;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class NursingColleges extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nursingColleges = array(
            array('id' => '1','name' => 'College of Nursing( KEMU),Mayo Hospital , Lahore','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '2','name' => 'College Of Nurisng DHQ Faisalabad','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '3','name' => 'College of Nursing ,Nishtar Hospital Multan','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '4','name' => 'College of Nursing ,DHQ Hospital Muzaffargarh','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '5','name' => 'CON ,Bahawalpur Victoria Hospital Bahawalpur','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '6','name' => 'CON ,Ameer-ud-Din General Hospital Lahore','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '7','name' => 'College of Nursing  AIMC Jinnah Hospital , Lahore','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '8','name' => 'College Of Nurisng Layyah','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '9','name' => 'College of Nursing ,Allied Hospital Faisalabad','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '10','name' => 'College of Nursing , DHQ Hospital Dera Ghazi Khan','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '11','name' => 'College Of Nurisng Vehari','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '12','name' => 'College Of Nurisng Khanewal','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '13','name' => 'College of Nursing ,Children Hospital Lahore','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '14','name' => 'College Of Nurisng Okara','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '15','name' => 'College Of Nurisng Sargodha','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '16','name' => 'College Of Nurisng Rajanpur','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '17','name' => 'College of Nursing ,Sheikh Zayed Hospital , RYK','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '18','name' => 'College Of Nurisng Jhang','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '19','name' => 'College Of Nurisng Sahiwal','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '20','name' => 'CON ,Allama Iqbal Memorial Hospital Sialkot','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '21','name' => 'College Of Nurisng  Kasur','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '22','name' => 'College Of Nurisng Chakwal','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '23','name' => 'College Of Nurisng Sheikhupura','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '24','name' => 'CON ,(FJMU) Sir Ganga Ram Hospital Lhr','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '25','name' => 'College Of Nurisng Lodhran','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '26','name' => 'College Of Nurisng Mainwali','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '27','name' => 'College of Nursing ,Service Hospital Lahore','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '28','name' => 'College Of Nurisng Khushab','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '29','name' => 'College Of Nurisng Narowal','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '30','name' => 'College Of Nurisng Gujrat','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '31','name' => 'College Of Nurisng Pakpattan','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '32','name' => 'CON ,Holy Family Hospital , Rawalpindi','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '33','name' => 'College Of Nurisng Jhelum','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '34','name' => 'College Of Nurisng Gujranwala','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '35','name' => 'College Of Nurisng  Hospital Gojra','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '36','name' => 'College Of Nurisng Bhakkar','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '37','name' => 'College Of Nurisng Bahawalnagar','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '38','name' => 'College Of Nurisng DHQ Rawalpindi','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '39','name' => 'College Of Nurisng Hafizabad','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '40','name' => 'College Of Nurisng Mandi.B. Din','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '41','name' => 'College Of Nurisng Toba Take Singh','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '42','name' => 'CON , Benazir Bhutto Shaheed Hospital Rawalpindi','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '43','name' => 'College Of Nurisng Attock','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '44','name' => 'College Of Nursing, Teaching Hospital, Shahdara, Lahore','created_at' => Carbon::now(),'updated_at' => Carbon::now()),

        );

        NursingCollege::insert($nursingColleges);
    }
}
