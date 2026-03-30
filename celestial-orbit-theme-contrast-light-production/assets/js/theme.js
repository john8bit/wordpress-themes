document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.main-navigation');

  if (!nav) return;

  const parentItems = nav.querySelectorAll('.menu-item-has-children');

  function closeSubmenus(exceptItem) {
    parentItems.forEach(function (item) {
      if (item !== exceptItem) {
        item.classList.remove('is-open');
      }
    });
  }

  parentItems.forEach(function (item) {
    const link = item.querySelector(':scope > a');
    if (!link) return;

    link.addEventListener('click', function (event) {
      if (window.innerWidth > 820) {
        return;
      }

      const isOpen = item.classList.contains('is-open');
      event.preventDefault();
      closeSubmenus(item);
      item.classList.toggle('is-open', !isOpen);
    });
  });

  if (toggle) {
    toggle.addEventListener('click', function () {
      const expanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!expanded));
      nav.classList.toggle('is-open');

      if (expanded) {
        closeSubmenus();
      }
    });
  }

  document.addEventListener('click', function (event) {
    if (!nav.contains(event.target) && (!toggle || !toggle.contains(event.target))) {
      closeSubmenus();
    }
  });

  window.addEventListener('resize', function () {
    if (window.innerWidth > 820) {
      closeSubmenus();
      if (toggle) {
        toggle.setAttribute('aria-expanded', 'false');
      }
      nav.classList.remove('is-open');
    }
  });
});
