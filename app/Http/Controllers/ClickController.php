<?php

namespace App\Http\Controllers;

use App\Events\AllUsersClicked;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClickController extends Controller
{
    public function click()
    {
        $user = auth()->user();

        if ($user->role !== 'user') {
            abort(403);
        }

        Cache::put('user_click_' . $user->id, now(), 10);

        $users = User::where('role', 'user')->get();
        $clickedUsers = $users->filter(fn ($user) => Cache::has('user_click_' . $user->id));

        $allClicked = $clickedUsers->count() === $users->count();

        $response = [
            'message' => 'Click recorded',
            'your_click_status' => true,
            'clicked_users_count' => $clickedUsers->count(),
            'total_users' => $users->count(),
            'all_clicked' => $allClicked,
            'click_expires_at' => now()->addSeconds(10)->format('Y-m-d H:i:s')
        ];

        if ($allClicked) {
            event(new AllUsersClicked());
            Cache::flush();
            $response['message'] = 'ALL USERS CLICKED!';
        }

        return response()->json($response);
    }
}
