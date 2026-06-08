# A2 Catalog API Showcase

Public-safe showcase for a private WooCommerce catalog/search API plugin that normalizes product data for sales-assistant and product-discovery workflows.

This repository is not a source mirror. Production source, endpoint details, catalog exports, and private integration configuration stay private.

## What This Demonstrates

- API boundary design for WooCommerce product data.
- Product transformation, taxonomy normalization, and controlled response shape thinking.
- Separation of authentication, schema, transformer, and taxonomy-resolution responsibilities.
- Public-safe architecture notes for assistant/search integrations.
- Practical tradeoffs around expensive product reads and downstream consumers.

## Tech Stack

- WordPress plugin architecture
- WooCommerce product data
- PHP
- REST/API design
- Catalog normalization

## Reviewer Path

- Portfolio: <https://amiraliyaghouti.com>
- GitHub profile: <https://github.com/shiny-a2>
- Private source: `shiny-a2/a2-catalog-api` (not public)

## Repository Structure

- `docs/privacy-boundary.md` — what is public versus private.
- `docs/update-notes.md` — public update log.
- `samples/README.md` — planned sanitized sample-code areas.

## Phase Status

Phase 1 creates the public showcase skeleton. Later phases will add architecture notes and short sanitized transformer/API snippets.
