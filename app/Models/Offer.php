<?php

namespace App\Models;

use App\Http\Requests\AdminRequest\OfferRequest;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public static function start_at(OfferRequest $request)
    {
        $date = explode('/' , $request->get('start_at'));   //1-یک رشته ای میگیره حالت جداکننده داره | 2-میاد اولی درون تمام آرایه ها میریزه جدا میکنه
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];

        $time = Verta::getGregorian($year, $month ,$day);
        return join('-' , $time);    // میتاد با - هر سه متغیر جدا میکنه
    }


    public static function end_at(OfferRequest $request)
    {
        $date = explode('/' , $request->get('end_at'));   //1-یک رشته ای میگیره حالت جداکننده داره | 2-میاد اولی درون تمام آرایه ها میریزه جدا میکنه
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];

        $time = Verta::getGregorian($year,$month , $day);
        return join('-' , $time);    // میتاد با - هر سه متغیر جدا میکنه
    }

}





//protected $primaryKey = 'category_id';                                        //id not exist
//public $incrementing = false;                                                //id Auto Increment = false
