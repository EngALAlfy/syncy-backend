<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ContactController
 */
final class ContactControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $contacts = Contact::factory()->count(3)->create();

        $response = $this->get(route('contact.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContactController::class,
            'store',
            \App\Http\Requests\ContactStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = $this->faker->name();
        $phone = $this->faker->phoneNumber();
        $image = $this->faker->word();
        $category = Category::factory()->create();

        $response = $this->post(route('contact.store'), [
            'name' => $name,
            'phone' => $phone,
            'image' => $image,
            'category_id' => $category->id,
        ]);

        $contacts = Contact::query()
            ->where('name', $name)
            ->where('phone', $phone)
            ->where('image', $image)
            ->where('category_id', $category->id)
            ->get();
        $this->assertCount(1, $contacts);
        $contact = $contacts->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->get(route('contact.show', $contact));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContactController::class,
            'update',
            \App\Http\Requests\ContactUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $contact = Contact::factory()->create();
        $name = $this->faker->name();
        $phone = $this->faker->phoneNumber();
        $image = $this->faker->word();
        $category = Category::factory()->create();

        $response = $this->put(route('contact.update', $contact), [
            'name' => $name,
            'phone' => $phone,
            'image' => $image,
            'category_id' => $category->id,
        ]);

        $contact->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $contact->name);
        $this->assertEquals($phone, $contact->phone);
        $this->assertEquals($image, $contact->image);
        $this->assertEquals($category->id, $contact->category_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->delete(route('contact.destroy', $contact));

        $response->assertNoContent();

        $this->assertModelMissing($contact);
    }
}
