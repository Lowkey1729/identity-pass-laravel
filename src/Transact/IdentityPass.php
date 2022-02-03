<?php

namespace  IdentityPass\IdentityPass\Transact;

use IdentityPass\IdentityPass\Classes\CurlClient;
use IdentityPass\IdentityPass\Contracts\Nigeria\IdentityPassContract;

class IdentityPass implements IdentityPassContract
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
     * verification of bvn or phone number
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
                'message' => 'Error exception with bvn or phone verification.',
                'error' => $exception->getMessage(),
            ];

        }
    }

    /**
     * bvn 2.0 verification
     *
     * @return array
     */
    public static function bvn2WithFaceVerification(): array
    {
    }

    /**
     * bvn 2.0 verification
     * @param $bvn
     * @return array
     */
    public static function bvn2Verification($bvn): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/bvn');

            $payload = [
                'number' => $bvn,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with bvn 2.0 verification.',
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * bvn 1.0 verification
     *
     * @return array
     */
    public static function bvn1Verification($bvn): array
    {

        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/bvn_validation');

            $payload = [
                'number' => $bvn,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with bvn 1.0 verification.',
                'error' => $exception->getMessage(),
            ];
        }

    }

    /**
     * NIN image verification
     *
     * @return array
     */
    public static function ninImageVerification($image): array
    {

        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/nin/image');

            $payload = [
                'image' => $image,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with Lookup NIN(image ) verification.',
                'error' => $exception->getMessage(),
            ];
        }


    }

    /**
     * NIN without face verification.
     *
     * @return array
     */
    public static function ninWithoutFaceVerification($bvn_number): array
    {

        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/nin_wo_face');

            $payload = [
                'number' => $bvn_number,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with Lookup NIN without face verification.',
                'error' => $exception->getMessage(),
            ];
        }


    }

    /**
     * NIN with face verification.
     *
     * @return array
     */
    public static function ninWithFaceVerification($bvn_number, $image): array
    {

        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/nin');

            $payload = [
                'number' => $bvn_number,
                'image' => $image,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with Lookup NIN with face verification.',
                'error' => $exception->getMessage(),
            ];
        }


    }

    /**
     * TIN verification.
     *
     * @return array
     */
    public static function tinVerification($channel, $number): array
    {

        try {

            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/tin');

            $payload = [
                'channel' => $channel,
                'number' => $number,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with Tax Identification Number verification.',
                'error' => $exception->getMessage(),
            ];
        }


    }

    /**
     * basic CAC verification.
     *
     * @return array
     */
    public static function basicCACVerification($rc_number, $company_name): array
    {

        try {

            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/cac');

            $payload = [
                'rc_number' => $rc_number,
                'company_name' => $company_name,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with basic CAC verification.',
                'error' => $exception->getMessage(),
            ];
        }


    }

    /**
     * advance CAC verification.
     *
     * @return array
     */
    public static function advanceCACVerification($rc_number, $company_name): array
    {

        try {

            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/cac/advance');

            $payload = [
                'rc_number' => $rc_number,
                'company_name' => $company_name,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with basic CAC verification.',
                'error' => $exception->getMessage(),
            ];
        }


    }

    /**
     * phone number  verification.
     *
     * @return array
     */
    public static function phoneNumberVerification($phone_number): array
    {

        try {

            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/phone_number/advance');

            $payload = [
                'number' => $phone_number,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with phone number verification.',
                'error' => $exception->getMessage(),
            ];
        }


    }

    /**
     * verify bank account.
     *
     * @return array
     */
    public static function verifyBankAccount($account_number, $bank_code): array
    {

        try {

            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/biometrics/merchant/data/verification/bank_account/advance');

            $payload = [
                'number' => $account_number,
                'bank_code' => $bank_code,
            ];

            $res = CurlClient::send($headers, $method, $url, json_encode($payload));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with phone number verification.',
                'error' => $exception->getMessage(),
            ];
        }

    }

    /**
     * get bank codes
     *
     * @return array
     */
    public static function getBankCodes(): array
    {

        try {

            $headers = self::headers();
            $method = 'GET';
            $url = self::url('/biometrics/merchant/data/verification/bank_code');



            $res = CurlClient::send($headers, $method, $url, json_encode(''));
            $data = json_decode($res['RESPONSE_BODY']);

            if ($res['HTTP_CODE'] == 200) {
                return [
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
                'message' => 'Error exception with fetching bank codes.',
                'error' => $exception->getMessage(),
            ];
        }


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
