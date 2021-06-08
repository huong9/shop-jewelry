<?php

namespace App\Http\Controllers;

use App\Models\rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add_rating($id, $user_id)
    {
        $add = rating::them($id, $user_id);
        return redirect()->back()->with('success', 'Success!');
    }
    public function edit_rating($id)
    {
        $add = rating::sua($id);
        return redirect()->back()->with('success', 'Success!');
    }
    public function delete_rating($id)
    {
        $add = rating::xoa($id);
        return redirect()->back()->with('success', 'Success!');
    }
}
