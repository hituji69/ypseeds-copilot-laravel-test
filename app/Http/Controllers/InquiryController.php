<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InquiryController extends Controller
{
    public function show($property_id)
    {
        $property = Property::findOrFail($property_id);
        
        return view('inquiry.form', compact('property'));
    }

    public function store(Request $request, $property_id)
    {
        $property = Property::findOrFail($property_id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // ログ出力（DB保存の代わり）
        Log::info('物件問い合わせを受信しました', [
            'property_id' => $property_id,
            'property_name' => $property->name,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'timestamp' => now()
        ]);

        return view('inquiry.complete', compact('property'));
    }
}