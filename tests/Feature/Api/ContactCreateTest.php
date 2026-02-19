<?php
use App\Models\Contact;


it('returns a newly created contact', function () {
    $attributes = Contact::factory()->raw();
    $response = $this->post('/api/v1/contacts', $attributes);
    $response->assertStatus(201)
        ->assertJsonStructure(
            ['id', 'given_name', 'family_name', 'nick_name', 'title']
        );
    $this->assertDatabaseHas('contacts', $attributes);
});

// TODO: Create the missing given name when creating a contact test
it('returns create contact error when missing given name', function () {
    $attributes = Contact::factory()->raw();
    unset($attributes['given_name']);
    $response = $this->post('/api/v1/contacts', $attributes);
    $response->assertStatus(302)
        ->assertJsonStructure(
            ['message',]
        );
    $this->assertDatabaseHas('contacts', $attributes);
});
