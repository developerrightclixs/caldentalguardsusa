# Building pages with Elementor

The theme ships the whole Cal Guard design system as plain CSS classes. You do **not** need to
restyle anything inside Elementor — drop a widget in, put the class in its **Advanced → CSS
Classes** field, and it picks up the site's type, colour and spacing automatically.

## First-time setup

1. **Appearance → Themes** → activate *Cal Guard USA*.
2. Install **Elementor** (free is enough; Pro adds Theme Builder).
3. **Appearance → Menus** → create menus and assign them to:
   - *Primary (header)*
   - *Footer — Explore*
   - *Footer — Legal*
4. **Appearance → Customize → Cal Guard — Contact & Top Bar** → set phone, email, location,
   utility-bar text and the header button. These feed the header and footer everywhere.
5. **Appearance → Customize → Site Identity** → upload the logo if you want to override the
   bundled badge (`assets/img/logo-mark.png`).
6. For every page you build in Elementor, set **Page Attributes → Template → Full Width
   (no container)**. This is important — see below.

## Page templates

| Template | Header/Footer | Content wrapper | Use for |
| --- | --- | --- | --- |
| **Full Width (no container)** | Yes | None | **Every Elementor page.** Sections can go edge-to-edge. |
| Default | Yes | Narrow container | Plain WordPress pages (privacy, terms) typed in the block editor |
| Canvas (no header or footer) | No | None | Standalone landing pages where Elementor supplies all chrome |

If you leave a page on **Default**, the theme wraps content in a narrow centred container and your
full-width Elementor sections will look boxed in. That's the single most common mistake — use
*Full Width*.

## Elementor Pro Theme Builder

The theme registers all core locations, so Pro users can replace the header, footer, single-post
and archive templates from **Templates → Theme Builder**. When a Theme Builder template exists for
a location, the theme's own version steps aside automatically. With free Elementor, the theme's
header and footer are used and are controlled from the Customizer.

---

## Design system classes

### Layout

| Class | Does |
| --- | --- |
| `section` | Standard vertical section padding |
| `section--tight` | Reduced padding |
| `section--alt` | Light grey background |
| `section--dark` | Navy background, white text |
| `wrap` | Centred 1280px container |
| `wrap--narrow` | Centred 1010px container (text-heavy sections) |
| `center` | Centres text **and** any button row inside |

### Type

| Class | Does |
| --- | --- |
| `eyebrow` | Small red uppercase label above a heading |
| `lede` | Large muted intro paragraph |
| `uline` | **Hand-drawn red underline.** Wrap 2–3 words *inside* a heading, not the whole thing |
| `tm` | Correctly sized ™ |

Example — put this in a **Heading** widget's HTML or a Text Editor:

```html
Choose Your <span class="uline">Protection</span>
```

### Buttons

| Class | Does |
| --- | --- |
| `btn` | Red pill button |
| `btn--lg` | Larger |
| `btn--ghost` | Outlined, for dark backgrounds |
| `btn--light` | White, for dark backgrounds |
| `btn--outline` | Outlined navy, for light backgrounds |
| `btn-row` | Wrapper; left-aligned by default, auto-centres inside `center` / `cta` / `hero` |
| `btn-row--center` | Force a centred row |
| `tlink` | Underlined uppercase text link (secondary CTA) |

### Components

Paste these into an Elementor **HTML widget**. They are styled by the theme already.

**Full-bleed accent strip**

```html
<div class="strip">Protection only works if it's worn.</div>
```

**Pull quote**

```html
<blockquote class="pullquote">
  <p>Preserving your natural teeth is our priority.</p>
  <cite>Dr. Jane Smith — Certified Provider</cite>
</blockquote>
```

**Pill tags**

```html
<ul class="tags">
  <li>Football</li><li>Hockey</li><li>Boxing</li><li>Lacrosse</li>
</ul>
```

