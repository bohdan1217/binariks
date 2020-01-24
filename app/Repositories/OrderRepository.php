<?php
/**
 * Created by PhpStorm.
 * User: bogdangordijcuk
 * Date: 2020-01-22
 * Time: 20:29
 */

namespace App\Repositories;

use App\Order as Model;

class OrderRepository extends CoreRepository
{

    public function __construct()
    {
        parent::__construct();
    }
    protected function getModelClass()
    {
        return Model::class;
    }
    public static function getCountOrders()
    {
        $count =  \DB::table('orders')->get()->count();
        return $count;
    }

    public function getAllOrders($perpage)
    {
        $orders = $this->startConditions()::withTrashed()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->join('status', 'orders.status_id', '=', 'status.id')
            ->select('orders.id', 'orders.user_id', 'orders.created_at', 'orders.updated_at', 'users.name','status.title as status','status.id as statusID',
                \DB::raw('ROUND(SUM(order_products.price), 2) AS sum'))
            ->groupBy('orders.id')
            ->orderBy('orders.id')
            ->toBase()
            ->paginate($perpage);
        return $orders;
    }
    public function getOneOrder($order_id)
    {
        $order = $this->startConditions()::withTrashed()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', '=', 'orders.id')
            ->join('status', 'orders.status_id', '=', 'status.id')
            ->select('orders.*', 'users.name','users.email','status.id as status',
                \DB::raw('ROUND(SUM(order_products.price), 2) AS sum'))
            ->where('orders.id', $order_id)
            ->groupBy('orders.id')
            ->orderBy('orders.id')
            ->limit(1)
            ->first();
        return $order;
    }
    public function getAllOrderProductsId($order_id)
    {
        $orderProducts = \DB::table('order_products')
            ->where('order_id', $order_id)
            ->get();
        return $orderProducts;
    }

    public function saveOrder($id)
    {
        $item = $this->getEditId($id);
        if (!$item) {
            abort(404);
        }
        $item->status_id = !empty($_POST['status_id']) ? $_POST['status_id'] : 1;
        $result = $item->update();
        return $result;
    }

    public function getStatusName($id) {
        $name = \DB::table('status')
            ->where('id', $id)->first();
        return $name;
    }

}
