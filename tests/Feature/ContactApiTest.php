<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Contact;

// uses(RefreshDatabase::class);
//
//it('returns list of all contacts', function () {
//    $response = $this->get('/api/v1/contacts');
//    $response->assertOk()
//        ->assertHeader('content-type','application-/json')
//    ->assertJsonStructure([
//        '*' => ['id', 'given_name', 'family_name', 'nick_name', 'title'],
//    ]);
//});
//
//it('returns a single contact', function () {
//    $response = $this->get('/api/v1/contacts/1');
//    $response->assertStatus(200);
//    $response->assertJsonStructure(
//        ['id', 'given_name', 'family_name', 'nick_name', 'title']
//    );
//});
//
//it('returns a newly created contact', function () {
//    $attributes = Contact::factory()->raw();
//    $response = $this->post('/api/v1/contacts', $attributes);
//    $response->assertStatus(201)
//        ->assertJsonStructure(
//            ['id', 'given_name', 'family_name', 'nick_name', 'title']
//        );
//    $this->assertDatabaseHas('contacts', $attributes);
//});
//
//// TODO: Create the missing given name when creating a contact test
//it('returns create contact error when missing given name', function () {
//    $attributes = Contact::factory()->raw();
//    unset($attributes['given_name']);
//    $response = $this->post('/api/v1/contacts', $attributes);
//    $response->assertStatus(302)
//        ->assertJsonStructure(
//            ['message',]
//        );
//    $this->assertDatabaseHas('contacts', $attributes);
//});
//
//// TODO: Create the update contact test
//it('returns a updated contact', function () {
//});
//
//// TODO: Create the delete contact test
//it('returns a deleted contact', function () {
//});
