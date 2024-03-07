<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Magazine;
use Exception;

class MagazineService
{
    public function getMagazinesByAttribute(string $attributeName, mixed $atrributeValue, bool $active): ?Collection
    {
        $magazineModel = new Magazine;

        if (array_search($attributeName, $magazineModel->getFillable())) {
            $magazines = Magazine::where([
                $attributeName => $atrributeValue,
                'active' => $active
            ])->get();

            if (!$magazines)
                throw new Exception(__('Magazines not found'));

            return $magazines;
        }

        return null;
    }
}
