<?php

namespace  IdentityPass\IdentityPass\Transact;

use IdentityPass\IdentityPass\Classes\CurlClient;
use IdentityPass\IdentityPass\Contracts\Nigeria\IdentityPassContract;

class Identify implements IdentityPassContract
{
    /**
     * Get api endpoint
     *
     * @param null $path
     * @return string
     */
    public static function url($path = null): string
    {
        $path = $path == null ? '' : $path;

        if (env('APP_ENV') == 'production') {
            return "https://api.myidentitypay.com/api/v1$path";
        }

        return "https://sandbox.myidentitypass.com/api/v1$path";
    }

    /**
     * Add headers to request
     *
     * @return array
     */
    public static function headers(): array
    {
        return [
            'Content-Type: application/json',
            "Cache-Control: no-cache",
            "x-api-key: ".  self::getSecretKey(),
        ];
    }

    /**
     * Get secret key
     *
     * @return string
     */
    public static function getSecretKey(): string
    {
        if (env('APP_ENV') == 'production') {
            return '';
        }

        return 'test_8vlwtr29t7347nhohr99n5:ti5BCHTr-spld_ex1E1ghoCyxsI';
    }

    /**
     * plate number verification
     *
     * @param $vehicleNumber
     * @return array
     */
    public static function plateNumberVerification($vehicleNumber): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/vehicle');

            $payload = [
                'vehicle_number' => $vehicleNumber,
            ];
            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
                    'status' => true,
                    'response_code' => $data->response_code,
                    'message' => $data->message,
                    'data' => $data,
                ];
            }

            // error in transaction.
            return [
                'success' => false,
                'message' => $data->detail,
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => 'Error exception with plate number verification.',
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * verification of bvn with face
     *
     * @param $bvnOrPhone
     * @return array
     */
    public static function bvnOrPhoneVerification($bvnOrPhone): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/bp/verification');

            $payload = [
                'channel' => 'BVN',
                'number' => $bvnOrPhone,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
                    'status' => true,
                    'response_code' => $data->response_code,
                    'message' => $data->message,
                    'data' => $data,
                ];
            }

            // error in transaction.
            return [
                'success' => false,
                'message' => $data->detail,
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => 'Error exception with plate number verification.',
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * bvn 2.0 verification
     *
     * @return array
     */
    public static function bvn2Verification(): array
    {
    }

    /**
     * bvn 1.0 verification
     *
     * @return array
     */
    public static function bvn1Verification(): array
    {
    }

    /**
     * NIN image verification
     *
     * @return array
     */
    public static function ninImageVerification(): array
    {
    }

    /**
     * NIN without face verification.
     *
     * @return array
     */
    public static function ninWithoutFaceVerification(): array
    {
    }

    /**
     * NIN without face verification.
     *
     * @return array
     */
    public static function ninWithFaceVerification(): array
    {
    }

    /**
     * TIN verification.
     *
     * @return array
     */
    public static function tinVerification(): array
    {
    }

    /**
     * basic CAC verification.
     *
     * @return array
     */
    public static function basicCACVerification(): array
    {
    }

    /**
     * advance CAC verification.
     *
     * @return array
     */
    public static function advanceCACVerification(): array
    {
    }

    /**
     * phone number  verification.
     *
     * @return array
     */
    public static function phoneNumberVerification(): array
    {
    }

    /**
     * verify bank account.
     *
     * @return array
     */
    public static function verifyBankAccount(): array
    {
    }

    /**
     * get bank codes
     *
     * @return array
     */
    public static function getBankCodes(): array
    {
    }

    /**
     * voter's card image verification.
     *
     * @return array
     */
    public static function VotersCardImageVerification(): array
    {
    }

    /**
     * driver licence image verification
     *
     * @return array
     */
    public static function driverLicenceImageVerification(): array
    {
    }

    /**
     * driver licence verification
     *
     * @return array
     */
    public static function driverLicenceVerification(): array
    {
    }

    /**
     * get credit bureau statement
     *
     * @return array
     */
    public static function getCreditBureauStatement(): array
    {
    }

    /**
     * passport verification
     *
     * @return array
     */
    public static function passportVerification(): array
    {
    }

    /**
     * face comparison
     *
     * @return array
     */
    public static function faceComparison(): array
    {
    }

    /**
     * face enrollment
     *
     * @return array
     */
    public static function faceEnrollment(): array
    {
    }

    /**
     * face liveliness check
     *
     * @return array
     */
    public static function faceLivelinessCheck(): array
    {
    }

    /**
     * face authentication
     *
     * @return array
     */
    public static function faceAuthentication(): array
    {
    }

    /**
     * id face matching
     *
     * @return array
     */
    public static function idFaceMAtching(): array
    {
    }

    /**
     * get wallet balance
     *
     * @return array
     */
    public static function getWalletBallance(): array
    {
    }

    /**
     * VIN identification number
     *
     * @return array
     */
    public static function vinIdentificationNumber(): array
    {
    }

    /**
     * get interpol bank list
     *
     * @return array
     */
    public static function interpolBanList(): array
    {
    }

    /**
     * voters card verification
     *
     * @return array
     */
    public static function votersCardVerification(): array
    {
    }
}
