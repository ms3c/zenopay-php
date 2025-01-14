<?php

namespace Helpers;

class Validator
{
    public static function sanitizeEmail($email)
    {
        $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        if ($sanitizedEmail === false) {
            throw new \InvalidArgumentException("Invalid email format.");
        }
        return $sanitizedEmail;
    }

    public static function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Invalid email address.");
        }
        return true;
    }

    public static function sanitizePhone($phone)
    {
        $sanitizedPhone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        if ($sanitizedPhone === false) {
            throw new \InvalidArgumentException("Invalid phone number format.");
        }
        return $sanitizedPhone;
    }

    public static function validatePhone($phone)
    {
        if (!preg_match('/^0\d{9}$/', $phone)) {
            throw new \InvalidArgumentException("Invalid phone number. It must start with 0 and be 10 digits long.");
        }
        return $phone;
    }

    public static function sanitizeAmount($amount)
    {
        if (!is_numeric($amount) || $amount <= 0) {
            throw new \InvalidArgumentException("Invalid amount. Amount must be a positive number.");
        }

        $sanitizedAmount = filter_var($amount, FILTER_SANITIZE_NUMBER_INT);
        if ($sanitizedAmount === false) {
            throw new \InvalidArgumentException("Invalid amount format.");
        }
        return $sanitizedAmount;
    }

    public static function validateName($name){
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            throw new \InvalidArgumentException("Name can only contain letters and spaces.");
        }
        return $name;
    }
   
}