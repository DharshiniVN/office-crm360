@extends('layouts.app')

@section('title', 'Add Income/Expense')

@section('content')
    <div class="topbar">
        <div class="hamburger-menu">☰</div>
        <div class="h1">Add Income/Expense</div>
        <div class="topbar-buttons">
            <a href="{{ url('account-billing') }}" class="btn">Back</a>
        </div>
    </div>

    <div class="panel" style="background:var(--brand-2)">
        <div style="display:flex;align-items:center;gap:16px">
            <div style="font-size:42px">💰</div>
            <div>
                <div style="font-weight:800;font-size:24px">Add New Entry</div>
                <div class="muted">Add a new income or expense entry</div>
            </div>
        </div>
    </div>

    <div class="form-container" style="margin-top: 20px;">
        <form action="{{ route('account-billing.store-income-expense') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="">Select</option>
                    <option value="Income">Income</option>
                    <option value="Expense">Expense</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Enter amount" required>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="project_name">Project Name:</label>
                <input type="text" id="project_name" name="project_name" placeholder="Enter project name" required>
            </div>

            <div class="form-group">
                <label for="expense_for">Expense For:</label>
                <input type="text" id="expense_for" name="expense_for" placeholder="Enter expense reason" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="3" placeholder="Enter details (optional)"></textarea>
            </div>

            <div class="form-group">
                <label for="bill">Bill (Optional):</label>
                <input type="file" id="bill" name="bill" accept="image/*,.pdf">
            </div>

            <!-- ✅ Smaller Save & Cancel buttons, left bottom -->
            <div class="form-group" style="display:flex; justify-content:flex-start; gap:8px; margin-top:20px;">
                <button type="submit" class="btn" style="padding:5px 14px; font-size:13px;">Save</button>
                <a href="{{ url('account-billing.finance') }}" class="btn" style="background:#ccc; padding:5px 14px; font-size:13px;">Cancel</a>
            </div>
        </form>
    </div>
@endsection
