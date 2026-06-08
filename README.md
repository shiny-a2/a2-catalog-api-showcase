# A2 Catalog API Showcase

Public-safe showcase for a private WooCommerce catalog/search API plugin that normalizes product data for sales-assistant and product-discovery workflows.

This repository is documentation and sanitized portfolio proof only. It is not a source mirror. Production source, live endpoint details, catalog exports, product feeds, credentials, and private integration configuration stay private.

## Review Summary

- **Problem:** downstream assistants and product-discovery tools need clean catalog data, while WooCommerce stores often contain inconsistent taxonomy labels, localized attributes, stock states, and pricing records.
- **Solution:** a controlled API boundary that exposes normalized product/search responses without coupling consumers directly to WooCommerce internals.
- **Engineering focus:** authentication boundary, schema ownership, taxonomy resolution, product transformation, query safety, and predictable response shapes.
- **Public scope:** architecture, privacy boundary, reviewer path, and future sanitized examples.

## Business Context

Commerce teams increasingly need catalog data outside the storefront: sales assistants, product advisors, search tools, operational dashboards, and automation workflows. Pulling directly from WooCommerce tables or raw product pages creates brittle integrations and leaks implementation details.

The private plugin is designed as a lightweight integration layer:

1. Define canonical product/spec fields for downstream consumers.
2. Resolve localized WooCommerce taxonomies into stable API keys.
3. Transform product objects into a predictable response shape.
4. Support filtered search with pagination, stock behavior, price bounds, and sort options.
5. Keep live access guarded and configurable inside WordPress admin.
6. Avoid publishing raw catalog exports or private consumer contracts.

## What This Demonstrates

- API boundary design for WooCommerce product data and search integrations.
- Separation of authentication, schema, taxonomy resolution, endpoint handling, and product transformation.
- Localized taxonomy normalization for Persian/Arabic text and numeric attributes.
- Search request constraints for pagination, filtering, price bounds, stock behavior, and sorting.
- Response-shape discipline for downstream assistant/search consumers.
- Public-safe documentation of a private integration without exposing endpoint behavior or production data.

## Architecture Overview

The private implementation follows a small modular WordPress plugin structure:

- **Bootstrap/plugin layer:** wires shared services and registers REST endpoints during WordPress boot.
- **Authentication layer:** protects routes through a managed access key and filterable allow/deny hook.
- **Schema layer:** owns canonical product fields and maps each field to localized taxonomy metadata.
- **Taxonomy resolver:** converts canonical keys into active WooCommerce taxonomy names through rewrite metadata and normalized labels.
- **Product transformer:** converts WooCommerce products into a stable array containing identity, links, images, availability, price, categories, and optional normalized specs.
- **Search endpoint:** validates pagination, sort, stock, price, and taxonomy filters before building bounded WooCommerce product queries.
- **Admin settings:** supports controlled key regeneration and basic operator visibility without hardcoding secrets.

See `docs/architecture-notes.md` for the detailed reviewer walkthrough.

## Key Engineering Decisions

- **Canonical keys over raw taxonomy names:** consumers use stable field keys while WooCommerce taxonomy names can remain implementation-specific.
- **Localized normalization:** Persian/Arabic text variants and digits are normalized before comparison or parsing.
- **Bounded search inputs:** page size, allowed sort values, and filter formats are constrained to protect API behavior.
- **Lookup-table preference:** WooCommerce lookup data is preferred for price/stock search where available, with fallback logic for compatibility.
- **Transformer boundary:** product serialization lives outside endpoint handlers so response shape stays consistent.
- **No public consumer contract leak:** this showcase explains the design without publishing exact private request/response contracts.

## Tech Stack

- WordPress plugin architecture
- WooCommerce product data
- PHP
- REST/API design
- Catalog normalization
- Search/filter query design
- Persian/Arabic text normalization

## Privacy Boundary

Public files describe the architecture and coding approach only. Production source, live endpoint URLs, real product feeds, commercial catalog data, credentials, allowlists, debug output, and private consumer contracts remain private.

Read the full boundary in `docs/privacy-boundary.md`.

## Reviewer Path

- Start with this README for the business case and implementation shape.
- Read `docs/architecture-notes.md` for the module and API-flow walkthrough.
- Read `docs/privacy-boundary.md` for what is intentionally excluded.
- Check `docs/update-notes.md` for public-facing change history.
- Review `samples/README.md` for the Phase 3 sanitized sample plan.

## Repository Structure

- `docs/architecture-notes.md` — architecture, workflow, and engineering decisions.
- `docs/privacy-boundary.md` — what is public versus private.
- `docs/update-notes.md` — public update log.
- `samples/README.md` — planned sanitized sample-code areas.

## Phase Status

- **Phase 1:** showcase skeleton, privacy boundary, and reviewer path.
- **Phase 2:** employer-friendly business context, architecture notes, and risk boundaries.
- **Phase 3:** short sanitized API/transformer samples that demonstrate coding style without exposing production logic.

## Links

- Portfolio: <https://amiraliyaghouti.com>
- GitHub profile: <https://github.com/shiny-a2>
- Private source: `shiny-a2/a2-catalog-api` (not public)
