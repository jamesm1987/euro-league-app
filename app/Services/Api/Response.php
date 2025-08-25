<?php

namespace App\Services\Api;

use App\Models\ApiLookup;
use Carbon\Carbon;

class Response
{

    public function store(string $endpoint, array $data)
    {

        return ApiLookup::create([
            'endpoint' => $endpoint,
            'response' => json_encode($data),
            'lookup_at' => Carbon::now()
        ]);
    }

}