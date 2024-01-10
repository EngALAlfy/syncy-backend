<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Aaccount;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AaccountController
 */
final class AaccountControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $aaccounts = Aaccount::factory()->count(3)->create();

        $response = $this->get(route('aaccount.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AaccountController::class,
            'store',
            \App\Http\Requests\AaccountStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = $this->faker->name();
        $password = $this->faker->password();
        $category = Category::factory()->create();

        $response = $this->post(route('aaccount.store'), [
            'name' => $name,
            'password' => $password,
            'category_id' => $category->id,
        ]);

        $aaccounts = Aaccount::query()
            ->where('name', $name)
            ->where('password', $password)
            ->where('category_id', $category->id)
            ->get();
        $this->assertCount(1, $aaccounts);
        $aaccount = $aaccounts->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $aaccount = Aaccount::factory()->create();

        $response = $this->get(route('aaccount.show', $aaccount));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AaccountController::class,
            'update',
            \App\Http\Requests\AaccountUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $aaccount = Aaccount::factory()->create();
        $name = $this->faker->name();
        $password = $this->faker->password();
        $category = Category::factory()->create();

        $response = $this->put(route('aaccount.update', $aaccount), [
            'name' => $name,
            'password' => $password,
            'category_id' => $category->id,
        ]);

        $aaccount->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $aaccount->name);
        $this->assertEquals($password, $aaccount->password);
        $this->assertEquals($category->id, $aaccount->category_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $aaccount = Aaccount::factory()->create();

        $response = $this->delete(route('aaccount.destroy', $aaccount));

        $response->assertNoContent();

        $this->assertModelMissing($aaccount);
    }
}
