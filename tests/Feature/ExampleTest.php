<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;
use function PHPUnit\Framework\assertEquals;

uses(RefreshDatabase::class);

test('test home page response',function(){
    get(route('home'))->assertOk();
});

