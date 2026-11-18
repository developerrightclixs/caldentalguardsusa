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
| 5 | Two-panel split — scan / guard (light panel + dark panel) | `.duo` |
| 6 | Athlete quote band — full-bleed photo + pull quote | `.quote-band` |
| 7 | Dentist Recommended — three-image clinical gallery | `.embed-grid` |
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
| 19 | Final CTA + footer (email / phone, no form) | `.cta` / `.site-footer` |

## On copying the reference

Section order, layout patterns and visual rhythm follow the reference site. The **text does not**.
Marketing copy is the reference site's own creative work, and reproducing it verbatim on a
competitor's site would be a copyright problem for the client — so every headline and paragraph
here is written fresh for Cal Guards. If the client wants wording closer to the reference, that is
a conversation to have with them explicitly, not something to copy across silently.

Two places where I deliberately did **not** follow the reference:

- **Performance claims** (section 16). The reference asserts increased peak power output, lowered
  cortisol, and a PGA ban. Those are contested in the literature and would expose the client to an
  advertising-claims problem, so they are not repeated. The section now runs on the client's own
  **patented anterior ramp** instead — what the raised front contour physically does (gives the
  lower jaw a defined place to land, so the bite settles consistently rather than being clenched
  into position). That is a structural description of their actual product, not a performance
  claim, and it is backed by their own render. **Open item:** "patented" is a legal assertion —
  get the patent number from the client and consider displaying it.
- **Concussion claims** (section 17). The reference leads with "60% less concussions". The evidence
  there is genuinely mixed. Section 17 uses a dental-injury figure instead, and `science.html`
  carries a short section stating the honest position.

## Images

### Client-supplied (the real thing)

| File | Source | Used for |
| --- | --- | --- |
| `cal-guards-hero.jpg` | Client key visual (3 colourways on dark stage) | `og:image` social share card |
| `cal-guards-product.jpg` | Product-only crop of the key visual | Hero, §5 duo right panel |
| `cal-guards-journey.jpg` | Client journey infographic | Journey page, providers section |
| `cal-guards-arch-plate.jpg` | "Upper Jaw – Full Roof of Mouth View" render, full branded plate | *unused — available* |
| `cal-guards-side-plate.jpg` | "Upper Jaw – Right Side View" render, full branded plate | *unused — available* |
| `cal-guards-ramp-plate.jpg` | "Patented Anterior Ramp Design" render with magnifier callout | §16 performance section |
| `guard-arch.jpg` | Product-only crop of the arch plate | §10 product diagram |
| `guard-side.jpg` | Product-only crop of the side-view plate | §7 gallery |

The three new renders are supplied as finished branded plates with the CAL GUARDS wordmark and a
caption baked in. Where a section already carries its own heading, a **product-only crop** is used
so the artwork's wordmark doesn't compete with the page headline (`guard-arch.jpg`, `guard-side.jpg`).
The ramp plate is used **whole** — its caption and magnified callout are the point of that section.
Both plates and crops are kept, so either can be swapped in without re-cutting anything.

### Stock photography — temporary, replace with the client's own

Real photographs from **Pexels** (free for commercial use, no attribution required). Provenance for
every file, with photo IDs and source pages, is in `assets/img/CREDITS.json`.

| File | Shows | Used for |
| --- | --- | --- |
| `clinic.jpg` | Clinicians reviewing a digital scan on screen | §5 "It Starts With a Scan" |
| `athlete-football.jpg` | American football players in a huddle | §6 athlete quote band |
| `fitting.jpg` | Dentist treating a patient | §7 gallery |
| `smile.jpg` | Close-up of a healthy smile | §7 gallery |
| `athlete-boxing.jpg` | Boxer with wrapped hands | §13 athlete quote band |

Three stock images were **deleted** when the client's renders arrived, because the real product
was simply better: `dental-model.jpg` (a stock implant model — off-topic, implants aren't
mouthguards), `guard-anatomy.jpg` (stock transparent jaw model) and `performance.jpg` (stock gym
shot). Only five stock images remain, all of people — which is the category the client can't easily
shoot themselves.

**Read this before launch — a representation problem.**
The two quote bands pair a *generic stock athlete photo* with a *named real athlete*
(David Long, Los Angeles Rams; King Mylik). The people in those photographs are not those
athletes. Published as-is, a reader will reasonably assume they are, which is misleading and
exposes the client. Before launch, either:

- replace both with real photographs of the named athletes (preferred), **or**
- remove the names and run the bands as anonymous sports imagery.

The quote text in both bands is also explicitly marked placeholder — do not ship invented words
against a real person's name.

Two further notes on the stock images:

- `athlete-football.jpg` contains visible third-party marks (college team branding, helmet and
  apparel logos). Common in sports stock and licensed for commercial use, but worth the client's
  eye before it sits next to their product.
- A branded dental device shot (`digital-scan.jpg`) was pulled during the build because it showed
  another manufacturer's equipment and serial plate — not something to put on this client's site.
  Watch for the same issue in any replacement imagery.

## Still needed from the client

1. **Athlete photography and approved quotes** — see the representation note above.
2. **Phone number** — `tel:+10000000000` / "Add client phone number" in every footer and on
   `contact.html`. Search and replace.
