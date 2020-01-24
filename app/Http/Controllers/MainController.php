<?php
namespace App\Http\Controllers;
use App\Http\Requests\OrderUpdate;
use App\Mail\OrderEmail;
use App\Repositories\OrderRepository;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends BaseController
{
    private $orderRepository;
    private $statusRepository;

    public function __construct()
    {
        parent::__construct();
        $this->orderRepository = app(OrderRepository::class);
        $this->statusRepository = app(StatusRepository::class);
    }

    public function mainPage() {
        return view('main.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = 8;
        $countOrders = OrderRepository::getCountOrders();
        $paginator = $this->orderRepository->getAllOrders($perpage);
        return view('orders.index',
            compact('countOrders', 'paginator'));
    }

    public function edit($id)
    {
        $item = $this->orderRepository->getEditId($id);
        $status = $this->statusRepository->getAllStatus();

        if (empty($item)) {
            abort(404);
        }
        $order = $this->orderRepository->getOneOrder($item->id);
        if (!$order) {
            abort(404);
        }
        $order_products = $this->orderRepository->getAllOrderProductsId($item->id);
        return view('orders.edit',
            compact('item', 'order', 'order_products', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdate $request, $id)
    {
        $result = $this->orderRepository->saveOrder($id);
        if ($result) {

            $order = $this->orderRepository->getOneOrder($id);
            if($order->status_id != $request->status_id) {

                $status_old = $this->orderRepository->getStatusName($order->status_id);
                $status_new = $this->orderRepository->getStatusName($request->status_id);

                $objDemo = new \stdClass();
                $objDemo->status_old = $status_old->title;
                $objDemo->status_new = $status_new->title;
                $objDemo->number = $id;
                $objDemo->receiver = $order->name;
                $objDemo->sender = 'Bohdan';
                Mail::to($order->email)->send(new OrderEmail($objDemo));
            }

            return redirect()
                ->route('orders.edit', $id)
                ->with(['success' => 'Saved successfully']);
        } else {
            return back()
                ->withErrors(['msg' => "Saving error"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (empty($id)){
            return back()->withErrors(['msg' => 'The order is not found']);
        }
        $res = \DB::table('orders')
            ->delete($id);
        if ($res) {
            return redirect()
                ->route('orders.index')
                ->with(['success' => "The order id [$id] deleted from BD"]);
        } else {
            return back()->withErrors(['msg' => 'Error!']);
        }
    }
}
