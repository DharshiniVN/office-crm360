<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GraphicProject;

class GraphicsController extends Controller
{
    // Show dashboard / index
    public function index()
    {
        // existing logic for dashboard
        $logoCount = GraphicProject::where('category', 'logo')->count();
        $otherCount = GraphicProject::where('category', 'other')->count();
        $catalogCount = GraphicProject::where('category', 'catalog')->count();

        return view('graphics.index', compact('logoCount', 'otherCount', 'catalogCount'));
    }

    

    // Show add form
    public function create()
    {
        return view('graphics.add');
    }

    // Store new project
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'sr_no' => 'nullable|integer',
            'project' => 'nullable|string|max:255',
            'campaign' => 'nullable|string|max:255',
            'project_name' => 'required|string|max:255',
            'domain_name' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'client_number' => 'nullable|string|max:50',
            'bdm' => 'nullable|string|max:255',
            'assigned_person' => 'nullable|string|max:255',
            'tl' => 'nullable|string|max:255',
            'project_month' => 'nullable|string|max:50',
            'project_starting_date' => 'nullable|date',
            'project_closing_date' => 'nullable|date',
            'remark' => 'nullable|string',
            'client_charges' => 'nullable|numeric',
            'initial_payment' => 'nullable|numeric',
            'second_payment' => 'nullable|numeric',
            'remaining_payment' => 'nullable|numeric',
            'project_status' => 'nullable|string|max:50',
            'client_no' => 'nullable|string|max:50',
            'mail_id' => 'nullable|email|max:255',
            'amc' => 'nullable|numeric'
        ]);

        // Only fields in $fillable will be saved
        GraphicProject::create($request->all());

        return redirect()->route('graphics.index')->with('success', 'Project added successfully!');
    }

    // Show projects by category
    public function category($category)
{
    $categories = [
        'logo' => 'Logo',
        'other' => 'Other Graphics',
        'catalog' => 'Company Profile / Catalog'
    ];

    $key = strtolower($category);
    if (!isset($categories[$key])) {
        abort(404);
    }

    // All projects in this category
    $allProjects = GraphicProject::where('category', $key)->get();

    // Only active projects
    $activeProjects = GraphicProject::where('category', $key)
        ->where('project_status', 'active')
        ->get();

    return view('graphics.category', [
        'categoryName' => $categories[$key],
        'allProjects' => $allProjects,
        'activeProjects' => $activeProjects
    ]);
}


    // View single project
    public function view($id)
    {
        $project = GraphicProject::findOrFail($id);
        return view('graphics.view', compact('project'));
    }

    // Edit project
    public function edit($id)
    {
        $project = GraphicProject::findOrFail($id);
        return view('graphics.edit', compact('project'));
    }

    // Update project
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'sr_no' => 'nullable|integer',
            'project' => 'nullable|string|max:255',
            'campaign' => 'nullable|string|max:255',
            'project_name' => 'required|string|max:255',
            'domain_name' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'client_number' => 'nullable|string|max:50',
            'bdm' => 'nullable|string|max:255',
            'assigned_person' => 'nullable|string|max:255',
            'tl' => 'nullable|string|max:255',
            'project_month' => 'nullable|string|max:50',
            'project_starting_date' => 'nullable|date',
            'project_closing_date' => 'nullable|date',
            'remark' => 'nullable|string',
            'client_charges' => 'nullable|numeric',
            'initial_payment' => 'nullable|numeric',
            'second_payment' => 'nullable|numeric',
            'remaining_payment' => 'nullable|numeric',
            'project_status' => 'nullable|string|max:50',
            'client_no' => 'nullable|string|max:50',
            'mail_id' => 'nullable|email|max:255',
            'amc' => 'nullable|numeric'
        ]);

        $project = GraphicProject::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('graphics.index')->with('success', 'Project updated successfully!');
    }

    // Delete project
    public function destroy($id)
    {
        $project = GraphicProject::findOrFail($id);
        $project->delete();

        return redirect()->route('graphics.index')->with('success', 'Project deleted successfully!');
    }
}
