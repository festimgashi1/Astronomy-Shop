document.addEventListener('DOMContentLoaded', () => {
    const images = document.querySelectorAll('.image-container1 img');
    let currentIndex = 0;

    images[0].classList.add('active');

    function showNextImage() {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].classList.add('active');
    }

    setInterval(showNextImage, 5000);
});

document.addEventListener('DOMContentLoaded', function () {
    const newsItems = [
        {
            title: "SpaceX Starship Completes High-Altitude Test",
            description: "Elon Musk's spacecraft prototype achieves major milestone",
            category: "Technology",
            image: "https://i.ytimg.com/vi/GwC0aLsG7Rc/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAWTxxoPUSy6SlT9POCmGsuozo3AA",
            sourceUrl: "https://www.aljazeera.com/news/2024/6/7/spacex-rocket-completes-first-full-test-flight-after-surviving-re-entry",
            date: '2023-06-07'
        },
        {
            title: "New Exoplanet Discovered in Habitable Zone",
            description: "Astronomers find Earth-like planet orbiting nearby star",
            category: "Astronomy",
            image: "https://i.abcnewsfe.com/a/c04d41c8-a24f-422e-be1e-2a7aacc26285/Super-Earth-ht-er-240205_1707153488302_hpMain_16x9.jpg",
            sourceUrl: "https://science.nasa.gov/universe/exoplanets/discovery-alert-a-super-earth-in-the-habitable-zone/",
            date: '2024-02-05'
        },
        {
            title: "James Webb Space Telescope Reveals Cosmic Secrets",
            description: "Revolutionary observatory provides unprecedented views of the universe",
            category: "Science",
            image: "https://cdn.abcotvs.com/dip/images/12347150_101922-wls-pillars-of-creation-img.jpg",
            sourceUrl: "https://scitechdaily.com/webb-telescope-uncovers-bright-ancient-galaxies-that-challenge-cosmic-theories/",
            date: '2022-07-11'
        },
        {
            title: "NASA's Perseverance Rover Discovers Ancient Delta on Mars",
            description: "The rover has found evidence of an ancient river delta in Jezero Crater, supporting the theory that Mars once had flowing water.",
            category: "Exploration",
            image: "https://cdn.mos.cms.futurecdn.net/5boWV7QPgeCo4LaCNZHeDc.jpg",
            sourceUrl: "https://www.nasa.gov/missions/mars-2020-perseverance/perseverance-rover/nasas-perseverance-rover-deciphers-ancient-history-of-martian-lake/",
            date: '2021-02-18'
        },
        {
            title: "SpaceX Successfully Launches Starlink Satellites",
            description: "SpaceX has launched another batch of Starlink satellites, expanding its global internet coverage network.",
            category: "Technology",
            image: "https://satelliteprome.com/wp-content/uploads/2020/01/SpaceX.jpg",
            sourceUrl: "https://spaceflightnow.com/2024/12/03/live-coverage-spacex-to-launch-starlink-satellites-on-falcon-9-rocket-from-cape-canaveral-6/",
            date: '2024-12-03'
        },
        {
            title: "China Announces Plans for Lunar Research Station",
            description: "China has revealed plans to build a permanent research station on the Moon's south pole by 2030.",
            category: "Space Policy",
            image: "https://cdn.i-scmp.com/sites/default/files/styles/og_image_scmp_generic/public/d8/images/canvas/2024/09/09/f1fe71b8-95dc-44ec-909e-48fc6089aa90_cd9d588c.jpg?itok=vkb_rd9N&v=1725861205",
            sourceUrl: "https://english.www.gov.cn/news/202409/07/content_WS66dbeb9dc6d0868f4e8eab63.html",
            date: '2024-09-07'
        },
        {
            title: "Astronomers Detect Mysterious Radio Signal from Distant Galaxy",
            description: "Scientists have picked up an unusual radio signal from a galaxy billions of light-years away, sparking curiosity about its origin.",
            category: "Astrophysics",
            image: "https://static.techno-science.net/illustration/Source/PO/2024/11/11/russian-astronomers-di-1.jpg",
            sourceUrl: "https://www.space.com/radio-signal-ancient-galaxy-record-breaking-distance",
            date: '2024-11-11'
        },
        {
            title: "NASA and ESA Collaborate on Mars Sample Return Mission",
            description: "The space agencies are working together to bring the first samples from Mars back to Earth for detailed study.",
            category: "Exploration",
            image: "https://science.nasa.gov/wp-content/uploads/2023/06/msr-family-final-7-27-slidetorightforbetanasasite-2000px-cropped.jpg?w=4096&format=jpeg",
            sourceUrl: "https://www.esa.int/Science_Exploration/Human_and_Robotic_Exploration/Exploration/Mars_sample_return",
            date: '2024-12-13'
        },
        {
            title: "JWST Captures Stunning Images of Jupiter's Aurora",
            description: "The James Webb Space Telescope has taken incredibly detailed images of Jupiter's aurora, providing new insights into the gas giant's atmospheric dynamics.",
            category: "Astronomy",
            image: "https://images.newscientist.com/wp-content/uploads/2022/08/22165303/SEI_120623294.jpg",
            sourceUrl: "https://svs.gsfc.nasa.gov/31191",
            date: '2022-08-22'
        },
        {
            title: "Gravitational Waves Detected from Black Hole-Neutron Star Mergers",
            description: "LIGO and Virgo observatories have detected gravitational waves from the merger of black holes with neutron stars, opening a new chapter in gravitational wave astronomy.",
            category: "Astrophysics",
            image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbGZTbCXalTARq0-bRTJzABg8kWI6E9IaWJA&s",
            sourceUrl: "https://news.northwestern.edu/stories/2024/04/first-gravitational-wave-detection-of-mass-gap-object-merging-with-neutron-star/",
            date: '2024-04-15'
        },
        {
            title: "Hubble Space Telescope Celebrates 30 Years of Discovery",
            description: "The Hubble Space Telescope marked its 30th anniversary in orbit, continuing to provide groundbreaking observations of the universe and inspiring a new generation of astronomers.",
            category: "Astronomy",
            image: "https://images.fineartamerica.com/images-medium-large-5/hubble-space-telescope-nasa-esa-and-d-lennon-esastscidetlev-van-ravenswaayscience-photo-library.jpg",
            sourceUrl: "https://hubblesite.org/mission-and-telescope/hubble-30th-anniversary",
            date: '2020-04-24'
        },
        {
            title: "ESA's Solar Orbiter Captures Closest Images of the Sun",
            description: "The European Space Agency's Solar Orbiter has taken the closest-ever images of the Sun, revealing miniature solar flares dubbed 'campfires' on its surface.",
            category: "Solar System",
            image: "https://www.esa.int/var/esa/storage/images/esa_multimedia/images/2019/10/solar_orbiter2/21087516-1-eng-GB/Solar_Orbiter_article.jpg",
            sourceUrl: "https://www.esa.int/Science_Exploration/Space_Science/Solar_Orbiter/Solar_Orbiter_s_first_images_reveal_campfires_on_the_Sun",
            date: '2020-07-16'
        },
        {
            title: "Water Ice Discovered on the Moon",
            description: "NASA's SOFIA airborne observatory confirms the presence of water ice in sunlit regions of the Moon, potentially providing a valuable resource for future lunar missions.",
            category: "Lunar Exploration",
            image: "https://upload.wikimedia.org/wikipedia/commons/8/89/Chandrayaan1_Spacecraft_Discovery_Moon_Water.jpg",
            sourceUrl: "https://www.nasa.gov/press-release/nasa-s-sofia-discovers-water-on-sunlit-surface-of-moon",
            date: '2020-10-26'
        },
        {
            title: "New Horizons Flyby of Pluto",
            description: "NASA's New Horizons spacecraft completes a historic flyby of Pluto, providing the first close-up images and data of the dwarf planet and its moons.",
            category: "Solar System Exploration",
            image: "https://i0.wp.com/spacenews.com/wp-content/uploads/2015/06/pluto-newhorizons-e1435599288265.jpg?fit=1024%2C460&ssl=1",
            sourceUrl: "https://www.nasa.gov/mission_pages/newhorizons/main/index.html",
            date: '2015-07-14'
        },
        {
            title: "Discovery of Earth-like Exoplanets in TRAPPIST-1 System",
            description: "Astronomers announce the discovery of seven Earth-sized planets orbiting the ultra-cool dwarf star TRAPPIST-1, with several potentially in the habitable zone.",
            category: "Exoplanets",
            image: "https://assets.science.nasa.gov/dynamicimage/assets/science/astro/exo-explore/internal_resources/522/T1-Planet-Lineup_sm.jpg?w=4096&format=jpeg&fit=clip&crop=faces%2Cfocalpoint",
            sourceUrl: "https://exoplanets.nasa.gov/trappist1/",
            date: '2017-02-22'
        },
        {
            title: "Cassini's Grand Finale at Saturn",
            description: "After 13 years studying Saturn and its moons, NASA's Cassini spacecraft concludes its mission with a dramatic plunge into the gas giant's atmosphere.",
            category: "Planetary Exploration",
            image: "https://d2pn8kiwq2w21t.cloudfront.net/images/backlit_saturn.2e16d0ba.fill-512x288-c70.format-jpeg.jpg",
            sourceUrl: "https://science.nasa.gov/mission/cassini/grand-finale/overview/",
            date: '2017-09-15'
        },
        {
            title: "InSight Lander Detects Marsquakes",
            description: "NASA's InSight lander detects and measures seismic activity on Mars, providing new insights into the planet's internal structure and geology.",
            category: "Mars Exploration",
            image: "https://i.insider.com/603fa20cb46d720018b048d3?width=700",
            sourceUrl: "https://www.jpl.nasa.gov/news/nasas-insight-records-monster-quake-on-mars/",
            date: '2024-04-27'
        },
        {
            title: "Juno Spacecraft Reveals Jupiter's Complex Atmosphere",
            description: "NASA's Juno mission provides unprecedented views and data of Jupiter's atmosphere, including its iconic Great Red Spot and previously unknown cyclones at its poles.",
            category: "Planetary Science",
            image: "https://www.dpreview.com/files/p/articles/6740868101/jupiter-juno-split-view.jpeg",
            sourceUrl: "https://www.nasa.gov/image-article/nasas-juno-mission-reveals-jupiters-complex-colors/",
            date: '2023-09-06'
        },
        {
            title: "Chang'e-4 Lands on Far Side of the Moon",
            description: "China's Chang'e-4 mission becomes the first to land on the far side of the Moon, exploring this previously unseen lunar terrain.",
            category: "Lunar Exploration",
            image: "https://static.independent.co.uk/s3fs-public/thumbnails/image/2019/01/02/15/moon.jpg",
            sourceUrl: "https://www.science.org/content/article/chinese-spacraft-successfully-lands-moons-far-side-and-sends-pictures-back-home",
            date: '2019-01-03'
        },
        {
            title: "ESA's Gaia Mission Creates Most Detailed 3D Map of the Milky Way",
            description: "The European Space Agency's Gaia spacecraft releases the most comprehensive 3D map of our galaxy, providing positions and motions for nearly 2 billion stars.",
            category: "Galactic Cartography",
            image: "https://scitechdaily.com/images/ESA-Gaia-Spacecraft-Prepares-for-Launch-777x515.jpg",
            sourceUrl: "https://www.azoquantum.com/Article.aspx?ArticleID=350",
            date: '2023-10-26'
        },
        {
            title: "Hubble Telescope Observes Interstellar Comet 2I/Borisov",
            description: "The Hubble Space Telescope captures detailed images of 2I/Borisov, the second known interstellar object to visit our solar system.",
            category: "Astronomy",
            image: "https://www.universetoday.com/wp-content/uploads/2019/10/Halleys_Comet_1910.jpg",
            sourceUrl: "https://science.nasa.gov/missions/hubble/hubble-observes-1st-confirmed-interstellar-comet/",
            date: '2019-10-16'
        },
        {
            title: "NASA's DAVINCI Mission Reveals Venus' Atmospheric Secrets",
            description: "The DAVINCI probe has successfully descended through Venus' atmosphere, providing unprecedented data about its composition and history.",
            category: "Planetary Exploration",
            image: "https://ina.iq/eng/uploads/posts/2022-06/upload_1654365602_1888492882.jpg",
            sourceUrl: "https://science.nasa.gov/missions/davinci/davincis-many-firsts-at-venus/",
            date: '2025-06-22'
        },
        {
            title: "First Commercial Space Station Module Successfully Docked",
            description: "Axiom Space's first commercial module has successfully docked with the International Space Station, marking a new era in space commercialization.",
            category: "Space Infrastructure",
            image: "https://www.digitaltrends.com/wp-content/uploads/2024/10/haven-2.jpeg?p=1",
            sourceUrl: "https://www.nasa.gov/news-release/nasa-selects-first-commercial-destination-module-for-international-space-station/",
            date: '2025-03-15'
        },
        {
            title: "Breakthrough in Fusion Energy: Net Energy Gain Achieved in Space",
            description: "Scientists aboard the International Space Station have achieved a significant milestone in fusion research, demonstrating net energy gain in microgravity conditions.",
            category: "Space Technology",
            image: "https://media-cldnry.s-nbcnews.com/image/upload/t_fit-760w,f_auto,q_auto:best/rockcms/2022-12/221213-National-Ignition-Facility-X-rays-al-1030-1b2653.jpg",
            sourceUrl: "https://www.theguardian.com/environment/2023/aug/06/us-scientists-achieve-net-energy-gain-second-time-fusion-reaction",
            date: '2025-09-30'
        }
    ];

    const spaceNews = [
        {
            title: "SpaceX Starship Completes High-Altitude Test",
            description: "Elon Musk's spacecraft prototype achieves major milestone",
            category1: "Technology",
            image: "https://i.ytimg.com/vi/GwC0aLsG7Rc/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAWTxxoPUSy6SlT9POCmGsuozo3AA",
            sourceUrl: "https://www.aljazeera.com/news/2024/6/7/spacex-rocket-completes-first-full-test-flight-after-surviving-re-entry",
            date: '2023-06-07'
        },
        {
            title: "New Exoplanet Discovered in Habitable Zone",
            description: "Astronomers find Earth-like planet orbiting nearby star",
            category1: "Astronomy",
            image: "https://i.abcnewsfe.com/a/c04d41c8-a24f-422e-be1e-2a7aacc26285/Super-Earth-ht-er-240205_1707153488302_hpMain_16x9.jpg",
            sourceUrl: "https://science.nasa.gov/universe/exoplanets/discovery-alert-a-super-earth-in-the-habitable-zone/",
            date: '2024-02-05'
        },
        {
            title: "James Webb Space Telescope Reveals Cosmic Secrets",
            description: "Revolutionary observatory provides unprecedented views of the universe",
            category1: "Science",
            image: "https://cdn.abcotvs.com/dip/images/12347150_101922-wls-pillars-of-creation-img.jpg",
            sourceUrl: "https://scitechdaily.com/webb-telescope-uncovers-bright-ancient-galaxies-that-challenge-cosmic-theories/",
            date: '2022-07-11'
        },
        {
            title: "NASA's Perseverance Rover Discovers Ancient Delta on Mars",
            description: "The rover has found evidence of an ancient river delta in Jezero Crater, supporting the theory that Mars once had flowing water.",
            category1: "Exploration",
            image: "https://cdn.mos.cms.futurecdn.net/5boWV7QPgeCo4LaCNZHeDc.jpg",
            sourceUrl: "https://www.nasa.gov/missions/mars-2020-perseverance/perseverance-rover/nasas-perseverance-rover-deciphers-ancient-history-of-martian-lake/",
            date: '2021-02-18'
        },
        {
            title: "SpaceX Successfully Launches Starlink Satellites",
            description: "SpaceX has launched another batch of Starlink satellites, expanding its global internet coverage network.",
            category1: "Technology",
            image: "https://satelliteprome.com/wp-content/uploads/2020/01/SpaceX.jpg",
            sourceUrl: "https://spaceflightnow.com/2024/12/03/live-coverage-spacex-to-launch-starlink-satellites-on-falcon-9-rocket-from-cape-canaveral-6/",
            date: '2024-12-03'
        },
        {
            title: "China Announces Plans for Lunar Research Station",
            description: "China has revealed plans to build a permanent research station on the Moon's south pole by 2030.",
            category1: "Space Policy",
            image: "https://cdn.i-scmp.com/sites/default/files/styles/og_image_scmp_generic/public/d8/images/canvas/2024/09/09/f1fe71b8-95dc-44ec-909e-48fc6089aa90_cd9d588c.jpg?itok=vkb_rd9N&v=1725861205",
            sourceUrl: "https://english.www.gov.cn/news/202409/07/content_WS66dbeb9dc6d0868f4e8eab63.html",
            date: '2023-09-07'
        },
        {
            title: "Astronomers Detect Mysterious Radio Signal from Distant Galaxy",
            description: "Scientists have picked up an unusual radio signal from a galaxy billions of light-years away, sparking curiosity about its origin.",
            category1: "Astrophysics",
            image: "https://static.techno-science.net/illustration/Source/PO/2024/11/11/russian-astronomers-di-1.jpg",
            sourceUrl: "https://www.space.com/radio-signal-ancient-galaxy-record-breaking-distance",
            date: '2024-11-11'
        },
        {
            title: "NASA and ESA Collaborate on Mars Sample Return Mission",
            description: "The space agencies are working together to bring the first samples from Mars back to Earth for detailed study.",
            category1: "Exploration",
            image: "https://science.nasa.gov/wp-content/uploads/2023/06/msr-family-final-7-27-slidetorightforbetanasasite-2000px-cropped.jpg?w=4096&format=jpeg",
            sourceUrl: "https://www.esa.int/Science_Exploration/Human_and_Robotic_Exploration/Exploration/Mars_sample_return",
            date: '2024-11-13'
        },
        {
            title: "JWST Captures Stunning Images of Jupiter's Aurora",
            description: "The James Webb Space Telescope has taken incredibly detailed images of Jupiter's aurora, providing new insights into the gas giant's atmospheric dynamics.",
            category1: "Astronomy",
            image: "https://images.newscientist.com/wp-content/uploads/2022/08/22165303/SEI_120623294.jpg",
            sourceUrl: "https://svs.gsfc.nasa.gov/31191",
            date: '2022-08-22'
        },
        {
            title: "Gravitational Waves Detected from Black Hole-Neutron Star Mergers",
            description: "LIGO and Virgo observatories have detected gravitational waves from the merger of black holes with neutron stars, opening a new chapter in gravitational wave astronomy.",
            category1: "Astrophysics",
            image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbGZTbCXalTARq0-bRTJzABg8kWI6E9IaWJA&s",
            sourceUrl: "https://news.northwestern.edu/stories/2024/04/first-gravitational-wave-detection-of-mass-gap-object-merging-with-neutron-star/",
            date: '2024-04-15'
        },
        {
            title: "Hubble Space Telescope Celebrates 30 Years of Discovery",
            description: "The Hubble Space Telescope marked its 30th anniversary in orbit, continuing to provide groundbreaking observations of the universe and inspiring a new generation of astronomers.",
            category1: "Astronomy",
            image: "https://images.fineartamerica.com/images-medium-large-5/hubble-space-telescope-nasa-esa-and-d-lennon-esastscidetlev-van-ravenswaayscience-photo-library.jpg",
            sourceUrl: "https://hubblesite.org/mission-and-telescope/hubble-30th-anniversary",
            date: '2020-04-24'
        },
        {
            title: "ESA's Solar Orbiter Captures Closest Images of the Sun",
            description: "The European Space Agency's Solar Orbiter has taken the closest-ever images of the Sun, revealing miniature solar flares dubbed 'campfires' on its surface.",
            category1: "Solar System",
            image: "https://www.esa.int/var/esa/storage/images/esa_multimedia/images/2019/10/solar_orbiter2/21087516-1-eng-GB/Solar_Orbiter_article.jpg",
            sourceUrl: "https://www.esa.int/Science_Exploration/Space_Science/Solar_Orbiter/Solar_Orbiter_s_first_images_reveal_campfires_on_the_Sun",
            date: '2023-07-16'
        },
        {
            title: "Water Ice Discovered on the Moon",
            description: "NASA's SOFIA airborne observatory confirms the presence of water ice in sunlit regions of the Moon, potentially providing a valuable resource for future lunar missions.",
            category1: "Lunar Exploration",
            image: "https://upload.wikimedia.org/wikipedia/commons/8/89/Chandrayaan1_Spacecraft_Discovery_Moon_Water.jpg",
            sourceUrl: "https://www.nasa.gov/press-release/nasa-s-sofia-discovers-water-on-sunlit-surface-of-moon",
            date: '2020-10-26'
        },
        {
            title: "New Horizons Flyby of Pluto",
            description: "NASA's New Horizons spacecraft completes a historic flyby of Pluto, providing the first close-up images and data of the dwarf planet and its moons.",
            category1: "Solar System Exploration",
            image: "https://i0.wp.com/spacenews.com/wp-content/uploads/2015/06/pluto-newhorizons-e1435599288265.jpg?fit=1024%2C460&ssl=1",
            sourceUrl: "https://www.nasa.gov/mission_pages/newhorizons/main/index.html",
            date: '2016-07-14'
        },
        {
            title: "Discovery of Earth-like Exoplanets in TRAPPIST-1 System",
            description: "Astronomers announce the discovery of seven Earth-sized planets orbiting the ultra-cool dwarf star TRAPPIST-1, with several potentially in the habitable zone.",
            category1: "Exoplanets",
            image: "https://assets.science.nasa.gov/dynamicimage/assets/science/astro/exo-explore/internal_resources/522/T1-Planet-Lineup_sm.jpg?w=4096&format=jpeg&fit=clip&crop=faces%2Cfocalpoint",
            sourceUrl: "https://exoplanets.nasa.gov/trappist1/",
            date: '2019-02-22'
        },
        {
            title: "Cassini's Grand Finale at Saturn",
            description: "After 13 years studying Saturn and its moons, NASA's Cassini spacecraft concludes its mission with a dramatic plunge into the gas giant's atmosphere.",
            category1: "Planetary Exploration",
            image: "https://d2pn8kiwq2w21t.cloudfront.net/images/backlit_saturn.2e16d0ba.fill-512x288-c70.format-jpeg.jpg",
            sourceUrl: "https://science.nasa.gov/mission/cassini/grand-finale/overview/",
            date: '2017-09-15'
        },
        {
            title: "InSight Lander Detects Marsquakes",
            description: "NASA's InSight lander detects and measures seismic activity on Mars, providing new insights into the planet's internal structure and geology.",
            category1: "Mars Exploration",
            image: "https://i.insider.com/603fa20cb46d720018b048d3?width=700",
            sourceUrl: "https://www.jpl.nasa.gov/news/nasas-insight-records-monster-quake-on-mars/",
            date: '2024-04-27'
        },
        {
            title: "Juno Spacecraft Reveals Jupiter's Complex Atmosphere",
            description: "NASA's Juno mission provides unprecedented views and data of Jupiter's atmosphere, including its iconic Great Red Spot and previously unknown cyclones at its poles.",
            category1: "Planetary Science",
            image: "https://www.dpreview.com/files/p/articles/6740868101/jupiter-juno-split-view.jpeg",
            sourceUrl: "https://www.nasa.gov/image-article/nasas-juno-mission-reveals-jupiters-complex-colors/",
            date: '2023-09-06'
        },
        {
            title: "Chang'e-4 Lands on Far Side of the Moon",
            description: "China's Chang'e-4 mission becomes the first to land on the far side of the Moon, exploring this previously unseen lunar terrain.",
            category1: "Lunar Exploration",
            image: "https://static.independent.co.uk/s3fs-public/thumbnails/image/2019/01/02/15/moon.jpg",
            sourceUrl: "https://www.science.org/content/article/chinese-spacraft-successfully-lands-moons-far-side-and-sends-pictures-back-home",
            date: '2021-01-03'
        },
        {
            title: "ESA's Gaia Mission Creates Most Detailed 3D Map of the Milky Way",
            description: "The European Space Agency's Gaia spacecraft releases the most comprehensive 3D map of our galaxy, providing positions and motions for nearly 2 billion stars.",
            category1: "Galactic Cartography",
            image: "https://scitechdaily.com/images/ESA-Gaia-Spacecraft-Prepares-for-Launch-777x515.jpg",
            sourceUrl: "https://www.azoquantum.com/Article.aspx?ArticleID=350",
            date: '2023-10-26'
        },
        {
            title: "Hubble Telescope Observes Interstellar Comet 2I/Borisov",
            description: "The Hubble Space Telescope captures detailed images of 2I/Borisov, the second known interstellar object to visit our solar system.",
            category1: "Astronomy",
            image: "https://www.universetoday.com/wp-content/uploads/2019/10/Halleys_Comet_1910.jpg",
            sourceUrl: "https://science.nasa.gov/missions/hubble/hubble-observes-1st-confirmed-interstellar-comet/",
            date: '2019-10-16'
        },
        {
            title: "NASA's Artemis Program: The Next Giant Leap",
            description: "NASA's Artemis program aims to land the first woman and the next man on the Moon by 2024, paving the way for sustainable lunar exploration and eventual missions to Mars. This ambitious project represents the next era of human spaceflight and scientific discovery.",
            category1: "Astronomy",
            image: "https://i.ytimg.com/vi/9YDfmbmLxwc/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBzW48f_aPClYW1FndH9jgcpRZwog",
            sourceUrl: "https://www.nasa.gov/news-release/nasa-publishes-artemis-plan-to-land-first-woman-next-man-on-moon-in-2024/",
            date: '2024-12-10'
        },
        {
            title: "NASA's DAVINCI Mission Reveals Venus' Atmospheric Secrets",
            description: "The DAVINCI probe has successfully descended through Venus' atmosphere, providing unprecedented data about its composition and history.",
            category1: "Planetary Exploration",
            image: "https://ina.iq/eng/uploads/posts/2022-06/upload_1654365602_1888492882.jpg",
            sourceUrl: "https://science.nasa.gov/missions/davinci/davincis-many-firsts-at-venus/",
            date: '2024-06-22'
        },
        {
            title: "First Commercial Space Station Module Successfully Docked",
            description: "Axiom Space's first commercial module has successfully docked with the International Space Station, marking a new era in space commercialization.",
            category1: "Space Infrastructure",
            image: "https://www.digitaltrends.com/wp-content/uploads/2024/10/haven-2.jpeg?p=1",
            sourceUrl: "https://www.nasa.gov/news-release/nasa-selects-first-commercial-destination-module-for-international-space-station/",
            date: '2024-03-15'
        },
        {
            title: "Breakthrough in Fusion Energy: Net Energy Gain Achieved in Space",
            description: "Scientists aboard the International Space Station have achieved a significant milestone in fusion research, demonstrating net energy gain in microgravity conditions.",
            category1: "Space Technology",
            image: "https://media-cldnry.s-nbcnews.com/image/upload/t_fit-760w,f_auto,q_auto:best/rockcms/2022-12/221213-National-Ignition-Facility-X-rays-al-1030-1b2653.jpg",
            sourceUrl: "https://www.theguardian.com/environment/2023/aug/06/us-scientists-achieve-net-energy-gain-second-time-fusion-reaction",
            date: '2024-09-30'
        }
    ]

    const newsGrid = document.getElementById('news-grid');

    newsItems.forEach(item => {
        const newsItem = document.createElement('div');
        newsItem.classList.add('news-item');
        newsItem.innerHTML = `
     <img src="${item.image}" alt="${item.title}" onerror="this.onerror=null; this.classList.add('error'); this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'100%25\' height=\'100%25\'%3E%3Crect width=\'100%25\' height=\'100%25\' fill=\'%23e0e0e0\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-family=\'Arial\' font-size=\'14\' fill=\'%23666666\'%3EImage not available%3C/text%3E%3C/svg%3E';">
     <div class = "news-content">
        <h3>${item.title}</h3>
        <p>${item.description}</p>
        <span class="category">${item.category}</span>
        <a href="${item.sourceUrl}" class="read-more" target="_blank" rel="noopener noreferrer">Read full story</a>
     </div>   
    `;
        newsGrid.appendChild(newsItem);
    });

    function sortNewsByDate(news) {
        return news.sort((a, b) => new Date(b.date) - new Date(a.date));
    }
    
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }
    
    function populateTable(news) {
        const tableBody = document.querySelector('#spaceNewsTable tbody');
        tableBody.innerHTML = '';
    
        news.forEach(item => {
            const row = tableBody.insertRow();
            const dateCell = row.insertCell(0);
            const imageCell = row.insertCell(1);
            const titleCell = row.insertCell(2);
            const descriptionCell = row.insertCell(3);
            const categoryCell = row.insertCell(4);
            const sourceCell = row.insertCell(5);
    
            dateCell.textContent = formatDate(item.date);
            dateCell.className = 'date';
    
            imageCell.className = 'image-cell';
            const img = document.createElement('img');
            img.src = item.image;
            img.alt = item.title;
            img.className = 'news-image';
            imageCell.appendChild(img);
    
            titleCell.textContent = item.title;
            descriptionCell.textContent = item.description;
            categoryCell.textContent = item.category1;
            categoryCell.className = 'category1';
    
            const sourceLink = document.createElement('a');
            sourceLink.href = item.sourceUrl;
            sourceLink.textContent = 'Read More';
            sourceLink.className = 'source-link';
            sourceLink.target = '_blank';
            sourceCell.appendChild(sourceLink);
        });
    }
    
    const sortedNews = sortNewsByDate(spaceNews);
    populateTable(sortedNews);
});


