<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::with('product')->paginate(10);
        return view('admin.feedback.index', compact('feedback'));
    }
}
