/* ==========================================================================
   CAL GUARDS™ — site behaviour
   Mobile nav · sticky header · scroll reveal · FAQ · contact form
   ========================================================================== */
(function () {
  'use strict';

  /* --- Mobile navigation ------------------------------------------------ */
  var header = document.querySelector('.site-header');
  var toggle = document.querySelector('.nav__toggle');
  var links  = document.querySelector('.nav__links');

  function setHeaderHeight() {
    if (!header) return;
    document.documentElement.style.setProperty('--header-h', header.offsetHeight + 'px');
  }

  setHeaderHeight();
  window.addEventListener('resize', setHeaderHeight);

  if (toggle && links) {
    toggle.addEventListener('click', function () {
      var open = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!open));
      links.classList.toggle('is-open', !open);
      document.body.style.overflow = !open ? 'hidden' : '';
    });

    // Close the menu after tapping a link
    links.addEventListener('click', function (e) {
      if (e.target.tagName !== 'A') return;
      toggle.setAttribute('aria-expanded', 'false');
      links.classList.remove('is-open');
      document.body.style.overflow = '';
    });

    // Close on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape' || !links.classList.contains('is-open')) return;
      toggle.setAttribute('aria-expanded', 'false');
      links.classList.remove('is-open');
      document.body.style.overflow = '';
      toggle.focus();
    });
  }

  /* --- Sticky header state --------------------------------------------- */
  if (header) {
    var onScroll = function () {
      header.classList.toggle('is-stuck', window.scrollY > 40);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* --- Scroll reveal ---------------------------------------------------- */
  var revealables = document.querySelectorAll('.reveal');

  if (!('IntersectionObserver' in window)) {
    // No observer support: show everything immediately.
    Array.prototype.forEach.call(revealables, function (el) {
      el.classList.add('is-visible');
    });
  } else {
    var pending = Array.prototype.slice.call(revealables);

    var show = function (el) {
      el.classList.add('is-visible');
      observer.unobserve(el);
      var i = pending.indexOf(el);
      if (i > -1) pending.splice(i, 1);
    };

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting || entry.boundingClientRect.bottom < 0) {
          show(entry.target);
        }
      });
    }, { threshold: 0.01, rootMargin: '0px 0px -40px 0px' });

    Array.prototype.forEach.call(revealables, function (el) {
      observer.observe(el);
    });

    /* An instant jump — an #anchor deep link, or the browser restoring scroll
       position on reload — moves elements straight from below the viewport to
       above it without ever crossing it, so no intersection callback fires and
       they would stay invisible. Sweep anything already passed. */
    var sweeping = false;

    var sweepPassed = function () {
      sweeping = false;
      for (var i = pending.length - 1; i >= 0; i--) {
        if (pending[i].getBoundingClientRect().bottom < 0) show(pending[i]);
      }
    };

    window.addEventListener('scroll', function () {
      if (sweeping || !pending.length) return;
      sweeping = true;
      window.requestAnimationFrame(sweepPassed);
    }, { passive: true });

    window.addEventListener('load', sweepPassed);
  }

  /* --- Scroll progress bar ---------------------------------------------- */
  var reduceMotion = window.matchMedia &&
                     window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!reduceMotion) {
    var bar = document.createElement('div');
    bar.className = 'scroll-progress';
    bar.setAttribute('aria-hidden', 'true');
    document.body.appendChild(bar);

    var ticking = false;

    var drawProgress = function () {
      var doc = document.documentElement;
      var max = doc.scrollHeight - doc.clientHeight;
      var pct = max > 0 ? window.scrollY / max : 0;
      bar.style.transform = 'scaleX(' + Math.min(1, Math.max(0, pct)) + ')';
      ticking = false;
    };

    window.addEventListener('scroll', function () {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(drawProgress);
    }, { passive: true });

    drawProgress();
  }

  /* --- Animated number counters ------------------------------------------
     Markup drives this: data-count is the target value, with optional
     data-prefix, data-suffix and data-decimals.
     --------------------------------------------------------------------- */
  var counters = document.querySelectorAll('[data-count]');

  function runCounter(el) {
    var target   = parseFloat(el.dataset.count);
    var decimals = parseInt(el.dataset.decimals || '0', 10);
    var prefix   = el.dataset.prefix || '';
    var suffix   = el.dataset.suffix || '';

    if (isNaN(target)) return;

    var render = function (value) {
      el.textContent = prefix + value.toFixed(decimals) + suffix;
    };

    if (reduceMotion) {
      render(target);
      return;
    }

    var duration = 1400;
    var start = null;

    var tick = function (now) {
      if (start === null) start = now;
      var progress = Math.min(1, (now - start) / duration);
      // easeOutCubic
      var eased = 1 - Math.pow(1 - progress, 3);
      render(target * eased);
      if (progress < 1) window.requestAnimationFrame(tick);
    };

    render(0);
    window.requestAnimationFrame(tick);
  }

  if (counters.length) {
    if (!('IntersectionObserver' in window)) {
      Array.prototype.forEach.call(counters, runCounter);
    } else {
      var counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          runCounter(entry.target);
          counterObserver.unobserve(entry.target);
        });
      }, { threshold: 0.5 });

      Array.prototype.forEach.call(counters, function (el) {
        counterObserver.observe(el);
      });
    }
  }

  /* --- FAQ: one open at a time ----------------------------------------- */
  var faqItems = document.querySelectorAll('.faq details');

  Array.prototype.forEach.call(faqItems, function (item) {
    item.addEventListener('toggle', function () {
      if (!item.open) return;
      Array.prototype.forEach.call(faqItems, function (other) {
        if (other !== item) other.open = false;
      });
    });
  });

  /* --- Contact / fitting forms ------------------------------------------
     No backend is wired up yet. Until an endpoint exists, the form validates
     client-side and shows a confirmation. Replace the block marked below with
     a real submit (fetch to your handler, Formspree, etc.).
     --------------------------------------------------------------------- */
  var forms = document.querySelectorAll('form[data-form]');

  Array.prototype.forEach.call(forms, function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      var status = form.querySelector('.form-status');
      var button = form.querySelector('button[type="submit"]');

      // ---- Replace from here with a real submission ----------------------
      if (button) {
        button.disabled = true;
        button.textContent = 'Sending…';
      }

      window.setTimeout(function () {
        form.reset();

        if (status) {
          status.textContent =
            'Thanks — your message is on its way. Our team will be in touch within one business day.';
          status.hidden = false;
          status.focus();
        }

        if (button) {
          button.disabled = false;
          button.textContent = button.dataset.label || 'Send Message';
        }
      }, 700);
      // ---- to here -------------------------------------------------------
    });
  });

  /* --- Preselect a contact topic from ?topic=... ------------------------ */
  var topicSelect = document.getElementById('c-topic');

  if (topicSelect && window.location.search) {
    var topic = new URLSearchParams(window.location.search).get('topic');
    var match = topic && topicSelect.querySelector('option[value="' + CSS.escape(topic) + '"]');
    if (match) topicSelect.value = topic;
  }

  /* --- Footer year ------------------------------------------------------ */
  var yearEl = document.querySelectorAll('[data-year]');
  Array.prototype.forEach.call(yearEl, function (el) {
    el.textContent = new Date().getFullYear();
  });
})();
