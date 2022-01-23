<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Converter {

    public static function en2bn($text) {
        $bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার', 'পিএম', 'এএম');
        $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'pm', 'am');
        return str_replace($en, $bn, $text);
    }

    public static function desig($text) {
        $bn = array('হৃদরোগ বিশেষজ্ঞ', 'স্ত্রীরোগ বিশেষজ্ঞ', 'সফটওয়্যার');
        $en = array('Cardiologist', 'Gynecologist', 'Software');
        return str_replace($en, $bn, $text);
    }
    
    public static function age2date($age){
        $dis = date('Y') - $age;
        return date('d-m').'-'.$dis;
    }
    
    public static function date2age($data){
        $date = new DateTime($data);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

}
