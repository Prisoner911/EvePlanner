window.addEventListener('scroll', function() {
    const contentImg = document.querySelector('.contentImg');
    const contentImgID = document.getElementById('contentImg');
    const contentImgPosition = contentImg.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;

    if (contentImgPosition < windowHeight) {
      contentImg.classList.add('showLeft');
      contentImgID.style.opacity = '1';
    }
  });

  window.addEventListener('scroll', function() {
    const aboutSectionDiv = document.querySelector('.aboutSectionDiv');
    const aboutSection = document.querySelector('.about-section');
    const aboutSectionID = document.getElementById('aboutContent');
    const aboutSectionPosition = aboutSectionDiv.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;

    if (aboutSectionPosition < windowHeight) {
        aboutSection.classList.add('showRight');
        aboutSectionID.style.opacity = '1';
    }
  });

  const tabletLandscapeQuery = window.matchMedia('(min-device-width: 768px) and (max-device-width: 1368px) and (orientation: landscape)');
  function handleTabletLandscapeChange(mediaQuery) {
    if (mediaQuery.matches) {
      window.addEventListener('scroll', function() {
        const contentWrapper = document.querySelector('.contentDiv');
        const contentDivID = document.getElementById('contentDivID')
        const contentWrapperPosition = contentWrapper.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (contentWrapperPosition < windowHeight) {
          contentWrapper.classList.add('boxShadowAnim');
          contentDivID.style.boxShadow = '0px 0px 55px 2px rgba(0, 0, 0, 0.788) inset';
        }
      });
    }
  }
  handleTabletLandscapeChange(tabletLandscapeQuery);

// Add a listener to handle changes in the media query
tabletLandscapeQuery.mediaQuery.addListener(handleTabletLandscapeChange);
