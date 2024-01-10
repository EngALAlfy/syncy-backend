<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TodoController
 */
final class TodoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $todos = Todo::factory()->count(3)->create();

        $response = $this->get(route('todo.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TodoController::class,
            'store',
            \App\Http\Requests\TodoStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $task = $this->faker->word();
        $project_name = $this->faker->word();
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $category = Category::factory()->create();

        $response = $this->post(route('todo.store'), [
            'task' => $task,
            'project_name' => $project_name,
            'status' => $status,
            'category_id' => $category->id,
        ]);

        $todos = Todo::query()
            ->where('task', $task)
            ->where('project_name', $project_name)
            ->where('status', $status)
            ->where('category_id', $category->id)
            ->get();
        $this->assertCount(1, $todos);
        $todo = $todos->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $todo = Todo::factory()->create();

        $response = $this->get(route('todo.show', $todo));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TodoController::class,
            'update',
            \App\Http\Requests\TodoUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $todo = Todo::factory()->create();
        $task = $this->faker->word();
        $project_name = $this->faker->word();
        $status = $this->faker->randomElement(/** enum_attributes **/);
        $category = Category::factory()->create();

        $response = $this->put(route('todo.update', $todo), [
            'task' => $task,
            'project_name' => $project_name,
            'status' => $status,
            'category_id' => $category->id,
        ]);

        $todo->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($task, $todo->task);
        $this->assertEquals($project_name, $todo->project_name);
        $this->assertEquals($status, $todo->status);
        $this->assertEquals($category->id, $todo->category_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $todo = Todo::factory()->create();

        $response = $this->delete(route('todo.destroy', $todo));

        $response->assertNoContent();

        $this->assertModelMissing($todo);
    }
}
