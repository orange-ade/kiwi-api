<?php

namespace Kiwi\Api;

use Kiwi\Structs\Queue
  , Kiwi\Response;

class Queues
{
    public function queues()
    {
        try {
            return Response::json([
                'status' => true,
                'data' => Queue::all()
            ]);
        } catch (\PDOException $e) {
            return Response::json([
                'status' => false,
                'data' => $e->getMessage()
            ]);
        }
    }

    public function queue($args)
    {
    }
}
