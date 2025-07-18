

  function handleIntersection(entries, observer) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        document.querySelector(".banner_logo").classList.add("zoomed");
        document.querySelector(".bannerNamePic").classList.add("zoomed");
        document.querySelector(".visionDiv").classList.add("zoomed");
        document.querySelector(".innerBanner").classList.add("poppedUp");
        document.querySelector(".banner_div").classList.add("backgroundZoomed");
      } else {
        document.querySelector(".banner_logo").classList.remove("zoomed");
        document.querySelector(".bannerNamePic").classList.remove("zoomed");
        document.querySelector(".visionDiv").classList.remove("zoomed");
        document.querySelector(".innerBanner").classList.remove("poppedUp");
        document.querySelector(".banner_div").classList.remove("backgroundZoomed");
      }
    });
  }

  const options = {
    root: null,
    rootMargin: "0px",
    threshold: 0.5,
  };

  const observer = new IntersectionObserver(handleIntersection, options);

  const bannerDiv = document.querySelector(".banner_div");
  observer.observe(bannerDiv);


