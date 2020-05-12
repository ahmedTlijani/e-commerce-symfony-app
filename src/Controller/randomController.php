<?php
// testin php controller

// src/Controller/randomController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class randomController
{
     /**
     * @Route("/lucky/number")
     */

    public function number()
    {
        $post_data = array(
            'infomation' => array(
              'name' => "ahmed",
              'surname' => "tlijani",
              'level' => "+99",
              'health' => "no bad",
              'more' => ["1","2","3"]
             )
          );
          
        (object) $a = json_encode($post_data);
        
        $number = random_int(0, 100);

        return new Response(
           //'<html><body>Lucky number: '.$number.'</body></html>'
           $a
         );
    }
}