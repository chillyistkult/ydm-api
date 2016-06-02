<?php

namespace App\Api\V1\Serializer;

use League\Fractal\Serializer\ArraySerializer;

class CustomArraySerializer extends ArraySerializer
{
    public function collection($resourceKey, array $data)
    {
        return $resourceKey ? array($resourceKey => $data) : $data;
    }
    public function item($resourceKey, array $data)
    {
        return $resourceKey ? array($resourceKey => $data) : $data;
    }
}