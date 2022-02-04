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

    public static function verifyBankAccount(): array;

    public static function getBankCodes(): array;

    public static function VotersCardImageVerification(): array;

    public static function votersCardVerification(): array;

    public static function driverLicenceImageVerification(): array;

    public static function driverLicenceVerification(): array;

    public static function getCreditBureauStatement(): array;

    public static function passportVerification(): array;

    public static function faceComparison(): array;

    public static function faceEnrollment(): array;

    public static function faceLivelinessCheck(): array;

    public static function faceAuthentication(): array;

    public static function idFaceMAtching(): array;

    public static function getWalletBallance(): array;

    public static function vinIdentificationNumber(): array;

    public static function interpolBanList(): array;
}
