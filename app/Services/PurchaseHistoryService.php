<?php

namespace App\Services;

use App\Models\PurchaseHistory;
use Illuminate\Support\Facades\DB;

class PurchaseHistoryService{

    private $purchaseHistory;

    public function __construct(PurchaseHistory $purchaseHistory)
    {
        $this->purchaseHistory = $purchaseHistory;
    }

    public function fileImport($file)
    {
        $date = file($file);
        $count = 0;
        $total = ['total' => 0];
        $dataArray = array();

        foreach ($date as $line) {
            $line = trim($line);
            $valor = preg_split("/\t+/", $line);

        if($count >= 1){

             PurchaseHistory::create([
                'buyer' => $valor[0],
                'description' => $valor[1],
                'unit_price' => $valor[2],
                'amount' => $valor[3],
                'address' => $valor[4],
                'provider' => $valor[5],
               ]);

           $total['total'] += floatval($valor[2]);
           array_push($dataArray, $valor);
        }
         $count++;
        }
        array_push($dataArray, $total);

       return $dataArray;

    }

    public function create($request)
    {
        return $this->purchaseHistory->create($request->only($this->purchaseHistory->getFillable()));
    }

    public function update($purchaseHistory_id, $request)
    {
        $purchaseHistory = $this->purchaseHistory->find($purchaseHistory_id);

        if ($purchaseHistory) {
            $purchaseHistory->buyer = $request->buyer;
            $purchaseHistory->description = $request->description;
            $purchaseHistory->unit_price = $request->unit_price;
            $purchaseHistory->amount = $request->amount;
            $purchaseHistory->address = $request->address;
            $purchaseHistory->provider = $request->provider;
            $purchaseHistory->save();
            return $purchaseHistory;
        }
        return null;
    }

    public function delete($purchaseHistory_id)
    {
        $purchaseHistory = $this->purchaseHistory->find($purchaseHistory_id);
        if ($purchaseHistory) {
            $purchaseHistory->delete($purchaseHistory_id);
            return true;
        }

        return false;
    }

    public function show($purchaseHistory_id)
    {
        $purchaseHistory = $this->purchaseHistory->find($purchaseHistory_id);
        if ($purchaseHistory) {
            return $purchaseHistory;
        }
        return false;
    }

    public function list()
    {
        return $this->purchaseHistory->all();
    }
}
