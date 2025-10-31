@extends('layouts.app')

@section('title', $categoryName . ' Projects')

@section('content')
<div class="container mt-4 position-relative">

    {{-- 🔹 Floating Back Button (top-right corner) --}}
    <a href="{{ url('graphics') }}" 
       class="btn btn-secondary"
       style="position: absolute; top: 10px; right: 10px; border-radius: 8px; padding: 8px 18px;">
       ← Back
    </a>

    <h1 class="fw-bold mb-4">{{ $categoryName }} Projects</h1>

    {{-- 🔍 Top Bar (Search + Buttons in One Row) --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap" style="gap: 10px;">
        <div class="d-flex align-items-center gap-2" style="flex-wrap: wrap;">
            <input type="text" id="projectSearch" class="form-control" placeholder="Search projects..." style="width: 650px;">
            <button class="btn btn-success" id="exportCsvBtn">Export CSV</button>
            <button class="btn btn-info text-white" id="printPdfBtn">Print / Save PDF</button>
        </div>
    </div>

    {{--All Projects Section --}}
    <div class="mt-3">
        <h3 class="text-primary">All Projects ({{ $allProjects->count() }})</h3>
        @if ($allProjects->isEmpty())
            <p>No projects available.</p>
        @else
            <table class="table table-bordered" id="projectsTable">
                <thead class="table-primary">
                    <tr>
                        <th>Sr.No</th>
                        <th>Project Name</th>
                        <th>Client Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allProjects as $index => $project)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->client_name }}</td>
                            <td>
                                @if($project->project_status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @elseif($project->project_status == 'completed')
                                    <span class="badge bg-secondary">Completed</span>
                                @elseif($project->project_status == 'on hold')
                                    <span class="badge bg-warning text-dark">On Hold</span>
                                @elseif($project->project_status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-light text-dark">N/A</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('graphics.view', $project->id) }}" class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{--Active Projects Section --}}
    <div class="mt-5">
        <h3 class="text-success">Active Projects ({{ $activeProjects->count() }})</h3>
        @if ($activeProjects->isEmpty())
            <p>No active projects found.</p>
        @else
            <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>Sr.No</th>
                        <th>Project Name</th>
                        <th>Client Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activeProjects as $index => $project)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->client_name }}</td>
                            <td><span class="badge bg-success">{{ ucfirst($project->project_status) }}</span></td>
                            <td>
                                <a href="{{ route('graphics.view', $project->id) }}" class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

{{-- 🔍 JavaScript for Search, CSV, PDF --}}
<script>
    // Simple search filter
    document.getElementById('projectSearch').addEventListener('keyup', function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('#projectsTable tbody tr');
        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    });

    // Export CSV
    document.getElementById('exportCsvBtn').addEventListener('click', function() {
        let table = document.getElementById('projectsTable');
        let csv = [];
        for (let row of table.rows) {
            let cols = [...row.cells].map(cell => `"${cell.innerText}"`);
            csv.push(cols.join(','));
        }
        let blob = new Blob([csv.join('\n')], { type: 'text/csv' });
        let link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'projects.csv';
        link.click();
    });

    // Print / Save PDF
    document.getElementById('printPdfBtn').addEventListener('click', function() {
        window.print();
    });
</script>
@endsection
