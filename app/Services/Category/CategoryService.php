<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\DTO\Category\CategoryStoreDto;
use App\Models\Category;
use App\Services\Category\Contracts\CategoryServiceInterface;
use Illuminate\Database\Eloquent\Collection;

final class CategoryService implements CategoryServiceInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Category::all();
    }

    /**
     * @param CategoryStoreDto $categoryStoreDto
     * @return Category|null
     */
    public function store(CategoryStoreDto $categoryStoreDto): ?Category
    {
        return Category::create([
            'name'       => $categoryStoreDto->name,
            'inner_code' => $categoryStoreDto->innerCode,
        ]);
    }

}
