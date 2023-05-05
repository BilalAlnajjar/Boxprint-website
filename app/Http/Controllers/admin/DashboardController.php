<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use App\Notifications\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $countUsers = User::count();
        $countOrders = Order::count();
        $countProducts = Product::count();
        $countProjects = Project::count();
        $orders = Order::get();
        return view('pages.admin.index',[
            'countUsers' => $countUsers,
            'countOrders' => $countOrders,
            'countProducts' => $countProducts,
            'countProjects' => $countProjects,
            'orders' => $orders,
        ]);
    }
}
