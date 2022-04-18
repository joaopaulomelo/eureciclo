<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseHitoryRequest;
use App\Services\PurchaseHistoryService;

class PurchaseHistoryController extends Controller
{
    private $purchaseHistory;

    public function __construct(PurchaseHistoryService $purchaseHistory)
    {
        $this->purchaseHistory = $purchaseHistory;
    }

    public function process(){
      $file = $_FILES['arquivo']['tmp_name'];

      $purchaseHistory = $this->purchaseHistory->fileImport($file);

      return  response()->json($purchaseHistory, 201);
    }

    public function create(PurchaseHitoryRequest $request)
    {
        $purchaseHistory = $this->purchaseHistory->create($request);

        return response()->json($purchaseHistory, 201);
    }

    public function update($purchaseHistory_id, PurchaseHitoryRequest $request)
    {

        $purchaseHistory = $this->purchaseHistory->update($purchaseHistory_id, $request);
        if ($purchaseHistory) {
            return response()->json($purchaseHistory, 200);
        }

        return response()->json(['errors' => ['Not Found']], 404);
    }

    public function destroy($purchaseHistory_id)
    {
        $purchaseHistory = $this->purchaseHistory->show($purchaseHistory_id);

        if (empty($purchaseHistory)) {
            return response()->json(['errors' => ['Not Found']], 404);
        }

        $this->purchaseHistory->delete($purchaseHistory_id);

        return response()->json([], 204);
    }


    public function show($purchaseHistory_id)
    {
        $purchaseHistory = $this->purchaseHistory->show($purchaseHistory_id);

        if ($purchaseHistory) {
            return response()->json($purchaseHistory, 200);
        }
        return response()->json(['errors' => ['Not Found']], 404);
    }

    public function list()
    {
        $purchaseHistory = $this->purchaseHistory->list();

        return response()->json($purchaseHistory, 200);
    }
}
