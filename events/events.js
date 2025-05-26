document.addEventListener('DOMContentLoaded', function () {
    const eventsContainer = document.getElementById('events-container');
    const modal = document.getElementById('event-modal');
    const closeModal = document.getElementById('close-modal');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('modal-title');
    const modalDescription = document.getElementById('modal-description');
    const modalDate = document.getElementById('modal-date');
    const modalTime = document.getElementById('modal-time');
    const regionFilter = document.getElementById('region');
    const timeFilter = document.getElementById('time');


    
 
    function showModal(eventCard) {
        const imgSrc = eventCard.querySelector('img').src;
        const title = eventCard.querySelector('h3').textContent;

        function showModal(eventCard) {
            const imgSrc = eventCard.querySelector('img').src;
            const title = eventCard.querySelector('h3').textContent;
            const date = eventCard.querySelector('.event-time:nth-child(3)').textContent;
            const time = eventCard.querySelector('.event-time:nth-child(4)').textContent;
            const description = eventCard.getAttribute('data-description'); 
        
          
            fetch('log_event_click.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ title: title })
            });
        
            modalImage.src = imgSrc;
            modalTitle.textContent = title;
            modalDate.textContent = date;
            modalTime.textContent = time;
            modalDescription.textContent = description; 
            modal.classList.add('active');
        }
        

        const date = eventCard.querySelector('.event-time:nth-child(3)').textContent;
        const time = eventCard.querySelector('.event-time:nth-child(4)').textContent;
        const description = eventCard.getAttribute('data-description'); 

        modalImage.src = imgSrc;
        modalTitle.textContent = title;
        modalDate.textContent = date;
        modalTime.textContent = time;
        modalDescription.textContent = description; 

        modal.classList.add('active');
    }

    closeModal.addEventListener('click', () => {
        modal.classList.remove('active');
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });


    function filterEvents() {
        const region = regionFilter.value;
        const time = timeFilter.value;
        const eventCards = Array.from(eventsContainer.getElementsByClassName('event-card'));

        eventCards.forEach(card => {
            const eventRegion = card.getAttribute('data-region');
            const eventTime = card.getAttribute('data-time');

            const matchesRegion = region === 'all' || region === eventRegion;
            const matchesTime = time === 'all' || time === eventTime;

            if (matchesRegion && matchesTime) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    regionFilter.addEventListener('change', filterEvents);
    timeFilter.addEventListener('change', filterEvents);


    Array.from(eventsContainer.getElementsByClassName('event-card')).forEach(card => {
        card.addEventListener('click', () => showModal(card));
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const eventsContainer = document.getElementById('events-container');
    const favoriteCheckbox = document.getElementById('show-favorites'); 
    let favoriteEvents = [];

    fetch('get_favorites.php')
        .then(res => res.json())
        .then(response => {
            if (response.success) {
                favoriteEvents = response.favorites;
                updateFavoritesUI(); 
            }
        });

   
        function updateFavoritesUI() {
            const eventCards = Array.from(eventsContainer.getElementsByClassName('event-card'));
        
            eventCards.forEach(card => {
                const title = card.querySelector('h3').textContent;
                const btn = card.querySelector('.favorite-btn');
                if (!btn) return;
        
               
                if (favoriteEvents.includes(title)) {
                    btn.textContent = '❤️';
                } else {
                    btn.textContent = '⭐';
                }
        
               
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
        
                    const data = {
                        title: title,
                        date: card.querySelectorAll('.event-time')[0].textContent.replace('Date: ', ''),
                        time: card.querySelectorAll('.event-time')[1].textContent.replace('Time: ', ''),
                        region: card.dataset.region,
                        description: card.dataset.description,
                        image_url: card.querySelector('img').src
                    };
        
                    const index = favoriteEvents.indexOf(data.title);
                    if (index === -1) {
                        fetch('save_favorite.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(data)
                        })
                        .then(res => res.json())
                        .then(response => {
                            if (response.success) {
                                favoriteEvents.push(data.title);
                                btn.textContent = '❤️';
                                filterFavorites();
                            } else {
                                alert("❌ Error: " + response.message);
                            }
                        });
                    } else {
                        fetch('remove_favorite.php', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ title: data.title })
                        })
                        .then(res => res.json())
                        .then(response => {
                            if (response.success) {
                                favoriteEvents.splice(index, 1);
                                btn.textContent = '⭐';
                                filterFavorites();
                            } else {
                                alert("❌ Error: " + response.message);
                            }
                        });
                    }
                });
            });
        
            
            filterFavorites();
        }
        
       
        function filterFavorites() {
            const eventCards = Array.from(eventsContainer.getElementsByClassName('event-card'));
        
            eventCards.forEach(card => {
                const title = card.querySelector('h3').textContent;
                if (favoriteCheckbox.checked) {
                    card.style.display = favoriteEvents.includes(title) ? 'block' : 'none';
                } else {
                    card.style.display = 'block';
                }
            });
        }
        
        
        favoriteCheckbox.addEventListener('change', filterFavorites);
        
});