3. **Email** — `info@caldentalguardsusa.com`. Confirm the mailbox exists.
4. **Address / hours** — "California, USA" and "Mon–Fri 9–5 PT" are assumptions.
5. **Social links** — footer icons point at `#`.
6. **Legal pages** — Privacy, Terms, Fit Guarantee all point at `#`. Not written.
7. **Pricing** — absent by design; copy says pricing is set per provider.
8. **Product tiers** — "Pro / Contact / Combat" on `mouthguards.html` are proposed, not confirmed.
9. **Organisation endorsements** (§9) are shown as text, not logos. Using ADA/AAO/etc. logos needs
   their permission; the current treatment only describes their general published positions.
10. **Material spec** — the guarantee block has a placeholder line about biocompatibility standard.
11. **Product photography** — the guard renders have now arrived and three stock images were
    retired as a result. Still missing: a carry-case shot (if a case is actually part of the
    offer), and renders of the clear and black colourways to match the blue ones.

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
sizes were pulled back a step and tracking tightened (`-.025em`). To change the headline character,
change `--display` — nothing else needs touching.

**Headings are mixed-case, not uppercase.** An earlier pass set every heading in caps; that is the
single biggest thing that makes a page read as machine-assembled — it flattens Afacad's lowercase
shapes and ascender rhythm, and the reference site doesn't do it either. Caps are now reserved for
genuinely small labels: `.eyebrow`, `.card__label`, buttons, nav, roles and the logo. The decorative
rules that used to flank every centred eyebrow were removed for the same reason.

## Layout & spacing

Tuned against the client's review screenshots (kept in `Fixes/`). The complaints were
consistent: too much dead space left/right, too much vertical air, and images dwarfed by the
text beside them.

| Token | Was | Now | Why |
| --- | --- | --- | --- |
| `--wrap` | 1200px | **1280px** | Wider content block |
| `--wrap-narrow` | 820px | **1010px** | The big one — text-only sections (science, FAQs, "did you know") had ~300px of dead gutter each side |
| `--section-y` | clamp(4rem, 9vw, 8rem) | **clamp(2.75rem, 5.5vw, 5.25rem)** | Vertical whitespace cut roughly a third |
| `.section--tight` | clamp(3rem, 6vw, 5rem) | **clamp(2rem, 4vw, 3.5rem)** | — |
| `.section-head` margin | clamp(2.5rem, 5vw, 4rem) | **clamp(1.6rem, 3vw, 2.5rem)** | — |

Centred statement blocks were also being throttled by a narrow `max-width` in characters,
which is what produced the empty bands around short headlines:
`.callout__big` 20ch → 26ch, `.mission__statement` 24ch → 32ch, `.didyouknow__fact` 26ch → 34ch,
`.lede` 62ch → 68ch.

Net effect on the home page: **12,565px → 11,122px tall** at 1366px wide, with no content removed.

### Images in split sections

`cal-guards-product.jpg` is a 2.4:1 crop — fine full-bleed, but beside a tall text column it
rendered as a short, weak strip. Those three splits now use the client's 4:3 plates instead:

| Page | Section | Now uses |
| --- | --- | --- |
| `journey.html` | "Protection Shouldn't Be a Luxury" | `cal-guards-arch-plate.jpg` |
| `providers.html` | "Become a Certified Provider" | `cal-guards-side-plate.jpg` |
| `mouthguards.html` | "Make It Yours" | `cal-guards-hero.jpg` (shows all three colourways) |

### Forms

Field padding, row gaps and textarea height were all reduced, and a `.split--top` modifier
top-aligns a split whose columns differ a lot in height. Vertically centring a short paragraph
against a seven-field form is what made the form look oversized.

## Button alignment

`.btn-row` follows the flow of the copy around it:

- **Left (default)** — rows under left-aligned text, i.e. inside `.split__body`.
- **Centred** — automatic inside `.hero`, `.page-hero`, `.cta`, `.callout`, `.didyouknow`,
  `.mission` and any `.center` container. For a standalone centred row outside those, add
  `btn-row--center`.

`.didyouknow` and `.mission` were missing from that list, which left their buttons hard against
the left edge of an otherwise centred section. If you add a new centred section type, add it to
the rule — or give its button row `btn-row--center`.

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

Two forms — `providers.html` ("Request a Fitting") and `contact.html` — validate client-side and
show a success message, but **nothing is sent anywhere**. The handler in `main.js` is marked
`---- Replace from here with a real submission ----`. Wire it up before launch.

Every footer carries direct contact details (email, phone, location) rather than a form. The
reference site puts a contact form in its footer; we deliberately don't — one form on a dedicated
contact page is easier to maintain and gives visitors a mailto/tel they can act on immediately.

## Browser notes

- Tested at 1366px. Breakpoints at 1024px, 900px (nav collapses to a hamburger), 700px, 600px.
- Verified on all six pages: no console errors from site code, no horizontal overflow, no broken
  images, all scroll reveals resolve.
- Mobile layout is written against the breakpoints but has **not** been eyeballed — the test browser
  would not resize below the OS minimum window width. Worth a look on a real phone.
- When testing locally, hard-reload (Ctrl+Shift+R) after editing `main.js` — the dev server sends
  cacheable responses and Chrome will happily serve a stale copy.
