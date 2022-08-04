window.addEventListener("DOMContentLoaded", function () {
    function initTogglers() {
        let togglers = document.querySelectorAll(".se-section__toggler");

        togglers.forEach(function (toggler) {
            toggler.addEventListener('click', function () {
                let id = this.getAttribute('data-toggler');
                content = document.querySelector('.se-section__content[data-content="' + id + '"]');

                activeToggler = document.querySelector('.se-section__toggler.se-section__toggler--active');
                activeContent = document.querySelector('.se-section__content.se-section__content--active');

                activeToggler.classList.remove('se-section__toggler--active');
                toggler.classList.add('se-section__toggler--active');

                activeContent.classList.remove('se-section__content--active');
                content.classList.add('se-section__content--active');
            });
        });
    }

    initTogglers();

    function initSlider() {
        let navButton = document.querySelectorAll('.se-section__content-slider-navigation');
        navButton.forEach(function (button) {
            button.addEventListener('click', function () {
                let parentButton = button.closest('.se-section__content');
                let activeItem = parentButton.querySelector('.se-section__content-slider-item.se-section__content-slider-item--active');
                let indexitem = activeItem.getAttribute('data-index');

                if (this.getAttribute('data-nav') == 'prev') {
                    let count = parentButton.querySelectorAll('.se-section__content-slider-item').length;
                    let index = ((Number(indexitem) - 1) != 0) ? Number(indexitem) - 1 : count;
                    let content = parentButton.querySelector('.se-section__content-slider-item[data-index="' + index + '"]');

                    activeItem.classList.remove('se-section__content-slider-item--active');
                    content.classList.add('se-section__content-slider-item--active');
                } else if (this.getAttribute('data-nav') == 'next') {
                    let count = parentButton.querySelectorAll('.se-section__content-slider-item').length;
                    let index = ((Number(indexitem) + 1) > count) ? 1 : Number(indexitem) + 1;
                    let content = parentButton.querySelector('.se-section__content-slider-item[data-index="' + index + '"]');

                    activeItem.classList.remove('se-section__content-slider-item--active');
                    content.classList.add('se-section__content-slider-item--active');
                }
            })

        });
    }

    initSlider();
})
