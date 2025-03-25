<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Category\Contracts\CategoryServiceInterface;
use App\Services\Lot\Contracts\LotServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class LandingController extends AbstractController
{
    public function __construct(
        public CategoryServiceInterface $categoryService,
        public LotServiceInterface      $lotService,
    ) {
    }

    public function index(): View
    {
        return view('landing.index', [
            'pageTitle'  => 'Главная',
            'lots'       => $this->lotService->getAll(),
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    public function search(Request $request): View
    {
        $q = $request->get('text');

        return view('lot.search', [
            'pageTitle'  => 'Главная',
            'lots'       => $this->lotService->getLotBySearchQuery($q),
            'query' => $q,
        ]);

    }
}
