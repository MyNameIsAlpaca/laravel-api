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


        $projects = Project::with('type', 'technologies')
            ->paginate(4);

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Progetto inesistente',
            ]);
        }
    }
}
