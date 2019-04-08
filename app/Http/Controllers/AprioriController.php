<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Association\Apriori;
use App\Order;
use App\AprioriProduct;

class AprioriController extends Controller
{

	public function get_sp()
	{
		 $order = Order::all();
		 $array_set = array();
		 foreach ($order as $or) {
		 	$order_detail = json_decode($or->order_detail,true);
		 	$array_1 = array();
			
		 	foreach($order_detail as $or)
		 	{

		 		array_push($array_1,$or['item']['id']);

		 	}
		 	array_push($array_set,$array_1);
		 }
		//$samples = [['A', 'C', 'D'], ['B', 'C', 'E'], ['A', 'B', 'C','E'], ['B', 'E']];
//         $samples = [
//             ['táo', 'lê', 'đào', 'bò', 'lợn', 'gà'],
//             ['táo', 'lê', 'dưa',  'bò', 'lợn', 'gà'],
//             ['táo', 'đào', 'lê', 'bò', 'lợn', 'gà'],
//             ['lê', 'đào', 'táo', 'bò', 'lợn', 'gà'],
//             ['táo', 'cải', 'bò', 'gà'],
//             ['táo', 'cải', 'đào' , 'lê', 'lợn']
//         ];
		$labels = [];
		$associator = new Apriori($support = 0.5, $confidence = 0.5);
		$associator->train($array_set, $labels);
        $associator->apriori();
        $associator->getRules();
        //dd($associator);
        //h tao dd nó ra nhé
        // làm sao để t lấy được dữ trong cái rules nó ra nhỉ
        foreach ($associator->getRules() as $ac)
        {
            $antecedent = json_encode($ac['antecedent']);
            $consequent = json_encode($ac['consequent']);
            $support = $ac['support'];
            $confidence = $ac['confidence'];

            $apriori = AprioriProduct::create([
                'product_id' => $antecedent,
                'apriori_product_id' => $consequent,
                'support' => $support,
                'confidence' => $confidence
            ]);
        }

	}
	
}
