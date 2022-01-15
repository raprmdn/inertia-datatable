<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $loadDefault = 10;
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->q) {
            $query->where('name', 'like' , '%'. $request->q . '%')
                ->orWhere('username', 'like' , '%'. $request->q . '%');
        }

        if ($request->has(['field', 'direction'])) {
            $query->orderBy($request->field, $request->direction);
        }

        $users = new UserCollection($query->paginate($request->load));
//        $users = (
//            UserResource::collection($query->paginate($request->load))
//        )->additional([
//            'attributes' => [
//                'total' => User::count(),
//                'per_page' => 10,
//            ],
//            'filtered' => [
//                'load' => $request->load ?? $this->loadDefault,
//                'q' => $request->q ?? '',
//                'page' => $request->page ?? 1,
//                'field' => $request->field ?? '',
//                'direction' => $request->direction ?? ''
//            ]
//        ]);
        return inertia('Users/Index' , [
            'users' => $users
        ]);
    }
}
