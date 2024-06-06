// Создаем кнопку
let btn = document.createElement('button');
btn.innerText = 'Добавить элемент';
document.body.appendChild(btn);

// Добавляем обработчик события нажатия на кнопку
btn.addEventListener('click', function() {
 // Здесь добавляем нужный HTML элемент
 let div = document.createElement('div');
 div.innerText = 'Это новый элемент';
 document.body.appendChild(div);
});