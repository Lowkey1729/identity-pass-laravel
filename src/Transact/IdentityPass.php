<?php

namespace IdentityPass\IdentityPass\Transact;

use IdentityPass\IdentityPass\Classes\CurlClient;
use IdentityPass\IdentityPass\Config\IdentityPassConfig;
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
            return "https://api.myidentitypay.com/api/v1/biometrics/merchant$path";
        }

        return "https://sandbox.myidentitypass.com/api/v1/biometrics/merchant$path";
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
            "x-api-key: " . self::getSecretKey(),
        ];
    }

    /**
     * Get secret key
     *
     * @return string
     */
    public static function getSecretKey(): string
    {
        $config = IdentityPassConfig::getKeys();

        if (env('APP_ENV') == 'production') {
            return $config['keys']['test_secret_key'];
        }

        return $config['keys']['test_secret_key'];
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
            $url = self::url('/data/verification/vehicle');

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
            $url = self::url('/bp/verification');

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
        return '';
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
            $url = self::url('/data/verification/bvn');

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
            $url = self::url('/data/verification/bvn_validation');

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
            $url = self::url('/data/verification/nin/image');

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
            $url = self::url('/data/verification/nin_wo_face');

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
            $url = self::url('/data/verification/nin');

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
            $url = self::url('/data/verification/tin');

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
            $url = self::url('/data/verification/cac');

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
            $url = self::url('/data/verification/cac/advance');

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
            $url = self::url('/data/verification/phone_number/advance');

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
            $url = self::url('/data/verification/bank_account/advance');

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
            $url = self::url('/data/verification/bank_code');


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
                'message' => $data,
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
    public static function VotersCardImageVerification($image): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/verification/voters_card/image');

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
                'message' => "Error exception with  Voter's card image verification.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * voters card verification
     *
     * @return array
     */
    public static function votersCardVerification($state, $last_name, $number): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/verification/voters_card');

            $payload = [

                'state' => $state,
                'last_name' => $last_name,
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
                'message' => "Error exception with  Voter's card verification.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * driver licence image verification
     *
     * @return array
     */
    public static function driverLicenceImageVerification($image): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/verification/drivers_license/image');

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
                'message' => "Error exception with  driver's licence image verification.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * driver licence verification
     *
     * @return array
     */
    public static function driverLicenceVerification($dob, $number): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/verification/drivers_license');

            $payload = [

                'dob' => $dob,
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
                'message' => "Error exception with  driver's licence  verification.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * get credit bureau statement
     *
     * @return array
     */
    public static function getCreditBureauStatement($phone_number, $first_name): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/verification/credit_bureau');

            $payload = [

                'phone_number' => $phone_number,
                'first_name' => $first_name,

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
                'message' => "Error exception with credit bureau verification.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * passport verification
     *
     * @return array
     */
    public static function passportVerification($passport_number, $first_name, $last_name, $dob): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/verification/national_passport');

            $payload = [

                'number' => $passport_number,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'dob' => $dob,

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
                'message' => "Error exception with passport verification.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * face comparison
     *
     * @return array
     */
    public static function faceComparison($image_one, $image_two): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/verification/national_passport');

            $payload = [

                'image_one' => $image_one,
                'image_two' => $image_two,


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
                'message' => "Error exception with credit bureau verification.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * face enrollment
     *
     * @return array
     */
    public static function faceEnrollment($last_name, $first_name, $face_image, $email): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/user/enroll/');

            $payload = [

                'last_name' => $last_name,
                'first_name' => $first_name,
                'face_image' => $face_image,
                'email' => $email,


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
                'message' => "Error exception with face enrollment.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * face liveliness check
     *
     * @return array
     */
    public static function faceLivelinessCheck($image): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/face/liveliness_check');

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
                'message' => "Error exception with face liveliness check .",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * face authentication
     *
     * @return array
     */
    public static function faceAuthentication($image): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/user/authenticate/');

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
                'message' => "Error exception with face authentication.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * id face matching
     *
     * @return array
     */
    public static function idFaceMAtching($image): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/user/id_verification/');

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
                'message' => "Error exception with id face matching.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * get wallet balance
     *
     * @return array
     */
    public static function getWalletBallance(): array
    {
        try {
            $headers = self::headers();
            $method = 'GET';
            $url = self::url('/wallet/balance');


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
                'message' => $data,
            ];
        } catch (\Exception $exception) {
            return [
                'success' => false,
                'message' => "Error exception with fetching wallet balance.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * VIN identification number
     *
     * @return array
     */
    public static function vinIdentificationNumber($vin): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/verification/vehicle/vin');

            $payload = [

                'vin' => $vin,

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
                'message' => "Error exception with VIN identification number.",
                'error' => $exception->getMessage(),
            ];
        }
    }

    /**
     * get interpol bank list
     *
     * @return array
     */
    public static function interpolBanList($search_mode, $image, $name): array
    {
        try {
            $headers = self::headers();
            $method = 'POST';
            $url = self::url('/data/ban_list/search');

            $payload = [

                'search_mode' => $search_mode,
                'image' => $image,
                'name' => $name,

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
                'message' => "Error exception with VIN identification number.",
                'error' => $exception->getMessage(),
            ];
        }
    }
}
