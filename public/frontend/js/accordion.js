function activateCard(id) {

            document.querySelectorAll(".accordion-card").forEach(card => {
                card.classList.remove("active");
            });

            document.getElementById("card-" + id).classList.add("active");
        }

        activateCard(1);