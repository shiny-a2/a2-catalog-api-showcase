<?php

declare(strict_types=1);

function showcase_validate_search_request(array $body): array
{
    $allowedSorts = ['relevance', 'price_asc', 'price_desc', 'newest'];
    $sort = strtolower(trim((string) ($body['sort'] ?? 'relevance')));

    if (! in_array($sort, $allowedSorts, true)) {
        $sort = 'relevance';
    }

    return [
        'page' => max(1, (int) ($body['page'] ?? 1)),
        'size' => min(100, max(1, (int) ($body['size'] ?? 24))),
        'query' => trim((string) ($body['query'] ?? '')),
        'sort' => $sort,
        'price_min' => showcase_nullable_number($body['price_min'] ?? null),
        'price_max' => showcase_nullable_number($body['price_max'] ?? null),
        'in_stock' => showcase_nullable_bool($body['in_stock'] ?? true),
        'filters' => showcase_filter_terms($body['filters'] ?? []),
    ];
}

function showcase_nullable_number($value): ?float
{
    if ($value === null || $value === '') {
        return null;
    }

    return max(0, (float) $value);
}

function showcase_nullable_bool($value): ?bool
{
    if ($value === null) {
        return null;
    }

    return (bool) $value;
}

function showcase_filter_terms($filters): array
{
    if (! is_array($filters)) {
        return [];
    }

    $clean = [];

    foreach ($filters as $key => $ids) {
        if (! is_array($ids)) {
            continue;
        }

        $safeKey = strtolower(preg_replace('/[^a-z0-9_]+/i', '_', (string) $key) ?? '');
        $termIds = array_values(array_unique(array_filter(array_map('intval', $ids))));

        if ($safeKey !== '' && $termIds !== []) {
            $clean[$safeKey] = $termIds;
        }
    }

    return $clean;
}
