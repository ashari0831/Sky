<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrangersEmail;

class NewsletterController extends Controller
{
    public function store(Request $req)
    {
        StrangersEmail::create([
            'email' => $req->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/');
    }
}
