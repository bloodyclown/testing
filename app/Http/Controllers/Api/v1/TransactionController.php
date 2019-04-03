<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index()
    {
        $user  = Auth::user();
        $model = Transaction::where('customerId', $user->customerId)->get();

        return response()->json(['data' => $model]);
    }

    /**
     * Creating transaction
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TransactionRequest $request)
    {
        $model = Transaction::create($request->toArray());

        return response()->json($model);
    }

    /**
     * Updating transaction
     * @param Request $request
     * @param int $transactionId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TransactionRequest $request, $transactionId)
    {
        $model         = Transaction::findOrFail($transactionId);
        $model->amount = $request->input('amount');
        $model->save();

        return response()->json($model);
    }

    /**
     * View one transaction
     * @param int $customerId
     * @param int $transactionId
     * @return \Illuminate\Http\JsonResponse
     */
    public function view($customerId, $transactionId)
    {
        $model = Transaction::where('customerId', $customerId)
            ->where('transactionId', $transactionId)
            ->first();

        if (isset($model->customerId)) {
            unset($model->customerId);
        }

        return response()->json($model);
    }

    /**
     * Deleting transaction
     * @param int $transactionId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($transactionId)
    {
        $result = 'fail';
        if ($model  = Transaction::find($transactionId)) {
            $model->delete();
            $result = 'success';
        }

        return response()->json($result);
    }

    /**
     * Searching transaction
     * @param Request $request
     * @return type
     */
    public function search(Request $request)
    {
        $transactions = Transaction::limit($request->limit ?? env('DEFAULT_LIMIT'));

        foreach ($request->toArray() as $key => $value) {
            if (in_array($key, Transaction::SEARCH_WHITE_LIST)) {
                $transactions->$key($value);
            }
        }
        return response()->json($transactions->get());
    }

}
