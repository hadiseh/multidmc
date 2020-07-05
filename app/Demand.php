<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected  $fillable = [
        'user_id' , 'name' ,'email' ,'website' , 'address',
        'telephone' ,'telephone_code' , 'phone_code' ,'phone' ,'telegram_id' ,'whats_app_account' ,
        'language_id','logo','description','status' ,'code'

    ];



}
