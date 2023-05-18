<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    public function save_statistic(String $page) {
        $this->time_statistic = date('Y-m-d h:m:s');
        $this->web_page = $page;
        $this->ip_address = $_SERVER['REMOTE_ADDR'];
        $this->host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->browser_name = $_SERVER['HTTP_USER_AGENT'];
        
        $this->save();
    }
}