<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AccountController
 */
final class AccountControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $accounts = Account::factory()->count(3)->create();

        $response = $this->get(route('account.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccountController::class,
            'store',
            \App\Http\Requests\AccountStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = $this->faker->name();
        $password = $this->faker->password();
        $category = Category::factory()->create();

        $response = $this->post(route('account.store'), [
            'name' => $name,
            'password' => $password,
            'category_id' => $category->id,
        ]);

        $accounts = Account::query()
            ->where('name', $name)
            ->where('password', $password)
            ->where('category_id', $category->id)
            ->get();
        $this->assertCount(1, $accounts);
        $account = $accounts->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $account = Account::factory()->create();

        $response = $this->get(route('account.show', $account));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AccountController::class,
            'update',
            \App\Http\Requests\AccountUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $account = Account::factory()->create();
        $name = $this->faker->name();
        $password = $this->faker->password();
        $category = Category::factory()->create();

        $response = $this->put(route('account.update', $account), [
            'name' => $name,
            'password' => $password,
            'category_id' => $category->id,
        ]);

        $account->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $account->name);
        $this->assertEquals($password, $account->password);
        $this->assertEquals($category->id, $account->category_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $account = Account::factory()->create();

        $response = $this->delete(route('account.destroy', $account));

        $response->assertNoContent();

        $this->assertModelMissing($account);
    }
}
