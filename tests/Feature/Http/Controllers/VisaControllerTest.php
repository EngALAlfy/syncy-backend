<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Visa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VisaController
 */
final class VisaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $visas = Visa::factory()->count(3)->create();

        $response = $this->get(route('visa.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VisaController::class,
            'store',
            \App\Http\Requests\VisaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = $this->faker->name();
        $number = $this->faker->word();
        $expried_month = $this->faker->word();
        $expried_year = $this->faker->word();
        $category = Category::factory()->create();

        $response = $this->post(route('visa.store'), [
            'name' => $name,
            'number' => $number,
            'expried_month' => $expried_month,
            'expried_year' => $expried_year,
            'category_id' => $category->id,
        ]);

        $visas = Visa::query()
            ->where('name', $name)
            ->where('number', $number)
            ->where('expried_month', $expried_month)
            ->where('expried_year', $expried_year)
            ->where('category_id', $category->id)
            ->get();
        $this->assertCount(1, $visas);
        $visa = $visas->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $visa = Visa::factory()->create();

        $response = $this->get(route('visa.show', $visa));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VisaController::class,
            'update',
            \App\Http\Requests\VisaUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $visa = Visa::factory()->create();
        $name = $this->faker->name();
        $number = $this->faker->word();
        $expried_month = $this->faker->word();
        $expried_year = $this->faker->word();
        $category = Category::factory()->create();

        $response = $this->put(route('visa.update', $visa), [
            'name' => $name,
            'number' => $number,
            'expried_month' => $expried_month,
            'expried_year' => $expried_year,
            'category_id' => $category->id,
        ]);

        $visa->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $visa->name);
        $this->assertEquals($number, $visa->number);
        $this->assertEquals($expried_month, $visa->expried_month);
        $this->assertEquals($expried_year, $visa->expried_year);
        $this->assertEquals($category->id, $visa->category_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $visa = Visa::factory()->create();

        $response = $this->delete(route('visa.destroy', $visa));

        $response->assertNoContent();

        $this->assertModelMissing($visa);
    }
}
