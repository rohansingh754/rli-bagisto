<?php

namespace Webkul\PWA\Http\Controllers\Shop;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Webkul\Shop\Http\Requests\Customer\ProfileRequest;
use Webkul\Blog\Http\Controllers\Controller;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Enclaves\Repositories\CustomerAttributeValueRepository;


class Customer extends Controller
{

    /**
     * Controller instance
     *
     * @param  Webkul\Sales\Repositories\InvoiceRepository  $invoiceRepository
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected CustomerAttributeValueRepository $customerAttributeValueRepository,
    ) {}

    /**
     * Get customer attributes.
     *
     * @return \Illuminate\View\View
     */
    public function getCustomerAttributes()
    {
        $customer = auth()->guard()->user();
        $customer->attributes = $this->getAttributesValues($customer->id);

        return response()->json([
            'data' => $customer,
        ]);
    }

    /**
     * customer to profile.
     *
     * @param int $id
     * @return mixed
     */
    private function getAttributesValues($id)
    {
        return $this->customerAttributeValueRepository
            ->findWhere(['customer_id' => $id])
            ->groupBy('form_type');
    }

    /**
     * Update customer password.
     */
    public function updatePassword()
    {
        $customer = auth()->guard()->user();

        $data = [
            'current_password' => request()->current_password,
            'new_password' => request()->new_password,
            'new_password_confirmation' => request()->new_password_confirmation,
            'password' => request()->new_password,
        ];

        if (! empty($data['current_password'])) {
            if (Hash::check($data['current_password'], $customer->password)) {

                $data['password'] = bcrypt($data['new_password']);

                Event::dispatch('customer.update.before');

                $this->customerRepository->update($data, $customer->id);

                Event::dispatch('customer.password.update.after', $customer);

                Event::dispatch('customer.update.after', $customer);

                return response()->json([
                    'status' => 'success',
                    'message' => trans('shop::app.customers.account.profile.edit-success'),
                ]);
            } else {

                return response()->json([
                    'status' => 'error',
                    'message' => trans('shop::app.customers.account.profile.unmatch'),
                ]);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => trans('shop::app.customers.account.profile.unmatch'),
        ]);
    }
}
