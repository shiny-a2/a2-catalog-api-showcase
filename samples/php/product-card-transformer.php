<?php

declare(strict_types=1);

function showcase_transform_product_card(array $product): array
{
    $regularPrice = showcase_nullable_price($product['regular_price'] ?? null);
    $salePrice = showcase_nullable_price($product['sale_price'] ?? null);
    $currentPrice = $salePrice ?? $regularPrice;

    return [
        'id' => (int) ($product['id'] ?? 0),
        'slug' => (string) ($product['slug'] ?? ''),
        'title' => (string) ($product['title'] ?? ''),
        'availability' => ! empty($product['in_stock']) ? 'in_stock' : 'out_of_stock',
        'price' => [
            'regular' => $regularPrice,
            'sale' => $salePrice,
            'current' => $currentPrice,
            'currency' => (string) ($product['currency'] ?? 'XXX'),
            'on_sale' => $salePrice !== null && $regularPrice !== null && $salePrice < $regularPrice,
        ],
        'primary_image' => showcase_public_image_url($product['images'][0] ?? null),
        'specs' => showcase_normalize_specs($product['specs'] ?? []),
    ];
}

function showcase_nullable_price($value): ?float
{
    if ($value === null || $value === '') {
        return null;
    }

    $price = (float) $value;

    return $price > 0 ? $price : null;
}

function showcase_public_image_url($value): ?string
{
    $url = filter_var((string) $value, FILTER_VALIDATE_URL);

    return $url === false ? null : $url;
}

function showcase_normalize_specs(array $specs): array
{
    $normalized = [];

    foreach ($specs as $key => $value) {
        $safeKey = strtolower(preg_replace('/[^a-z0-9_]+/i', '_', (string) $key) ?? '');

        if ($safeKey === '') {
            continue;
        }

        $normalized[$safeKey] = is_array($value) ? array_values($value) : (string) $value;
    }

    return $normalized;
}
