<?php

namespace App\Http\Controllers\Concerns;

trait SharedResponses {

    function backWithSuccess(
        array $data = [], ?string 
        $message = null,
        int $status = 200
    ) {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message ?? __("Operation was successful.")
        ], status: $status);
    }

    function backWithFail(
        ?string $message = null,
        int $status = 500
    ) {
        return response()->json([
            'success' => false,
            'message' =>  $message ?? __("Something was wrong. try again later if the problem was remaind then contact support via ticket.")
        ], status: $status);
    }
}