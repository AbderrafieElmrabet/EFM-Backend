<?php

namespace Modules\Blog\Services;

use Modules\Blog\Models\Produit;

use Exception;

class RuleEngine
{
    public function evaluate(string $expression, array $data): bool
    {
        try {
            foreach ($data as $key => $value) {
                $expression = str_replace($key, '$data["' . $key . '"]', $expression);
            }
            return eval("return $expression;");
        } catch (\Throwable $e) {
            return false;
        }
    }
}
