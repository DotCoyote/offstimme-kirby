const scrollToElements = document.querySelectorAll('.js-scroll-to');

if (scrollToElements.length) {
  scrollToElements.forEach((element: Element) => {
    element.addEventListener('click', (e) => {
      e.preventDefault();
      const scrollToTargetId = (element as unknown as HTMLLinkElement).getAttribute('href');
      if (scrollToTargetId) {
        const scrollToTarget = document.querySelector(scrollToTargetId);
        if (scrollToTarget) {
          scrollToTarget.scrollIntoView({ behavior: 'smooth', inline: 'nearest' });
        }
      }
    });
  });
}

export {};
