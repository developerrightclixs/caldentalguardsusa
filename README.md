# caldentalguardsusa.com — CAL GUARDS™

Static marketing site for CAL GUARDS™ custom sports mouthguards by Cal Dental Ventures.
Built in the structural style of clutchmouthguards.com (the client's reference), using the
Cal Dental Ventures brand palette — navy, red and white — from the artwork the client supplied.

## Structure

```
index.html          Home — hero, benefits, problem, comparison, steps, colorways, athletes, journey, guarantee
mouthguards.html    The range — build features, three sport tiers, colorways, custom work, team orders
science.html        Evidence — stats, four protection factors, honest concussion note, references
journey.html        Brand story — five-chapter timeline, the supplied infographic, athletes, mission
providers.html      Conversion page — fitting steps, "Request a Fitting" form, become-a-provider
contact.html        Contact form + FAQ accordion
assets/css/style.css   Single stylesheet; design tokens at the top under :root
assets/js/main.js      Mobile nav, sticky header, scroll reveal, FAQ accordion, form handling
assets/img/            Images (see below)
```

No build step, no dependencies. Open `index.html` or drop the folder on any host.

## Typography

Both faces load from Google Fonts and are set as tokens at the top of `style.css`:

| Role | Face | Token |
| --- | --- | --- |
| Display headings (h1–h4) | **Afacad** 700 | `--display` |
| Body copy, buttons, nav | **Urbanist** | `--body` |
| Small section headings (`.eyebrow`) | **Afacad** 700, tracked out | `--label` |

Afacad is geometric rather than condensed, so it runs wider than a typical sports face.
Heading sizes were pulled back a step and tracking tightened (`-.02em`) to hold the same
visual weight — if the client wants a harder, more athletic headline later, the only change
needed is `--display`. Small headings get a short rule either side when centred.

## Button alignment

`.btn-row` follows the flow of the copy around it rather than being centred everywhere:

- **Left (default)** — rows sitting under left-aligned text, i.e. inside `.split__body`.
- **Centred** — automatic inside `.hero`, `.page-hero`, `.cta`, `.callout` and any `.center`
  container. For a standalone centred row that isn't in one of those (the "Find a Provider
  Near You" button under the home page's three steps), add `btn-row--center`.

## Animation

Set up in `style.css` (keyframes + transitions) and `main.js` (observers):

- **Hero entrance** — headline, subhead, buttons and trust row rise in on a stagger; the
  stadium glow drifts on a slow loop.
- **Scroll reveal** — elements with `.reveal` fade up as they enter view. Variants via
  `data-reveal="left|right|scale|blur"`, stagger via `data-delay="1"`–`"5"`.
- **Counters** — numbers with `data-count` animate up when scrolled into view
  (`data-prefix`, `data-suffix`, `data-decimals` optional).
- **Scroll progress bar** — thin red bar across the top, injected by JS.
- **Hover motion** — light sweep across buttons, card and icon lifts, image zoom in split
  sections, swatch rotation, pulsing step numbers and timeline markers.

Everything is disabled under `prefers-reduced-motion: reduce`, and the progress bar isn't
injected at all in that case.

## Images

| File | Source | Used for |
| --- | --- | --- |
| `cal-guards-hero.jpg` | Client WhatsApp image (full key visual) | `og:image` social share card |
| `cal-guards-product.jpg` | Cropped from the above — product stage only | Hero strip and product sections |
| `cal-guards-journey.jpg` | Client WhatsApp image (journey infographic) | Journey page and home journey section |

`cal-guards-product.jpg` is a crop of the key visual (rows 52.5%–96.5%). The full artwork
carries its own "CAL GUARDS" wordmark across the top, which fought with the page headline,
so the hero uses the product-only band. If the client sends a cleaner product render, replace
`cal-guards-product.jpg` and nothing else needs to change.

## Before this goes live — needs client input

These are placeholders in the markup, each marked so they're easy to find:

1. **Phone number** — `tel:+10000000000` / "Add client phone number" appears in every footer
   and on `contact.html`. Search-and-replace across all files.
2. **Email** — currently `info@caldentalguardsusa.com`. Confirm this mailbox exists.
3. **Address / hours** — "California, USA" and "Mon–Fri 9–5 PT" are assumptions.
4. **Social links** — the Instagram / Facebook / YouTube icons in the home footer point at `#`.
5. **Legal pages** — Privacy, Terms and Fit Guarantee links point at `#`. Pages not written.
6. **Pricing** — deliberately absent. Copy says pricing is set per provider; change if the
   client sells direct.
7. **Product tiers** — "Cal Guard Pro / Contact / Combat" on `mouthguards.html` are a proposed
   structure, not confirmed product names. Get sign-off or rename.
8. **Athlete quotes** — the cards for David Long, Mighty Midget and King Mylik are written as
   *descriptions of the guards we built*, not as quotes attributed to the athletes. Do not
   convert these into quotation marks unless the client has the athletes' actual words and
   permission to publish them.

## Claims and statistics — read before publishing

The reference site leads with hard numbers (2.3×, 42%, 56% lower concussion risk). I did not
copy those. What's on this site instead:

- The comparison card on the home page uses **1.6× lower dental-injury risk**, plus two
  non-numeric claims. The science page uses four figures (1.6×, 60%, $20k+, 15 min).
- These reflect the general direction of published sports-dentistry literature, but **they have
  not been verified against the specific papers** and no paper is cited for a specific number.
  Before launch, either confirm each figure against its source or remove it.
- `science.html` includes a deliberate section stating that mouthguard/concussion evidence is
  mixed and that no guard should be sold as concussion-proof. This is the honest position and
  it protects the client from an advertising-claims problem. I'd recommend keeping it, but
  it's the client's call.
- There's a line on `science.html` noting the page is general information, not dental advice.

The "Recommended by" section names the ADA, Academy for Sports Dentistry, AAO and AAPD and
describes their general positions. It does **not** show their logos and does not imply those
bodies endorse Cal Guards specifically — keep it that way unless the client has permission.

## Forms

Both forms (`providers.html` and `contact.html`) validate client-side and show a success
message, but **nothing is sent anywhere yet**. The submit handler in `assets/js/main.js` is
marked with `---- Replace from here with a real submission ----`. Wire it to whatever the
client uses (Formspree, a PHP handler, a CRM endpoint) before launch.

## Browser notes

- Tested at 1366px. Breakpoints at 1024px, 900px (nav collapses to a hamburger), 700px and 600px.
- `prefers-reduced-motion` disables every animation, including the counters and progress bar.
- Verified on all six pages: no console errors, no horizontal overflow, no broken images,
  all reveals resolve (no elements left stuck mid-transform), both fonts load.
- Mobile layout is written against the breakpoints but has **not** been eyeballed — the test
  browser wouldn't resize below the OS minimum window width. Worth a quick look on a phone.
