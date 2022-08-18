<?php
namespace App\Gates;

class PostGate{

        public function isAdmin()
        {
            Gate::define('isAdmin', function($user) {
           return $user->role == 'admin';
        });
        }

        public function isEditor()
        {
            Gate::define('isEditor', function($user) {
                return $user->role == 'editor';
            });
        }

        public function isUser()
        {
            Gate::define('isUser', function($user) {
                return $user->role == 'user';
            });
        }
        
      
        /* define a user role */
       

}