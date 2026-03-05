<?php
use function Pest\Laravel\getJson;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

// uses(RefreshDatabase::class);

it('returns a list of all contacts', function () {
    $response = $this->get('/api/v1/contacts');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        '*' => ['id', 'given_name', 'family_name', 'nick_name', 'title'],
    ]);
});
