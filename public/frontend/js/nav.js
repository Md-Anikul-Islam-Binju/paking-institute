document.addEventListener('DOMContentLoaded', () => {
  if (window.innerWidth >= 992) {
    document.querySelectorAll('.navbar-nav .dropdown').forEach(dropdown => {

      dropdown.addEventListener('mouseenter', () => {
        const link = dropdown.querySelector('[data-bs-toggle="dropdown"]');
        if (link) bootstrap.Dropdown.getOrCreateInstance(link).show();
      });

      dropdown.addEventListener('mouseleave', () => {
        const link = dropdown.querySelector('[data-bs-toggle="dropdown"]');
        if (link) bootstrap.Dropdown.getOrCreateInstance(link).hide();
      });

    });
  }
});

