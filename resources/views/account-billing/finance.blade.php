@extends('layouts.app')

@section('title', 'Income & Expense')

@section('content')
<div style="max-width: 1200px; margin: auto; padding: 20px;">

    {{-- Header + Buttons --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1 style="font-size: 20px; font-weight: 900; margin: 0;">Income & Expense</h1>

        <div style="display: flex; gap: 10px;">
            <a href="{{ route('account-billing.index') }}"
               style="padding: 10px 18px; background: #fff; color: #000; text-decoration: none;
                      border-radius: 10px; border: 1px solid #ddd; font-weight: bold;">
                Back
            </a>

            <a href="{{ route('account-billing.add-income-expense') }}"
               style="padding: 10px 30px; background: #0061FF; color: #fff; text-decoration: none;
                      border-radius: 10px; font-weight: bold;">
                + Add Income/Expense
            </a>
        </div>
    </div>

    {{-- Financial Tracking Banner --}}
    <div style="background: #D6EAFF; border-radius: 18px; padding: 20px;
                display: flex; align-items: center; gap: 15px; margin-bottom: 25px;">
        <div style="font-size: 55px;">💰</div>
        <div>
            <div style="font-size: 26px; font-weight: 900;">Financial Tracking</div>
            <div style="color: #555; font-size: 15px;">
                Track income and expenses for better financial management
            </div>
        </div>
    </div>

    {{-- Income - Expense --}}
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">

        {{-- Income Card --}}
        <div onclick="window.location='{{ route('account-billing.income-report') }}';"
             style="background: #CDE7FF; flex: 1 1 calc(50% - 10px);
                    padding: 20px; border-radius: 20px;
                    position: relative; cursor: pointer;">
            <div style="position: absolute; top: 10px; right: 15px;
                        background: #EDE3FF; padding: 5px 12px;
                        border-radius: 12px; font-size: 12px; font-weight: bold;">
                This Month
            </div>
            <div style="font-size: 20px; font-weight: 900;">Income</div>
            <div style="color: #555;">Monthly income tracking</div>
            <div style="font-size: 32px; font-weight: 900; margin-top: 10px;">
                ₹{{ number_format($totalIncome ?? 0, 0) }}
            </div>
        </div>

        {{-- Expense Card --}}
        <div onclick="window.location='{{ route('account-billing.expense-report') }}';"
             style="background: #E8FDF2; flex: 1 1 calc(50% - 10px);
                    padding: 20px; border-radius: 20px;
                    position: relative; cursor: pointer;">
            <div style="position: absolute; top: 10px; right: 15px;
                        background: #EDE3FF; padding: 5px 12px;
                        border-radius: 12px; font-size: 12px; font-weight: bold;">
                This Month
            </div>
            <div style="font-size: 20px; font-weight: 900;">Expense</div>
            <div style="color: #555;">Monthly expense tracking</div>
            <div style="font-size: 32px; font-weight: 900; margin-top: 10px;">
                ₹{{ number_format($totalExpense ?? 0, 0) }}
            </div>
        </div>

    </div>

</div>
@endsection
