const container = document.querySelector('#container');

const options = {
    root: null, // Observa a viewport
    rootMargin: '0px', // Sem margem adicional
    threshold: 0.5, // Dispara quando 50% do elemento estiver visível
};

const callback = (entries, observer) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            var a = window.document.getElementsByClassName('hidden')
            Array.from(a).forEach((elemento) => {
                elemento.classList.remove('hidden');
                elemento.classList.add('visible');
            })
        } else {
            var a = window.document.getElementsByClassName('visible')
            Array.from(a).forEach((elemento) => {
                elemento.classList.remove('visible');
                elemento.classList.add('hidden');
            })
        }
    });
};

// Cria o Intersection Observer
const observer = new IntersectionObserver(callback, options);

// Começa a observar o elemento
observer.observe(container);