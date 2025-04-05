const planets = [
    { name: 'Mercury', image: '/game/planets/mercury.png', orbitRadius: 100, size: 50 },
    { name: 'Venus', image: '/game/planets/venus.png', orbitRadius: 140, size: 40 },
    { name: 'Earth', image: '/game/planets/earth.png', orbitRadius: 180, size: 45 },
    { name: 'Mars', image: '/game/planets/mars.png', orbitRadius: 220, size: 35 },
    { name: 'Jupiter', image: '/game/planets/jupiter.png', orbitRadius: 280, size: 80 },
    { name: 'Saturn', image: '/game/planets/saturn.png', orbitRadius: 340, size: 70 },
    { name: 'Uranus', image: '/game/planets/uranus.png', orbitRadius: 400, size: 60 },
    { name: 'Neptune', image: '/game/planets/neptun.png', orbitRadius: 460, size: 55 },
];

const planetSelection = document.getElementById('planetSelection');
const solarSystem = document.getElementById('solarSystem');
const congratulations = document.getElementById('congratulations');

let placedPlanets = [];

function createPlanetElement(planet) {
    const planetElement = document.createElement('div');
    planetElement.className = 'planet';
    planetElement.style.backgroundImage = `url(${planet.image})`;
    planetElement.style.width = `${planet.size}px`;
    planetElement.style.height = `${planet.size}px`;
    planetElement.draggable = true;
    planetElement.dataset.name = planet.name;
    
    planetElement.addEventListener('dragstart', (e) => {
        e.dataTransfer.setData('text/plain', planet.name);
    });

    return planetElement;
}

function createOrbitAndTarget(planet, index) {
    const orbit = document.createElement('div');
    orbit.className = 'orbit';
    orbit.style.width = `${planet.orbitRadius * 2}px`;
    orbit.style.height = `${planet.orbitRadius * 2}px`;

    const target = document.createElement('div');
    target.className = 'target';
    target.textContent = "Here";
    target.dataset.name = planet.name;
    
    const angle = (index / planets.length) * 2 * Math.PI;
    const x = Math.cos(angle) * planet.orbitRadius + 500 - planet.size / 2;
    const y = Math.sin(angle) * planet.orbitRadius + 500 - planet.size / 2;
    
    target.style.left = `${x}px`;
    target.style.top = `${y}px`;
    target.style.width = `${planet.size}px`;
    target.style.height = `${planet.size}px`;

    target.addEventListener('dragover', (e) => {
        e.preventDefault(); 
    });
    
    target.addEventListener('drop', (e) => {
        e.preventDefault();
        const planetName = e.dataTransfer.getData('text/plain');
    
        if (planetName === planet.name) {
            placePlanet(planetName, target, planet);
            checkGameCompletion();
        } else {
            target.classList.add('wrong');
            setTimeout(() => {
                target.classList.remove('wrong');
            }, 1000);
        }
    });
    
    solarSystem.appendChild(orbit);
    solarSystem.appendChild(target);
}

function placePlanet(planetName, targetElement, planet) {
    const planetElement = document.createElement('div');
    planetElement.className = 'planet';
    planetElement.style.backgroundImage = `url(${planet.image})`;
    planetElement.style.width = `${planet.size}px`;
    planetElement.style.height = `${planet.size}px`;

    const originalPlanet = document.querySelector(`.planet[data-name="${planetName}"]`);
    if (originalPlanet) originalPlanet.classList.add('placed');

    targetElement.innerHTML = '';
    targetElement.appendChild(planetElement);
    targetElement.classList.add('filled');
    placedPlanets.push(planetName);
}

function checkGameCompletion() {
    if (placedPlanets.length === planets.length) {
        congratulations.classList.remove('hidden');
    }
}

function initGame() {
    planets.forEach(planet => {
        planetSelection.appendChild(createPlanetElement(planet));
    });

    planets.forEach((planet, index) => {
        createOrbitAndTarget(planet, index);
    });
}

document.getElementById('reset-button').addEventListener('click', () => {
    placedPlanets = [];

    const targets = document.querySelectorAll('.target.filled');
    targets.forEach(target => {
        target.innerHTML = 'Here';
        target.classList.remove('filled');
    });

    const placedPlanetElements = document.querySelectorAll('.planet.placed');
    placedPlanetElements.forEach(planet => {
        planet.classList.remove('placed');
    });

    congratulations.classList.add('hidden');
});


initGame();