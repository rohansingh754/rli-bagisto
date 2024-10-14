<?php

namespace Webkul\EnclavePwa\Http\Controllers\Restapi\Shop\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Validation\ValidationException;
use Webkul\RestApi\Http\Resources\V1\Shop\Customer\CustomerResource;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Webkul\RestApi\Http\Controllers\V1\Shop\Customer\AuthController as BaseAuthController;

class AuthController extends BaseAuthController
{
    /**
     * Login the customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! EnsureFrontendRequestsAreStateful::fromFrontend($request)) {
            $request->validate([
                'device_name' => 'required',
            ]);

            $customer = $this->customerRepository->where('email', $request->email)->first();

            if (! $customer || ! Hash::check($request->password, $customer->password)) {
                throw ValidationException::withMessages([
                    'email' => trans('rest-api::app.shop.customer.accounts.error.credential-error'),
                ]);
            }

            /**
             * Preventing multiple token creation.
             */
            $customer->tokens()->delete();

            /**
             * Event passed to prepare cart after login.
             */
            Event::dispatch('customer.after.login', $customer);

            return response([
                'data'    => new CustomerResource($customer),
                'message' => trans('rest-api::app.shop.customer.accounts.logged-in-success'),
                'token'   => $customer->createToken($request->device_name, ['role:customer'])->plainTextToken,
            ]);
        }

        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return response([
                'data'    => new CustomerResource($this->resolveShopUser($request)),
                'message' => trans('rest-api::app.shop.customer.accounts.logged-in-success'),
            ]);
        }

        return response([
            'message' => trans('rest-api::app.shop.customer.accounts.error.invalid'),
        ], 401);
    }
}
