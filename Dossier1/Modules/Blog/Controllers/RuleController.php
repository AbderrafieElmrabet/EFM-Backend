<?php

namespace Modules\Blog\Controllers;

use Illuminate\Http\Request;
use Modules\Blog\Services\RuleEngine;

class RuleController extends Controller
{
    public function testRule()
    {
        $product = [
            'stock' => 4,
            'prix' => 110
        ];

        $rule = 'stock < 5 && prix > 100';

        $engine = new RuleEngine();
        $result = $engine->evaluate($rule, $product);

        return view('Blog::test', compact('product', 'rule', 'result'));
    }
}
