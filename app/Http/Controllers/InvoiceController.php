<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    
    public function index(): View
    {
        $invoices = Invoice::latest()->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    public function create(): View
    {
        $users = User::where('level', 'invoices')->get();
        return view('invoices.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount'  => 'required|numeric',
            'status'  => 'required|string',
        ]);

        Invoice::create([
            'user_id' => $request->user_id,
            'amount'  => $request->amount,
            'status'  => $request->status,
        ]);

        return redirect()->route('invoices.index')->with(['success' => 'Invoice Created Successfully!']);
    }

    public function show(string $id): View
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    public function edit(string $id): View
    {
        $invoice = Invoice::findOrFail($id);
        $users = User::where('level', 'invoices')->get();
        return view('invoices.edit', compact('invoice', 'users'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount'  => 'required|numeric',
            'status'  => 'required|string',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'user_id' => $request->user_id,
            'amount'  => $request->amount,
            'status'  => $request->status,
        ]);

        return redirect()->route('invoices.index')->with(['success' => 'Invoice Updated Successfully!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with(['success' => 'Invoice Deleted Successfully!']);
    }
}
