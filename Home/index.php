<?php

class SmoothScroll {
    private $anchors;

    public function __construct() {
        $this->anchors = $this->getAnchors();
        $this->addAnchorClickEvent();
    }

    private function getAnchors() {
        return document.querySelectorAll('a[href^="#"]');
    }

    private function addAnchorClickEvent() {
        foreach ($this->anchors as $anchor) {
            $anchor->addEventListener('click', function ($e) {
                $e->preventDefault();
                document.querySelector($this->getAttribute('href'))->scrollIntoView([
                    'behavior' => 'smooth'
                ]);
            });
        }
    }
}

class HeroAnimation {
    private $heroContent;
    private $heroImage;

    public function __construct() {
        $this->heroContent = document.querySelector('.hero-content');
        $this->heroImage = document.querySelector('.hero-image');
        $this->addScrollEvent();
    }

    private function addScrollEvent() {
        window.addEventListener('scroll', function () {
            $scrollPosition = window.pageYOffset;
            if ($this->heroContent) {
                $this->heroContent->style->transform = "translateY($scrollPosition * 0.5}px)";
            }
            if ($this->heroImage) {
                $this->heroImage->style->transform = "translateY($scrollPosition * 0.2}px)";
            }
        });
    }
}

class SectionAnimation {
    private $sections;

    public function __construct() {
        $this->sections = document.querySelectorAll('.section');
        $this->addScrollEvent();
    }

    private function addScrollEvent() {
        window.addEventListener('scroll', function () {
            $triggerBottom = window.innerHeight / 5 * 4;
            foreach ($this->sections as $section) {
                $sectionTop = $section->getBoundingClientRect()->top;
                if ($sectionTop < $triggerBottom) {
                    $section->classList->add('animate');
                } else {
                    $section->classList->remove('animate');
                }
            }
        });
    }
}

class MenuToggle {
    private $menuToggle;
    private $nav;

    public function __construct() {
        $this->menuToggle = document.createElement('div');
        $this->menuToggle->classList->add('menu-toggle');
        $this->menuToggle->innerHTML = '☰';
        document.querySelector('.main-header .container')->appendChild($this->menuToggle);
        $this->nav = document.querySelector('.main-nav');
        $this->addToggleEvent();
        $this->addResizeEvent();
    }

    private function addToggleEvent() {
        $this->menuToggle->addEventListener('click', function () {
            $this->nav->classList->toggle('show');
        });
    }

    private function addResizeEvent() {
        window.addEventListener('resize', function () {
            if (window.innerWidth > 768) {
                $this->nav->classList->remove('show');
            }
        });
    }
}

new SmoothScroll();
new HeroAnimation();
new SectionAnimation();
new MenuToggle();






































?>