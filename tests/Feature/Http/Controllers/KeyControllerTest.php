<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Key;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\KeyController
 */
final class KeyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $keys = Key::factory()->count(3)->create();

        $response = $this->get(route('key.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KeyController::class,
            'store',
            \App\Http\Requests\KeyStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = $this->faker->name();
        $value = $this->faker->text();
        $category = Category::factory()->create();

        $response = $this->post(route('key.store'), [
            'name' => $name,
            'value' => $value,
            'category_id' => $category->id,
        ]);

        $keys = Key::query()
            ->where('name', $name)
            ->where('value', $value)
            ->where('category_id', $category->id)
            ->get();
        $this->assertCount(1, $keys);
        $key = $keys->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $key = Key::factory()->create();

        $response = $this->get(route('key.show', $key));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KeyController::class,
            'update',
            \App\Http\Requests\KeyUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $key = Key::factory()->create();
        $name = $this->faker->name();
        $value = $this->faker->text();
        $category = Category::factory()->create();

        $response = $this->put(route('key.update', $key), [
            'name' => $name,
            'value' => $value,
            'category_id' => $category->id,
        ]);

        $key->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $key->name);
        $this->assertEquals($value, $key->value);
        $this->assertEquals($category->id, $key->category_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $key = Key::factory()->create();

        $response = $this->delete(route('key.destroy', $key));

        $response->assertNoContent();

        $this->assertModelMissing($key);
    }
}
