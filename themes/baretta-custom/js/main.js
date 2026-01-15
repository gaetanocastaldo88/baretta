/**
 * Baretta Associati Theme Scripts
 *
 * @package Baretta
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {

        // Hero Video Lazy Loading
        function initHeroVideo() {
            var $hero = $('.hero');
            var $video = $('.hero-video');

            if ($video.length === 0) return;

            var $source = $video.find('source');
            var videoSrc = $source.data('src');

            if (!videoSrc) return;

            // Funzione per caricare il video
            function loadVideo() {
                $source.attr('src', videoSrc);
                $video[0].load();

                // Quando il video è pronto per essere riprodotto
                $video[0].addEventListener('canplaythrough', function() {
                    $hero.addClass('video-loaded');
                    $video[0].play().catch(function(e) {
                        // Autoplay bloccato, mostra comunque il video
                        console.log('Autoplay prevented:', e);
                    });
                }, { once: true });

                // Fallback se canplaythrough non si attiva
                $video[0].addEventListener('loadeddata', function() {
                    setTimeout(function() {
                        if (!$hero.hasClass('video-loaded')) {
                            $hero.addClass('video-loaded');
                            $video[0].play().catch(function(e) {
                                console.log('Autoplay prevented:', e);
                            });
                        }
                    }, 500);
                }, { once: true });
            }

            // Usa Intersection Observer per lazy loading
            if ('IntersectionObserver' in window) {
                var videoObserver = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            loadVideo();
                            videoObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    rootMargin: '50px 0px',
                    threshold: 0.01
                });

                videoObserver.observe($hero[0]);
            } else {
                // Fallback per browser senza IntersectionObserver
                loadVideo();
            }

            // Pausa video quando non visibile (risparmio batteria)
            document.addEventListener('visibilitychange', function() {
                if (document.hidden) {
                    $video[0].pause();
                } else {
                    $video[0].play().catch(function() {});
                }
            });
        }

        // Inizializza video hero
        initHeroVideo();

        // Mobile menu toggle
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.main-nav').toggleClass('active');
            $('body').toggleClass('menu-open');

            // Animate hamburger icon
            if ($(this).hasClass('active')) {
                $(this).find('span:nth-child(1)').css({
                    'transform': 'rotate(45deg) translate(5px, 5px)'
                });
                $(this).find('span:nth-child(2)').css({
                    'opacity': '0'
                });
                $(this).find('span:nth-child(3)').css({
                    'transform': 'rotate(-45deg) translate(5px, -5px)'
                });
            } else {
                $(this).find('span').css({
                    'transform': 'none',
                    'opacity': '1'
                });
            }
        });

        // Close menu when clicking a link (mobile)
        $('.main-nav a').on('click', function() {
            if ($(window).width() < 769) {
                $('.menu-toggle').removeClass('active');
                $('.main-nav').removeClass('active');
                $('body').removeClass('menu-open');
                $('.menu-toggle').find('span').css({
                    'transform': 'none',
                    'opacity': '1'
                });
            }
        });

        // Smooth scroll for anchor links
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 800);
                    return false;
                }
            }
        });

        // Project filter functionality
        $('.filter-btn').on('click', function() {
            var filter = $(this).data('filter');

            // Update active button
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');

            // Filter projects with staggered animation
            var delay = 0;
            if (filter === 'all') {
                $('.project-card').each(function(index) {
                    var $card = $(this);
                    setTimeout(function() {
                        $card.fadeIn(400).css('transform', 'translateY(0)');
                    }, index * 50);
                });
            } else {
                $('.project-card').each(function(index) {
                    var $card = $(this);
                    var projectCategory = $card.data('category');
                    if (projectCategory === filter) {
                        setTimeout(function() {
                            $card.fadeIn(400).css('transform', 'translateY(0)');
                        }, delay * 50);
                        delay++;
                    } else {
                        $card.fadeOut(300);
                    }
                });
            }

            // AJAX filter (if using WordPress categories)
            if (typeof barettaAjax !== 'undefined') {
                $.ajax({
                    url: barettaAjax.ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'filter_projects',
                        category: filter === 'all' ? '' : filter,
                        nonce: barettaAjax.nonce
                    },
                    beforeSend: function() {
                        $('#projects-container').css('opacity', '0.5');
                    },
                    success: function(response) {
                        if (response) {
                            $('#projects-container').html(response).css('opacity', '1');
                        }
                    },
                    error: function() {
                        $('#projects-container').css('opacity', '1');
                    }
                });
            }
        });

        // Intersection Observer for scroll animations
        if ('IntersectionObserver' in window) {
            var animateObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry, index) {
                    if (entry.isIntersecting) {
                        // Add staggered delay based on element position
                        var delay = entry.target.dataset.delay || 0;
                        setTimeout(function() {
                            entry.target.classList.add('animated', 'visible');
                        }, delay);
                        animateObserver.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px 0px -50px 0px',
                threshold: 0.1
            });

            // Observe all animatable elements
            document.querySelectorAll('.animate-on-scroll, .service-card, .project-card, .team-member, .value-item, .about-section, .about-image, .about-content').forEach(function(el, index) {
                el.dataset.delay = index * 100;
                animateObserver.observe(el);
            });

            // Add animation classes to sections
            document.querySelectorAll('.section').forEach(function(section) {
                var items = section.querySelectorAll('.service-card, .project-card, .team-member, .value-item');
                items.forEach(function(item, index) {
                    item.classList.add('animate-on-scroll', 'animate-fade-up');
                    item.style.transitionDelay = (index * 0.1) + 's';
                });
            });

            // Animate about sections
            document.querySelectorAll('.about-section').forEach(function(aboutSection) {
                var image = aboutSection.querySelector('.about-image');
                var content = aboutSection.querySelector('.about-content');

                if (image) {
                    image.classList.add('animate-on-scroll', 'animate-fade-left');
                    animateObserver.observe(image);
                }
                if (content) {
                    content.classList.add('animate-on-scroll', 'animate-fade-right');
                    content.style.transitionDelay = '0.2s';
                    animateObserver.observe(content);
                }
            });
        } else {
            // Fallback for older browsers
            $('.service-card, .project-card, .team-member, .value-item').addClass('visible animated');
        }

        // Form validation with visual feedback
        $('.contact-form').on('submit', function(e) {
            var isValid = true;
            var $form = $(this);

            // Check required fields
            $form.find('[required]').each(function() {
                var $field = $(this);
                if (!$field.val()) {
                    isValid = false;
                    $field.addClass('error');
                    $field.parent().addClass('has-error');

                    // Shake animation
                    $field.css('animation', 'shake 0.5s ease');
                    setTimeout(function() {
                        $field.css('animation', '');
                    }, 500);
                } else {
                    $field.removeClass('error');
                    $field.parent().removeClass('has-error');
                }
            });

            // Email validation
            var emailField = $form.find('input[type="email"]');
            if (emailField.length && emailField.val()) {
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailField.val())) {
                    isValid = false;
                    emailField.addClass('error');
                    emailField.parent().addClass('has-error');
                }
            }

            if (!isValid) {
                e.preventDefault();
                $form.find('.error').first().focus();
            }
        });

        // Remove error class on input
        $('.contact-form input, .contact-form textarea').on('focus input', function() {
            $(this).removeClass('error');
            $(this).parent().removeClass('has-error');
        });

        // Cursor follow effect for hero (subtle architectural touch)
        if ($('.hero').length && window.innerWidth > 768) {
            $('.hero').on('mousemove', function(e) {
                var xPos = (e.pageX - $(this).offset().left) / $(this).width() - 0.5;
                var yPos = (e.pageY - $(this).offset().top) / $(this).height() - 0.5;

                $('.hero-background').css({
                    'transform': 'translate(' + (xPos * 20) + 'px, ' + (yPos * 20) + 'px) scale(1.1)'
                });
            });
        }

        // Smooth number counter animation for value numbers
        function animateNumbers() {
            $('.value-number').each(function() {
                var $this = $(this);
                if ($this.hasClass('counted')) return;

                var elementTop = $this.offset().top;
                var viewportBottom = $(window).scrollTop() + $(window).height();

                if (elementTop < viewportBottom) {
                    $this.addClass('counted');
                    var text = $this.text();
                    var number = parseInt(text.replace(/\D/g, ''));
                    var suffix = text.replace(/[0-9]/g, '');

                    if (number && number < 10000) {
                        $({ counter: 0 }).animate({ counter: number }, {
                            duration: 1500,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.ceil(this.counter) + suffix);
                            },
                            complete: function() {
                                $this.text(number + suffix);
                            }
                        });
                    }
                }
            });
        }

        $(window).on('scroll', animateNumbers);
        animateNumbers();

        // Image lazy loading with fade-in
        if ('loading' in HTMLImageElement.prototype) {
            document.querySelectorAll('img[loading="lazy"]').forEach(function(img) {
                img.addEventListener('load', function() {
                    img.classList.add('loaded');
                });
            });
        }

    });

    // Window scroll
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();

        // Add class to header on scroll
        if (scroll >= 50) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }

        // Parallax effect for hero
        if ($('.hero-background').length && window.innerWidth > 768) {
            var scrolled = scroll * 0.4;
            $('.hero-background').css('transform', 'translateY(' + scrolled + 'px)');
        }

        // Parallax for about images
        $('.about-image').each(function() {
            var elementTop = $(this).offset().top;
            var scrollPos = scroll - elementTop + $(window).height();
            if (scrollPos > 0 && scroll < elementTop + $(this).height()) {
                var parallax = scrollPos * 0.05;
                $(this).find('img').css('transform', 'translateY(' + parallax + 'px)');
            }
        });
    });

    // Window resize
    $(window).on('resize', function() {
        // Close mobile menu on resize to desktop
        if ($(window).width() >= 769) {
            $('.menu-toggle').removeClass('active');
            $('.main-nav').removeClass('active');
            $('body').removeClass('menu-open');
            $('.menu-toggle').find('span').css({
                'transform': 'none',
                'opacity': '1'
            });
        }
    });

    // Page load animations
    $(window).on('load', function() {
        // Add loaded class to body for CSS animations
        $('body').addClass('page-loaded');

        // Trigger initial animations
        setTimeout(function() {
            $('.hero').addClass('loaded');
        }, 100);
    });

})(jQuery);

// Add CSS for shake animation
var style = document.createElement('style');
style.textContent = '@keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-5px); } 75% { transform: translateX(5px); } }';
document.head.appendChild(style);
