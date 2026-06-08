# Privacy Boundary

This public repository is designed for employer review and portfolio proof only.

## Public

- Business context for WooCommerce catalog/search API integrations.
- Architecture notes about authentication, schema ownership, taxonomy resolution, search handling, and product transformation.
- Public-safe examples of product normalization and request validation when added in Phase 3.
- Sanitized snippets that do not expose production endpoint behavior or private consumer contracts.

## Private

- Production source code.
- Real product exports, product IDs, images, brands, prices, inventory states, commercial catalog data, endpoint URLs, credentials, and allowlists.
- Customer/session data, private consumer contracts, debug SQL, logs, and integration-specific business rules.
- Exact private response contracts used by live consumers.

## Hard Rules

- Do not publish live endpoint URLs, credentials, access keys, allowlists, debug output, logs, dumps, or environment files.
- Do not publish real product exports, product identifiers, prices, stock states, images, terms, or commercial catalog data.
- Do not publish exact private request/response contracts used by live consumers.
- Do not mirror production implementation directly in public samples.

## Public Sample Standard

Samples may show structure and coding style, but they must use fictional input, generic names, simplified response shapes, and deliberately incomplete implementation details.
