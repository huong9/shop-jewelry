<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\color;
use App\Models\newsletter;
use App\Models\product;
use App\Models\rating;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //
    public function index()
    {
        # code...
        $prod = product::orderBy('id', 'DESC')->limit(6)->get();
        $prod_est = product::orderBy('id', 'DESC')->limit(5)->get();
        return view('index', compact('prod', 'prod_est'));
    }
    public function collection()
    {
        if (request()->color) {
            $color = request()->color;
            $getColor = color::where('name', $color)->first();
            $prod = product::where('color_id', $getColor->id)->orderBy('id', 'DESC')->get()->get();
            $prod_est = product::orderBy('sold_count', 'DESC')->where('color_id', $getColor->id)->get();
            return view('collection', compact('prod', 'prod_est'));
        }
        if (request()->gender) {
            $gender = (request()->gender == 'male') ? 0 : 1;
            $prod = product::where('sex', $gender)->orderBy('id', 'DESC')->get()->get();
            $prod_est = product::orderBy('sold_count', 'DESC')->where('sex', $gender)->get();
            return view('collection', compact('prod', 'prod_est'));
        }
        if (!request()->gender && !request()->color) {
            $prod = product::orderBy('id', 'DESC')->get();;
            $prod_est = product::orderBy('sold_count', 'DESC')->get();
            return view('collection', compact('prod', 'prod_est'));
        }
    }

    public function getListView($id, $slug)
    {
        $cate = category::where('slug', $slug)->first();
        $prod = product::find($id);
        if ($cate) {
            if (request()->color) {
                $color = request()->color;
                $getColor = color::where('name', $color)->first();
                $prod = product::where([['color_id', $getColor->id], ['category_id', $cate->id]])->orderBy('id', 'DESC')->get();
                $prod_est = product::orderBy('sold_count', 'DESC')->where([['color_id', $getColor->id], ['category_id', $cate->id]])->get();
                return view('category', compact('cate', 'prod', 'prod_est'));
            }
            if (request()->gender) {
                $gender = (request()->gender == 'male') ? 0 : 1;
                $prod = product::where([['sex', $gender], ['category_id', $cate->id]])->get();
                $prod_est = product::orderBy('sold_count', 'DESC')->where([['sex', $gender], ['category_id', $cate->id]])->orderBy('id', 'DESC')->get();
                return view('category', compact('cate', 'prod', 'prod_est'));
            }
            if (!request()->gender && !request()->color) {
                $prod = product::where('category_id', $cate->id)->get();
                $prod_est = product::orderBy('sold_count', 'DESC')->where('category_id', $cate->id)->orderBy('id', 'DESC')->get();
                return view('category', compact('cate', 'prod', 'prod_est'));
            }
        } else if ($prod) {
            $prodSale = product::prodsale();
            $cateProd = category::find($prod->category_id);
            $cates = category::paginate(5);
            $ratingAll = rating::allRating($id);
            $ratingNumber = rating::numberRating($id);
            $ratingList = rating::listRating($id);
            $rating = null;
            if (Auth::check()) {
                $rating = rating::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
                $ratingList = rating::listRatingExcept($id, Auth::user()->id);
            }
            return view('product', compact('prod', 'cateProd', 'prodSale', 'cates', 'rating', 'ratingAll', 'ratingNumber', 'ratingList'));
        } else {
            return abort(404);
        }
    }

    public function search()
    {
        if (!request()->search_str) {
            return redirect()->route('collection');
        }
        if (request()->color) {
            $color = request()->color;
            $getColor = color::where('name', $color)->first();
            $prodSearch = product::search()->where('color_id', $getColor->id)->orderBy('id', 'DESC')->get();
            $prod_est = product::search()->orderBy('sold_count', 'DESC')->where('color_id', $getColor->id)->get();
            return view('search', compact('prodSearch', 'prod_est'));
        }
        if (request()->gender) {
            $gender = (request()->gender == 'male') ? 0 : 1;
            $prodSearch = product::search()->where('sex', $gender)->orderBy('id', 'DESC')->get();
            $prod_est = product::search()->orderBy('sold_count', 'DESC')->where('sex', $gender)->get();
            return view('search', compact('prodSearch', 'prod_est'));
        }
        if (!request()->gender && !request()->color) {
            $prodSearch = product::search()->orderBy('id', 'DESC')->get();
            $prod_est = product::search()->orderBy('sold_count', 'DESC')->get();
            return view('search', compact('prodSearch', 'prod_est'));
        }
    }
    public function searchBar()
    {
        return view('searchBar');
    }
    public function contact()
    {
        return view('contact');
        # code...
    }
    public function p_contact(Request $req)
    {
        Mail::send('mail.contact', [
            'name' => $req->name,
            'content' => $req->content
        ], function ($mail) use ($req) {
            $mail->to('hienrider@gmail.com', $req->name);
            $mail->from(request()->email);
            $mail->subject('Test mail');
        });
        dd(request()->email);
        return redirect()->back()->with('success', 'Success!');
    }
    public function newsletter()
    {
        $add = newsletter::them();
        return redirect()->back()->with('success', 'You will receive notifications about our latest promotions!');
    }
}
