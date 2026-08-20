window.addEventListener('scroll', function () {
            const scrollBtn = document.getElementById('scrollBtn');
            if (window.scrollY > 100) {
                scrollBtn.classList.remove('d-none');
            } else {
                scrollBtn.classList.add('d-none');
            }
        });