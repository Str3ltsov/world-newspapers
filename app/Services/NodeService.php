<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Node;
use Exception;

class NodeService
{
    public function getNodeByAttribute(string $attributeName, mixed $atrributeValue): ?Node
    {
        $nodeModel = new Node;

        if (array_search($attributeName, $nodeModel->getFillable())) {
            $node = Node::where($attributeName, $atrributeValue)->first();

            if (!$node)
                throw new Exception(__('Node not found'));

            return $node;
        }

        return null;
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