**Numbered steps** (oversized red numerals)

```html
<div class="steps">
  <div class="step">
    <div class="step__num">01</div>
    <h3>Visit a Provider</h3>
    <p>A quick 15-minute appointment for a digital scan.</p>
  </div>
  <div class="step">
    <div class="step__num">02</div>
    <h3>Customise Your Guard</h3>
    <p>Choose your fit, thickness and colourway.</p>
  </div>
  <div class="step">
    <div class="step__num">03</div>
    <h3>Play With Confidence</h3>
    <p>Pro-level protection built around your own bite.</p>
  </div>
</div>
```

**Comparison cards**

```html
<div class="compare">
  <article class="card">
    <p class="card__label">Option 01</p>
    <h3 class="card__title">Stock Guard</h3>
    <p class="card__sub">Protection in theory only</p>
    <ul class="check-list">
      <li><svg class="no" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg><span>One-size-fits-none</span></li>
    </ul>
  </article>

  <article class="card card--featured">
    <span class="card__flag">Custom Fit</span>
    <p class="card__label">Option 02</p>
    <h3 class="card__title">Cal Guard<span class="tm">&trade;</span></h3>
    <p class="card__sub">Fitted by a pro. Backed by science.</p>
    <ul class="check-list">
      <li><svg class="yes" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg><span>Built from your <strong>exact dental scan</strong></span></li>
    </ul>
    <div class="card__stats">
      <div class="stat-chip"><b data-count="100" data-suffix="%">100%</b><span>Perfect-fit guarantee</span></div>
    </div>
  </article>
</div>
```

**Two-panel split** (light + dark)

```html
<div class="duo">
  <div class="duo__panel duo__panel--light">
    <div class="duo__media"><img src="/wp-content/uploads/your-image.jpg" alt=""></div>
    <h3>It Starts With a Scan</h3>
    <p>Fifteen minutes in the chair captures your bite exactly.</p>
  </div>
  <div class="duo__panel duo__panel--dark">
    <div class="duo__media"><img src="/wp-content/uploads/your-image.jpg" alt=""></div>
    <h3>Your Custom-Fitted Guard</h3>
    <p>Manufactured to your scan, in your colourway.</p>
  </div>
</div>
```

**Athlete quote band** (full-bleed image + quote)

```html
<section class="quote-band">
  <div class="quote-band__media"><img src="/wp-content/uploads/athlete.jpg" alt=""></div>
  <div class="quote-band__body">
    <p class="quote-band__eyebrow">Engineered for athletes</p>
    <p class="quote-band__quote">Approved athlete quote goes here.</p>
    <p class="quote-band__name">Athlete Name</p>
    <p class="quote-band__role">Team / Sport</p>
  </div>
</section>
```

---

## Animations

The theme's JS runs automatically on any markup you add.

- Add `reveal` to any element to fade it up on scroll.
- Add `data-reveal="left" | "right" | "scale" | "blur"` for a variant.
  *Never put `left`/`right` on a full-bleed element* — the horizontal slide pushes past the
  viewport. They collapse to a fade-up under 1024px for this reason.
- Add `data-delay="1"` … `"5"` to stagger.
- Add `data-count="100"` with optional `data-prefix`, `data-suffix`, `data-decimals` to any
  element to animate a number counting up when it scrolls into view.

All animation is disabled automatically under `prefers-reduced-motion`.

## Gotchas

- **Use the Full Width template** for Elementor pages (see above).
- The CSS is appended in layers. If you add your own CSS and it doesn't take, it's probably losing
  on **source order**, not specificity — put overrides in Elementor's *Custom CSS* or at the end of
  `assets/css/theme.css`.
- The header logo is a tall shield badge. If you swap it for a wide wordmark, reduce
  `.nav { min-height }` and `.logo__img { height }` or the header will look over-tall.
- `.uline` is meant for 2–3 words. Underlining a whole heading looks wrong.
