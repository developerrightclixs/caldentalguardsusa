# caldentalguardsusa.com — CAL GUARDS™

Static marketing site for CAL GUARDS™ custom sports mouthguards by Cal Dental Ventures.

**The home page mirrors clutchmouthguards.com's page architecture section-for-section**, at the
client's request, rendered in the Cal Dental Ventures palette (navy + red) rather than Clutch's
black + yellow. Layout, section order and component patterns follow the reference; **all copy is
original** — see "On copying the reference" below.

## Structure

```
index.html          Home — 19 sections, mirroring the reference order (map below)
mouthguards.html    The range — build features, three sport tiers, colorways, custom work, teams
science.html        Evidence — stats, four protection factors, honest concussion note, references
journey.html        Brand story — five-chapter timeline, the supplied infographic, athletes, mission
providers.html      Conversion — fitting steps, "Request a Fitting" form, become-a-provider
contact.html        Contact form + FAQ accordion
assets/css/style.css   Single stylesheet; design tokens at the top under :root
assets/js/main.js      Mobile nav, sticky header, scroll reveal, counters, FAQ, forms
assets/img/            Images (see below)
```

No build step, no dependencies. Open `index.html` or drop the folder on any host.

## Home page section map

Mirrors the reference site top to bottom:

| # | Section | Component |
| --- | --- | --- |
| 1 | Hero — full-bleed, centred type, single pill CTA, scroll cue | `.hero` |
| 2 | The problem — big statement + supporting copy | `.section.center` |
| 3 | Full-bleed accent strip — "Protection only works if it's worn." | `.strip` |
| 4 | "Every Cal Guard includes" intro | `.section.center` |
| 5 | Two-panel split — case / guard (light panel + dark panel) | `.duo` |
| 6 | Athlete quote band — full-bleed photo + pull quote | `.quote-band` |
| 7 | Dentist Recommended — social embed grid | `.embed-grid` |
| 8 | Choose Your Protection — 3 comparison cards + verdict bars | `.compare` / `.verdict` |
| 9 | Recommended-by organisation row | `.endorse` / `.logo-row` |
| 10 | Product callout diagram — Comfortable / Protection / Reliable | `.diagram` |
| 11 | How Cal Guards Works — 3 steps + CTA | `.steps` |
| 12 | Mission statement | `.mission` |
| 13 | Second athlete quote band (flipped) | `.quote-band--flip` |
| 14 | The future of mouthguards + CTA | `.section.center` |
| 15 | Guarantee — "We stand behind our work" | `.guarantee` |
| 16 | Performance mouthguards — Designed for Power & Balance | `.split` |
| 17 | "Did you know" fact band + science link | `.didyouknow` |
| 18 | Certified providers | `.split` |
| 19 | Final CTA + footer with contact form | `.cta` / `.site-footer` |

## On copying the reference

Section order, layout patterns and visual rhythm follow the reference site. The **text does not**.
Marketing copy is the reference site's own creative work, and reproducing it verbatim on a
competitor's site would be a copyright problem for the client — so every headline and paragraph
here is written fresh for Cal Guards. If the client wants wording closer to the reference, that is
a conversation to have with them explicitly, not something to copy across silently.

Two places where I deliberately did **not** follow the reference:

- **Performance claims** (section 16). The reference asserts increased peak power output, lowered
  cortisol, and a PGA ban. Those are contested in the literature and would expose the client to an
  advertising-claims problem. The section is written around jaw position and bite balance instead,
  with an on-page note for the client. Delete that note once they decide.
- **Concussion claims** (section 17). The reference leads with "60% less concussions". The evidence
  there is genuinely mixed. Section 17 uses a dental-injury figure instead, and `science.html`
  carries a short section stating the honest position.

## Images

| File | Source | Used for |
| --- | --- | --- |
| `cal-guards-hero.jpg` | Client WhatsApp image (full key visual) | `og:image` social share card |
| `cal-guards-product.jpg` | Cropped from the above — product stage only | Hero, duo panel, product sections |
| `cal-guards-journey.jpg` | Client WhatsApp image (journey infographic) | Journey page, providers section |

`cal-guards-product.jpg` is a crop of the key visual (rows 52.5%–96.5%). The full artwork carries
its own "CAL GUARDS" wordmark across the top, which fought with the page headline.

## Placeholders — what the client still owes us

Every slot is built to the correct size and clearly labelled on-page. Swap the `.ph` element for an
`<img>` and the layout does not move.

