<?php

namespace App\Http\Controllers;

use App\Services\CouponService;
use App\Services\ErrorService;
use Exception;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    protected $errorService;
    protected $couponService;

    public function __construct(ErrorService $errorService, CouponService $couponService) {
        $this->errorService = $errorService;
        $this->couponService = $couponService;
    }

    public function getUserCoupons() {
        $user = Auth::user();

        try {
            $coupons = $this->couponService->getUserCoupons($user);

            return response()->json([
                'coupons' => $coupons,
            ], 200);
        }
        catch(Exception $e) {
            return $this->errorService->handleException($e);
        }
    }
}
