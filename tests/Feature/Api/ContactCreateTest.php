<?php

use App\Models\Contact;


it('returns a newly created contact', function () {
    $attributes = Contact::factory()->raw();
    $response = $this->postJson('/api/v1/contacts', $attributes);
    $response->assertStatus(201)
        ->assertJsonStructure(
            ['id', 'given_name', 'family_name', 'nick_name', 'title']
        );
    $this->assertDatabaseHas('contacts', $attributes);
});

it('returns create contact error when missing given name', function () {
    $attributes = Contact::factory()->raw();
    unset($attributes['given_name']);

    $response = $this->postJson('/api/v1/contacts', $attributes);
    $response->assertStatus(422)
        ->assertJsonStructure([
            'message',
            'errors' => ['given_name']
        ]);

    // Beware that you may have multiple contacts with same
    // given name, so assert on a unique subset of attributes
    // to avoid false positives
    $this->assertDatabaseMissing('contacts', [
        'family_name' => $attributes['family_name'],
        'nick_name' => $attributes['nick_name'],
        'title' => $attributes['title'],
    ]);

});
