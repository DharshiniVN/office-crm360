<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeExpense extends Model
{
    use HasFactory;

    protected $table = 'income_expense';

    protected $fillable = [
        'type',          // Income or Expense
        'price',        // Price
        'date',          // Date
        'project_name',  // Project Name (optional)
        'expense_for',   // Purpose for Expense (optional)
        'description',   // Description (optional)
        'bill'           // File name for uploaded bill (optional)
    ];
}
