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

<<<<<<< HEAD
    public static function plateNumberVerification(): array;
=======

    public static function plateNumberVerification($vehicleNumber): array;
>>>>>>> e55e055 (api integration)

    public static function bvnWithFaceVerification(): array;

    public static function bvn2Verification(): array;

    public static function bvn1Verification(): array;

    public static function ninImageVerification(): array;

    public static function ninWithoutFaceVerification(): array;

    public static function ninWithFaceVerification(): array;

    public static function tinVerification(): array;

    public static function basicCACVerification(): array;

    public static function advanceCACVerification(): array;

    public static function phoneNumberVerification(): array;

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
