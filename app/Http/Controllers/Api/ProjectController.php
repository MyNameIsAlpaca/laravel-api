<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Pagination\Paginator;

class ProjectController extends Controller
{
    public function index()
    {


        $projects = Project::with('technologies')
            ->paginate(4);

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }
}