| Where | Asset needed |
| --- | --- |
| Home §5 | Carry case photo — 1600 × 1000 |
| Home §6, §13 | Two athlete action shots — portrait, min 900 × 1200 |
| Home §7 | Four Instagram embeds (paste embed code over the placeholder) |
| Home §10 | 3D guard render — transparent PNG preferred |
| Home §16 | Performance / training shot |

Also unresolved:

1. **Athlete quotes** (§6, §13) are explicitly marked placeholder text. Do not ship real names
   against invented words — get approved statements first.
2. **Phone number** — `tel:+10000000000` / "Add client phone number" in every footer and on
   `contact.html`. Search and replace.
3. **Email** — `info@caldentalguardsusa.com`. Confirm the mailbox exists.
4. **Address / hours** — "California, USA" and "Mon–Fri 9–5 PT" are assumptions.
5. **Social links** — footer icons point at `#`.
6. **Legal pages** — Privacy, Terms, Fit Guarantee all point at `#`. Not written.
7. **Pricing** — absent by design; copy says pricing is set per provider.
8. **Product tiers** — "Pro / Contact / Combat" on `mouthguards.html` are proposed, not confirmed.
9. **The §5 offer** — the reference ships two guards plus a case. I wrote "one scan, one guard,
   plus a case" because the client's actual offer is unknown. Confirm before launch.
10. **Organisation endorsements** (§9) are shown as text, not logos. Using ADA/AAO/etc. logos needs
    their permission; the current treatment only describes their general published positions.
11. **Material spec** — the guarantee block has a placeholder line about biocompatibility standard.

## Statistics — verify before publishing

The figures used (1.6× dental-injury risk, 60% upper-front-teeth, $20k+ lifetime cost, 15 min chair
time) point in the direction of published sports-dentistry literature but **have not been verified
against specific papers**. Confirm each against its source or remove it. `science.html` lists general
references and carries a "not dental advice" line.

## Typography

| Role | Face | Token |
| --- | --- | --- |
| Display headings (h1–h4) | **Afacad** 700 | `--display` |
| Body copy, buttons, nav | **Urbanist** | `--body` |
| Small section headings (`.eyebrow`) | **Afacad** 700, tracked out | `--label` |

Afacad is geometric rather than condensed, so it runs wider than a typical sports face. Heading
sizes were pulled back a step and tracking tightened (`-.02em`). To change the headline character,
change `--display` — nothing else needs touching.

## Button alignment

`.btn-row` follows the flow of the copy around it:

- **Left (default)** — rows under left-aligned text, i.e. inside `.split__body`.
- **Centred** — automatic inside `.hero`, `.page-hero`, `.cta`, `.callout` and any `.center`
  container. For a standalone centred row outside those, add `btn-row--center`.

## Animation

- **Hero entrance** — headline, subhead and CTA rise in on a stagger; stadium glow drifts.
- **Scroll reveal** — `.reveal` fades up on entry. Variants via `data-reveal="left|right|scale|blur"`,
  stagger via `data-delay="1"`–`"5"`.
  - Do **not** put `data-reveal="left|right"` on a full-bleed element — the horizontal transform
    pushes past the viewport. `html { overflow-x: clip }` is a safety net, but use a vertical
    reveal on full-bleed sections.
  - An instant jump (anchor deep link, browser scroll restoration) moves elements from below the
    viewport to above it without crossing it, so no intersection callback fires. A throttled scroll
    sweep in `main.js` reveals anything already passed.
- **Counters** — `data-count` animates up on entry (`data-prefix`, `data-suffix`, `data-decimals`).
- **Scroll progress bar** — injected by JS.
- **Hover** — button light sweep, card and icon lifts, image zoom, swatch rotation, pulsing markers.

All disabled under `prefers-reduced-motion: reduce`; the progress bar isn't injected at all.

## Forms

Three forms (`providers.html`, `contact.html`, and the home page footer) validate client-side and
show a success message, but **nothing is sent anywhere**. The handler in `main.js` is marked
`---- Replace from here with a real submission ----`. Wire it up before launch.

## Browser notes

- Tested at 1366px. Breakpoints at 1024px, 900px (nav collapses to a hamburger), 700px, 600px.
- Verified on all six pages: no console errors from site code, no horizontal overflow, no broken
  images, all scroll reveals resolve.
- Mobile layout is written against the breakpoints but has **not** been eyeballed — the test browser
  would not resize below the OS minimum window width. Worth a look on a real phone.
- When testing locally, hard-reload (Ctrl+Shift+R) after editing `main.js` — the dev server sends
  cacheable responses and Chrome will happily serve a stale copy.
