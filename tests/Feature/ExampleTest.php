<?php

namespace Tests\Feature;

use function Pest\Laravel\get;
use function PHPUnit\Framework\assertEquals;

test('test home page response',function(){
    get(route('home'))->assertOk();
 });

