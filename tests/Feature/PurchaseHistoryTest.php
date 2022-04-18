<?php

namespace Tests\Feature;

use App\Models\PurchaseHistory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseHistoryTest extends TestCase
{


    /**
     * @test
     */
    public function should_return_status_code_201_and_purchase_created()
    {
        $data = [
            'buyer' =>'test',
            'description' => 'test',
            'unit_price' => 1.3,
            'amount' => 2,
            'address' => 'address test',
            'provider' => 'provider test',
        ];

        $response = $this->post($this::BASE_URL . $this::PURCHASE_URL, $data);
        $response->assertStatus(201);

    }

    /**
     * @test
     */
    public function should_return_status_code_422_when_purchase_is_null()
    {

        $response = $this->post($this::BASE_URL . $this::PURCHASE_URL);
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function should_return_status_code_204_when_purchase_is_deleted()
    {

        $purchaseHistory = PurchaseHistory::factory()->create();

        $response = $this->delete($this::BASE_URL.$this::PURCHASE_URL."/$purchaseHistory->id");

        $response->assertStatus(204);

    }

     /**
     * @test
     */
    public function should_return_status_code_404_when_the_purchases_id_not_found()
    {
        $purchaseHistory_id = 2;

        $response = $this->delete($this::BASE_URL.$this::PURCHASE_URL."/$purchaseHistory_id");

        $response->assertStatus(404);

    }
     /**
     * @test
     */
    public function should_return_status_code_200_and_purchases()
    {
        PurchaseHistory::factory()->create();

        $response = $this->get($this::BASE_URL . $this::PURCHASE_URL);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function should_return_status_code_200_when_not_exist_purchases_in_database()
    {
        $response = $this->get($this::BASE_URL . $this::PURCHASE_URL);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function should_return_status_code_200_and_purchases_by_id()
    {
        $purchaseHistory = PurchaseHistory::factory()->create();

        $response = $this->get($this::BASE_URL.$this::PURCHASE_URL."/$purchaseHistory->id");

        $response->assertStatus(200);

        $response->assertJson(['id' => $purchaseHistory->id]);
    }

    /**
     * @test
     */
    public function should_return_status_code_404_when_the_id_not_found()
    {
        $response = $this->get($this::BASE_URL.$this::PURCHASE_URL."/2");

        $response->assertStatus(404);
        $response->assertJson(['errors' => ['Not Found']]);
    }

    /**
     * @test
     */
    public function should_return_status_code_200_when_purchases_is_updated_and_return_purchases_updated()
    {

        $purchaseHistory = PurchaseHistory::factory()->create();

        $data = [
            'buyer' => 'joao',
            'description' => 'tester',
            'unit_price' => 2,
            'amount' => 3.3,
            'address' => 'tester',
            'provider' => 'testesr',
        ];

        $response = $this->put($this::BASE_URL.$this::PURCHASE_URL."/$purchaseHistory->id", $data);
        $response->assertStatus(200);
    }

}
