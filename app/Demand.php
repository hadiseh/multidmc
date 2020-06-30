<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected  $fillable = [
        'user_id' , 'name' ,'email' ,'website' , 'address',
        'telephone' , 'phone' ,'telegramId' ,'whatsAppAccount' ,
        'language_id','logo','description','status' ,'code'

    ];



}
