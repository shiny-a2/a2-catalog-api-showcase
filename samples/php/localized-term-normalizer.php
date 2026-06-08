<?php

declare(strict_types=1);

function showcase_normalize_localized_text(string $value): string
{
    $value = trim($value);
    $value = str_replace(['ي', 'ك', 'ة', 'ؤ', 'أ', 'إ'], ['ی', 'ک', 'ه', 'و', 'ا', 'ا'], $value);
    $value = preg_replace('/[\x{064B}-\x{065F}\x{0670}]/u', '', $value) ?? '';
    $value = preg_replace('/\s+/u', ' ', $value) ?? '';

    return trim($value);
}

function showcase_digits_to_english(string $value): string
{
    return strtr($value, [
        '۰' => '0',
        '۱' => '1',
        '۲' => '2',
        '۳' => '3',
        '۴' => '4',
        '۵' => '5',
        '۶' => '6',
        '۷' => '7',
        '۸' => '8',
        '۹' => '9',
    ]);
}

function showcase_parse_size_mm(string $label): ?int
{
    $normalized = showcase_digits_to_english(showcase_normalize_localized_text($label));

    if (preg_match('/\b(\d{2,3})\s*mm\b/i', $normalized, $match)) {
        return (int) $match[1];
    }

    if (preg_match('/^\d{2,3}$/', $normalized) === 1) {
        return (int) $normalized;
    }

    return null;
}
