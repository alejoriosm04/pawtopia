<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\FavoriteService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('User.user_list_title');
        $viewData['users'] = User::all();
        $viewData['breadcrumbs'] = Breadcrumbs::render('user.index');

        return view('user.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('User.create_user_title');
        $viewData['breadcrumbs'] = Breadcrumbs::render('user.create');

        return view('user.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        User::validate($request);

        $user = new User;
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setAddress($request->input('address'));
        $user->setCreditCard($request->input('credit_card') ?? '0000000000000000');
        $user->password = $request->input('password');
        $user->role = $request->input('role', 'regular');

        $user->save();

        if ($request->hasFile('image')) {
            $imageName = $user->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $user->setImage($imageName);
        } else {
            $user->setImage('default_image.png');
        }

        $user->save();

        return redirect()->route('user.index')->with('success', __('User.created_success'));
    }

    public function show($id): View
    {
        $user = User::with(['pet', 'favList', 'orders'])->findOrFail($id);

        $viewData = [];
        $viewData['user'] = $user;
        $viewData['title'] = __('User.user_details_title');
        $viewData['breadcrumbs'] = Breadcrumbs::render('user.show', $user);

        return view('user.show')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $viewData['title'] = __('User.edit_user_title');
        $viewData['user'] = User::findOrFail($id);
        $viewData['breadcrumbs'] = Breadcrumbs::render('user.edit', $viewData['user']);

        return view('user.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        User::validate($request);

        $user = User::findOrFail($id);

        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setAddress($request->input('address'));
        $user->setCreditCard($request->input('credit_card') ?? '0000000000000000');

        if ($request->hasFile('image')) {
            $imageName = $user->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $user->setImage($imageName);
        }

        $user->save();

        if ($request->input('pets')) {
            $petNames = explode(',', $request->input('pets'));
            $user->pets()->delete();
            foreach ($petNames as $petName) {
                $user->pets()->create(['name' => trim($petName)]);
            }
        }

        if ($request->input('favList')) {
            $productNames = explode(',', $request->input('favList'));
            $user->favList()->detach();
            foreach ($productNames as $productName) {
                $product = Product::where('name', $productName)->first();
                if ($product) {
                    $user->favList()->attach($product->id);
                }
            }
        }

        return redirect()->route('user.show', ['id' => $user->getId()])
            ->with('success', __('User.updated_success'));
    }

    public function addToFavorites(int $productId, FavoriteService $favoriteService): RedirectResponse
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', __('User.login_required'));
        }

        $user = Auth::user();

        if ($favoriteService->addProductToFavorites($user, $productId)) {
            return redirect()->back()->with('success', __('User.favorites_add_success'));
        }

        return redirect()->back()->with('info', __('User.favorites_add_info'));
    }

    public function delete(int $id): RedirectResponse
    {
        User::destroy($id);

        return redirect()->route('user.index')->with('success', __('User.deleted_success'));
    }

    public function orders(): View
    {
        $viewData = [];
        $viewData['title'] = __('User.orders_title');
        $viewData['subtitle'] = __('User.orders_subtitle');
        $viewData['orders'] = Order::where('user_id', Auth::user()->id)->get();
        $viewData['breadcrumbs'] = Breadcrumbs::render('user.orders');

        return view('user.orders')->with('viewData', $viewData);
    }
}
