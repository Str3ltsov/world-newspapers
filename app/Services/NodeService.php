<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Node;
use Exception;

class NodeService
{
    public function getNodes(): Collection
    {
        return Node::all();
    }

    public function getNodesByAttribute(string $attributeName, mixed $atrributeValue): ?Collection
    {
        $nodeModel = new Node;

        if (array_search($attributeName, $nodeModel->getFillable())) {
            $nodes = Node::where($attributeName, $atrributeValue)->get();

            if (!$nodes)
                throw new Exception(__('Nodes not found'));

            return $nodes;
        }

        return null;
    }
}
