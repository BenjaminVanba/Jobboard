import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const viewMoreLinks = document.querySelectorAll('.view-more');

    viewMoreLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            const advertisementId = this.getAttribute('data-id');
            const descriptionContainer = document.getElementById(`description-${advertisementId}`);

            if (descriptionContainer.classList.contains('hidden')) {
                fetch(`/advertisements/${advertisementId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            descriptionContainer.innerHTML = `<p>${data.description_longue}</p>`;
                            descriptionContainer.classList.remove('hidden');
                        } else {
                            console.error('Erreur lors de la récupération de la description longue.');
                        }
                    })
                    .catch(error => console.error('Erreur:', error));
            } else {
                descriptionContainer.classList.add('hidden');
            }
        });
    });
});
