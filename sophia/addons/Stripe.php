<?php

namespace Sophia\Addon;

class Stripe
{
    public static function charge($secret, $public, $token, $price, $user_id, $name, $email, $currency = "usd")
    {
        $stripe = [
            "secret_key"      => $secret,
            "publishable_key" => $public,
        ];
        \Stripe\Stripe::setApiKey($stripe['secret_key']);
        try {
            $customer = \Stripe\Customer::create([
                'email' => $email,
                'name' => $name,
                'source'  => $token,
            ]);
            try {
                $charge = \Stripe\Charge::create([
                    'customer' => $customer->id,
                    'amount'   => $price * 100,
                    'currency' => $currency,
                    // 'automatic_payment_methods' => [
                    //   'enabled' => 'true',
                    // ],
                ]);
                if ($charge) {
                    $chargeJson = $charge->jsonSerialize();
                    if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
                        $transactionID = $chargeJson['balance_transaction'];
                        $paidAmount = $chargeJson['amount'];
                        $paidAmount = ($paidAmount / 100);
                        $paidCurrency = $chargeJson['currency'];
                        $payment_status = $chargeJson['status'];
                        if ($payment_status == 'succeeded') {
                            return [
                                "user_id" => $user_id,
                                "name" => $name,
                                "transactionID" => $transactionID,
                                "paidAmount" => $paidAmount,
                                "paidCurrency" => $paidCurrency,
                                "payment_status" => $payment_status
                            ];
                        } else {
                            return "Your Payment has Failed!";
                        }
                    } else {
                        return "Transaction has been failed!";
                    }
                } else {
                    return "Charge creation failed!";
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return "Unknown error!";
    }
}
