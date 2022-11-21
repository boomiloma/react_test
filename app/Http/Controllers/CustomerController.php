<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private CustomerService $customerService)
    {
    }

    public function paginate(Request $request)
    {
        return $this->customerService->paginate($request);
    }

    public function all()
    {
        return response()->json(Customer::all(), 200);
    }

    public function store(CustomerRequest $request)
    {
        return $this->customerService->store($request->all());
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        return $this->customerService->update($customer, $request->all());
    }

    public function delete(Customer $customer)
    {
        return $this->customerService->delete($customer);
    }

    public function get(Customer $customer)
    {
        return response()->json($customer, 200);
    }


}
