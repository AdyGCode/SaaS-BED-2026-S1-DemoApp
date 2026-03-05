<?php
it('returns the home page', function () {
    $response = $this->get('/');
    $response->assertStatus(200)
        ->assertSee("get started");
});
