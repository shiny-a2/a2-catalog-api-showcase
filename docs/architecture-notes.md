# Architecture Notes

This document explains the private catalog API at a reviewer-friendly level without exposing production source code, endpoint URLs, catalog exports, credentials, or private consumer contracts.

## Operating Model

The plugin acts as a controlled integration layer between WooCommerce and downstream product-discovery consumers. Instead of letting external systems depend on WordPress tables, product pages, or raw WooCommerce object structure, the plugin owns a stable API boundary.

## Module Responsibilities

1. **Plugin bootstrap** — creates shared services and registers API/admin behavior at the correct WordPress lifecycle points.
2. **Authentication** — checks a managed access key and supports a filterable allow/deny decision for controlled internal integrations.
3. **Schema ownership** — defines canonical field keys that downstream consumers can rely on.
4. **Taxonomy resolution** — maps canonical keys to active WooCommerce taxonomies through rewrite metadata and normalized labels.
5. **Product transformation** — serializes WooCommerce products into a stable response structure with optional normalized specs.
6. **Search handling** — turns validated request inputs into bounded product queries with pagination, filters, stock behavior, and sort rules.
7. **Admin controls** — lets authorized operators regenerate access credentials without committing secrets to source control.

## API Flow

1. A consumer requests schema, terms, product detail, or search data.
2. The access boundary rejects unauthorized requests before catalog work begins.
3. Request parameters are normalized and constrained.
4. Canonical filter keys are resolved to WooCommerce taxonomies.
5. Product queries are built through WordPress/WooCommerce APIs and optimized where safe.
6. Product objects are transformed into a consumer-focused response shape.
7. Optional debug or operational details remain private and are not part of the public showcase.

## Search Design Notes

- Page and size are bounded to prevent expensive unbounded reads.
- Sort values are restricted to known modes.
- Stock filtering defaults to safer catalog behavior while allowing explicit override.
- Price filtering prefers WooCommerce lookup data when available.
- Taxonomy filters are keyed by canonical field names, not raw taxonomy names.
- Fallback behavior exists for stores where stock/lookup data is incomplete.

## Normalization Design Notes

Localized catalog data needs normalization before it becomes useful for search and assistant workflows. The private implementation accounts for Persian/Arabic character variants, digit conversion, whitespace behavior, and parseable numeric specs such as sizes.

## Privacy Design Notes

The public showcase intentionally avoids:

- live route paths and endpoint examples;
- real product IDs, terms, brands, prices, images, and catalog exports;
- credentials, allowlists, admin screenshots, debug SQL, or private consumer contracts;
- direct copies of production implementation.

Phase 3 samples are simplified review snippets that demonstrate design judgment without exposing production behavior.
