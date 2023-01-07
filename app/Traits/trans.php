<?php

 namespace App\Traits;

 trait Trans
 {
    ///////////////////Name////////////////////
     public function getTransNameAttribute()
     {
         if($this->name) {
             return json_decode($this->name, true)[app()->currentLocale()];
         }
         return $this->name;
     }

     public function getNameEnAttribute()
     {
         if($this->name) {
             return json_decode($this->name, true)['en'];
         }
         return '';
     }

     public function getNameArAttribute()
     {
         if($this->name) {
             return json_decode($this->name, true)['ar'];
         }

         return '';
     }

  //////////////////////////Content/////////////

     public function getTransContentAttribute()
     {
         if($this->content) {
             return json_decode($this->content, true)[app()->currentLocale()];
         }
         return $this->content;
     }

     public function getContentEnAttribute()
     {
         if($this->content) {
             return json_decode($this->content, true)['en'];
         }
         return '';
     }

     public function getContentArAttribute()
     {
         if($this->content) {
             return json_decode($this->content, true)['ar'];
         }

         return '';
     }

  //////////////////////////Description/////////////

     public function getTransDescriptionAttribute()
     {
         if($this->description) {
             return json_decode($this->description, true)[app()->currentLocale()];
         }
         return $this->description;
     }

     public function getDescriptionEnAttribute()
     {
         if($this->description) {
             return json_decode($this->description, true)['en'];
         }
         return '';
     }

     public function getDescriptionArAttribute()
     {
         if($this->description) {
             return json_decode($this->description, true)['ar'];
         }

         return '';
     }

  //////////////////////////Title/////////////

     public function getTransTitleAttribute()
     {
         if($this->title) {
             return json_decode($this->title, true)[app()->currentLocale()];
         }
         return $this->title;
     }

     public function getTitleEnAttribute()
     {
         if($this->title) {
             return json_decode($this->title, true)['en'];
         }
         return '';
     }

     public function getTitleArAttribute()
     {
         if($this->title) {
             return json_decode($this->title, true)['ar'];
         }

         return '';
     }

 }



















    //}
//protected function name(): Attribute
   //  {
     //    return Attribute::make(
    //         get: function ($value) {

     //            if($value){
    //                 return json_decode($value , true)[app()->currentLocale()];
    //             }
    //             return $value;
    //         }
    //     );
    // } -->
