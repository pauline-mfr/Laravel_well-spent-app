<?php 

namespace App\Http\Repositories;
use Illuminate\Http\Request;

class NameRepository {
    public function getName() {
      
        echo('RROOOOOAR');
        return 'it worked';
    }

    public function shout() {
        echo('echo du shout');
        return 'return';
    }
}