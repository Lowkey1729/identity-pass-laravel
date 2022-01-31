<?php

namespace  IdentityPass\IdentityPass\Transact;

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
            return "https://api.myidentitypay.com$path";
        }

        return "https://sandbox.myidentitypass.com$path";
    }

    /**
     * Add headers to request
     *
     * @return array
     */
    public static function headers(): array
    {
    }

    /**
     * Get secret key
     *
     * @return array
     */
    public static function getSecretKey(): array
    {
    }

    /**
     * plate number verification
     *
     * @return array
     */
    public static function plateNumberVerification(): array
    {
    }

    /**
     * verification of bvn with face
     *
     * @return array
     */
    public static function bvnWithFaceVerification(): array
    {
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
