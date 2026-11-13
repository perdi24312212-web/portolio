<?php

namespace App\Http\Controllers;

use App\Models\PortfolioData;
use Illuminate\Contracts\View\View;

/**
 * Class PortfolioController
 * 
 * Mengendalikan logika presentasi portofolio Perdi (NPM: 24312212)
 */
class PortfolioController extends Controller
{
    protected PortfolioData $portfolioModel;

    public function __construct(?PortfolioData $portfolioModel = null)
    {
        $this->portfolioModel = $portfolioModel ?? PortfolioData::make();
    }

    public function index(): mixed
    {
        return view('portfolio', [
            'p' => $this->portfolioModel->all(),
            'model' => $this->portfolioModel,
        ]);
    }

    public function apiIndex()
    {
        return response()->json([
            'success' => true,
            'data' => $this->portfolioModel->all(),
        ]);
    }

    public function apiProjects()
    {
        return response()->json([
            'success' => true,
            'data' => $this->portfolioModel->getProjects(),
        ]);
    }

    public function apiSkills()
    {
        return response()->json([
            'success' => true,
            'data' => $this->portfolioModel->getSkills(),
        ]);
    }

    public function apiExperience()
    {
        return response()->json([
            'success' => true,
            'data' => $this->portfolioModel->getExperience(),
        ]);
    }
}

