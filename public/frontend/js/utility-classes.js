/**
 * Global Utility Class Parser
 * Enables inline dynamic styling via class names (e.g., bg-[#656565], h-[500px])
 */
(function () {
  function applyDynamicStyles(element) {
    // Read class string reliably (handles SVG animated strings as well)
    const rawClass = typeof element.className === "string" 
      ? element.className 
      : element.getAttribute("class") || "";

    if (!rawClass) return;

    // Replace non-breaking spaces and split by whitespace
    const classes = rawClass
      .replace(/[\u00A0\u1680\u180E\u2000-\u200B\u202F\u205F\u3000]/g, " ")
      .split(/\s+/);

    classes.forEach((c) => {
      let match;

      if ((match = c.match(/^c-\[(.+)\]$/))) elStyle(element, "color", match[1]);
      if ((match = c.match(/^bg-\[(.+)\]$/))) elStyle(element, "backgroundColor", match[1]);
      if ((match = c.match(/^h-\[(.+)\]$/))) elStyle(element, "height", match[1]);
      if ((match = c.match(/^max-h-\[(.+)\]$/))) elStyle(element, "maxHeight", match[1]);
      if ((match = c.match(/^min-h-\[(.+)\]$/))) elStyle(element, "minHeight", match[1]);
      if ((match = c.match(/^top-\[(.+)\]$/))) elStyle(element, "top", match[1]);
      if ((match = c.match(/^bottom-\[(.+)\]$/))) elStyle(element, "bottom", match[1]);
      if ((match = c.match(/^w-\[(.+)\]$/))) elStyle(element, "width", match[1]);
    });
  }

  function elStyle(el, property, value) {
    el.style[property] = value;
  }

  function init() {
    document.querySelectorAll("[class]").forEach(applyDynamicStyles);
  }

  // Run on initial page load
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init(); // Run immediately if DOM is already parsed
  }

  // Observe dynamic updates (SPA / dynamically inserted elements)
  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      mutation.addedNodes.forEach((node) => {
        if (node.nodeType === 1) { // Element node
          if (node.hasAttribute("class")) applyDynamicStyles(node);
          node.querySelectorAll?.("[class]").forEach(applyDynamicStyles);
        }
      });
    });
  });

  document.addEventListener("DOMContentLoaded", () => {
    observer.observe(document.body, { childList: true, subtree: true });
  });
})();