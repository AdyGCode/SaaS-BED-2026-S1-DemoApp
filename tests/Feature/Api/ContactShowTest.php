<?php
use App\Models\Contact;


it('returns a single contact', function () {
    $response = $this->get('/api/v1/contacts/1');
    $response->assertStatus(200);
    $response->assertJsonStructure(
        ['id', 'given_name', 'family_name', 'nick_name', 'title']
    );
});
