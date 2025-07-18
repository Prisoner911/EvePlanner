        // Function to pause the video
        function pauseVideo(videoElement) {
            videoElement.pause();
        }

        // Function to play the video
        function playVideo(videoElement) {
            videoElement.play();
        }

        // Callback function when video intersection changes
        function handleIntersection(entries, observerVideo) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    playVideo(entry.target);
                } else {
                    pauseVideo(entry.target);
                }
            });
        }

        // options1 for the Intersection Observer
        const options1 = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5 // Adjust threshold as needed
        };

        // Create the Intersection Observer
        const observerVideo = new IntersectionObserver(handleIntersection, options1);

        // Target the video element
        const videoElement = document.getElementById('topVideo');

        // Start observing the video element
        observerVideo.observe(videoElement);
