<?php

namespace IdentityPass\IdentityPass\Contracts\Nigeria;

/**
 * @param null $path url path
 *
 * @return string
 */

interface IdentityPassContract
{
    /**
     * @param null $path url path
     *
     * @return string
     */
    public static function url($path = null): string;

    public static function headers(): array;

    public static function getSecretKey(): string;

    public static function plateNumberVerification($vehicleNumber): array;

    public static function bvnOrPhoneVerification($bvnOrPhone): array;

    public static function bvn2WithFaceVerification(): array;

    public static function bvn2Verification($bvn): array;

    public static function bvn1Verification($bvn): array;

    public static function ninImageVerification($image): array;

    public static function ninWithoutFaceVerification($bvn_number): array;

    public static function ninWithFaceVerification($bvn_number, $image): array;

    public static function tinVerification($channel, $number): array;

    public static function basicCACVerification($rc_number, $company_name): array;

    public static function advanceCACVerification($rc_number, $company_name): array;

    public static function phoneNumberVerification($phone_number): array;

    public static function verifyBankAccount($account_number, $bank_code): array;

    public static function getBankCodes(): array;

    public static function VotersCardImageVerification($image): array;

    public static function votersCardVerification($state, $last_name, $number): array;

    public static function driverLicenceImageVerification($image): array;

    public static function driverLicenceVerification($dob, $number): array;

    public static function getCreditBureauStatement($phone_number, $first_name): array;

    public static function passportVerification($passport_number, $first_name, $last_name, $dob): array;

    public static function faceComparison($image_one, $image_two): array;

    public static function faceEnrollment($last_name, $first_name, $face_image, $email): array;

    public static function faceLivelinessCheck($image): array;

    public static function faceAuthentication($image): array;

    public static function idFaceMAtching($image): array;

    public static function getWalletBallance(): array;

    public static function vinIdentificationNumber($vin): array;

    public static function interpolBanList($search_mode, $image, $name): array;
}
