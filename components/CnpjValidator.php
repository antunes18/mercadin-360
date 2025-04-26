<?php

namespace app\components;
use yii\validators\Validator;

class CnpjValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;
        if (!$this->isValidCNPJ($value)) {
            $this->addError($model, $attribute, 'Este CNPJ não é válido.');
        }
    }

    private function isValidCNPJ($cnpj)
    {
        // Remove caracteres não numéricos
        $cnpj = preg_replace('/\D/', '', $cnpj);

        // Verifica se o CNPJ tem 14 dígitos
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Lógica de validação do CNPJ
        $cnpjBase = substr($cnpj, 0, 12);
        $digits = substr($cnpj, 12, 2);
        $calculatedDigits = $this->calculateCNPJCheckDigits($cnpjBase);

        return $digits === $calculatedDigits;
    }

    private function calculateCNPJCheckDigits($cnpjBase)
    {
        $weights1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        $weights2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        $digit1 = $this->calculateCheckDigit($cnpjBase, $weights1);
        $digit2 = $this->calculateCheckDigit($cnpjBase . $digit1, $weights2);

        return $digit1 . $digit2;
    }

    private function calculateCheckDigit($cnpjBase, $weights)
    {
        $sum = 0;
        for ($i = 0; $i < strlen($cnpjBase); $i++) {
            $sum += $cnpjBase[$i] * $weights[$i];
        }
        $remainder = $sum % 11;
        return $remainder < 2 ? 0 : 11 - $remainder;
    }
}