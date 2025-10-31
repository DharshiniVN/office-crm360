<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    // Show all categories with project counts
    public function index()
    {
        $categories = [
            'school-management-software' => 'School Management Software',
            'billing-software' => 'Billing Software',
            'whatsapp-meta-api' => 'WhatsApp Meta API',
            'digital-visiting-card' => 'Digital Visiting Card',
            'brand-bizz' => 'Brand Bizz',
            'cloud-india-hub' => 'Cloud India Hub',
        ];

        // Fetch project count for each category
        $categoryCounts = [];
        foreach ($categories as $slug => $name) {
            $categoryCounts[$slug] = Product::where('category', $slug)->count();
        }

        return view('products.index', compact('categories', 'categoryCounts'));
    }

    // Show Add Product form
    public function create()
    {
        return view('products.add');
    }

    // Store new product
    public function store(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'category' => 'required|string',
            'closer_year' => 'nullable|integer',
            'closer_date' => 'nullable|date',
            'client_name' => 'required|string',
            'client_mobile' => 'nullable|string',
            'client_gmail' => 'nullable|email',
            'project_name' => 'nullable|string',
            'domain_name' => 'nullable|string',
            'domain_booking_place' => 'nullable|string',
            'domain_booking_date' => 'nullable|date',
            'domain_booking_year' => 'nullable|integer',
            'professional_email' => 'nullable|email',
            'no_of_email_id' => 'nullable|integer',
            'alt_email' => 'nullable|email',
            'server' => 'nullable|string',
            'client_location' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'client_dob' => 'nullable|date',
            'campaign' => 'nullable|string',
            'bdm' => 'nullable|string',
            'frontend_dev' => 'nullable|string',
            'backend_dev' => 'nullable|string',
            'project_start_date' => 'nullable|date',
            'project_deadline' => 'nullable|date',
            'demo_date' => 'nullable|date',
            'project_closer_date' => 'nullable|date',
            'final_status' => 'nullable|string',
            'project_cost' => 'nullable|numeric',
            'with_gst' => 'nullable|numeric',
            'server_cost' => 'nullable|numeric',
            'email_cost' => 'nullable|numeric',
            'initial_payment' => 'nullable|numeric',
            'second_payment' => 'nullable|numeric',
            'remaining_payment' => 'nullable|numeric',
            'pending_payment' => 'nullable|numeric',
            'remark' => 'nullable|string',
            'project_status' => 'nullable|string',
            'amc' => 'nullable|string',
            'renewal_status' => 'nullable|string',
            'renewal_month' => 'nullable|string',
            'renewal_date' => 'nullable|date',
            'renewal_items' => 'nullable|string',
            'renewal_amount' => 'nullable|numeric',
            'renewal_remark' => 'nullable|string',
        ]);

        // Create product
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    // Show edit form
    

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    // Show products by category
    public function category($category)
    {
        $categoryNames = [
            'school-management-software' => 'School Management Software',
            'billing-software' => 'Billing Software',
            'whatsapp-meta-api' => 'WhatsApp Meta API',
            'digital-visiting-card' => 'Digital Visiting Card',
            'brand-bizz' => 'Brand Bizz',
            'cloud-india-hub' => 'Cloud India Hub',
        ];

        $categoryName = $categoryNames[$category] ?? 'Unknown Category';
        $allProducts = Product::where('category', $category)->get();
        $categorySlug = $category;

        return view('products.category', compact('allProducts', 'categoryName', 'categorySlug'));
    }
    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('products.view', compact('product'));
}
public function edit($id)
{
    $product = Product::findOrFail($id);

    return view('products.edit', compact('product'));
}
public function allProducts()
{
    $allProducts = Product::all(); // fetch all products
    $categoryName = 'All Products';
    $categorySlug = 'all-products';

    return view('products.category', compact('allProducts', 'categoryName', 'categorySlug'));
}

}