const astronomyFacts = [
    "The Milky Way galaxy will collide with the Andromeda galaxy in about 4.5 billion years.",
    " If you can spot the Andromeda Galaxy with your naked eyes, you can see something 14.7 billion billion miles away.",
    "There are more stars in the universe than grains of sand on all Earth's beaches.",
    "Neutron stars are so dense that a sugar-cube-sized amount of material would weigh a billion tons on Earth.",
    "Saturn's moon Titan has a thick atmosphere and lakes of liquid methane.",
    "The largest volcano in the solar system is Olympus Mons on Mars.",
    "A light year is the distance light travels in one year, about 5.88 trillion miles (9.46 trillion kilometers).",
    "Black holes are so dense that not even light can escape their gravity.",
    "The Sun accounts for 99.86% of the mass in the solar system.",
    "Jupiter has the most moons of any planet in our solar system, with 95 confirmed moons as of now.",
    "Mars is called the Red Planet because of its red coloring, which comes from the large amount of iron oxide – known on Earth as rust – on the planet’s surface.",
    "Mercury’s temperature varies from -280° F on its night side to 800° F during the day.",
    "Jupiter is the largest planet. It could contain the other seven planets in just 70 percent of its volume.",
    "Scientists estimate that the earliest stars formed some 200 million years after the Big Bang.",
    " One million Earths could fit inside the Sun – and the Sun is considered an average-size star.",
    "If you could fly a plane to Pluto, the trip would take more than 800 years!"
];


function getRandomFact() {
    const randomIndex = Math.floor(Math.random() * astronomyFacts.length);
    return astronomyFacts[randomIndex];
}


document.getElementById('fact-button').addEventListener('click', () => {
    const fact = getRandomFact();
    document.getElementById('fact-display').innerText = fact;
});

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('comment-form');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const userId = document.getElementById('comment-user-id').value;
            const title = document.getElementById('comment-event-title').value.trim();
            const comment = document.getElementById('comment-text').value.trim();

            fetch('submit_comment.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ title, comment })
            })
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    alert("✅ Comment added!");
                    loadComments(title);
                    form.reset();
                } else {
                    alert("❌ " + response.message);
                }
            });
        });

        function loadComments(title) {
            fetch('fetch_comments.php?title=' + encodeURIComponent(title))
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    const container = document.getElementById('comments-container');
                    container.innerHTML = response.comments.map(c =>
                        `<div class='comment'><p>${c.comment}</p><small>${c.created_at}</small></div>`
                    ).join('');
                }
            });
        }

        form.querySelector('#comment-event-title').addEventListener('blur', (e) => {
            const title = e.target.value.trim();
            if (title) loadComments(title);
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const map = L.map('map').setView([20, 0], 2); // qendër globale fillestare

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const eventCards = document.querySelectorAll('.event-card');

    eventCards.forEach(card => {
        const lat = parseFloat(card.getAttribute('data-lat'));
        const lng = parseFloat(card.getAttribute('data-lng'));
        const title = card.querySelector('h3')?.textContent;

        if (!isNaN(lat) && !isNaN(lng)) {
            L.marker([lat, lng])
                .addTo(map)
                .bindPopup(title || 'Event');
        }
    });
});