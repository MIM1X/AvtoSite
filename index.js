//Получение кнопки по её ID
AddTovar = document.getElementById('myButton').onclick;

//Функция добавления товара в вывод
function AddTovar() {
  
  //Добавление параметров для самого внешнего DIV
  Name = document.querySelector('.sjnaan16u177457').value;
  Price = getRandomIntInclusive(10, 100000);
  var tovar = document.createElement('div');
  tovar.setAttribute('class', 'tovar', 'onclick', 'alert', 'Вы подписаны');
  tovar.onclick = function() {window.location.href = 'http://localhost/AvtoSite/test.html';};

  //Создание запроса
  tovar.innerHTML = `
    <div class="div53">
      <a class="a11">${Name}</a>
      <a class="a11">${Price} RUB</a>
    </div>
    <img class="icon2" loading="lazy" src="./public/zaza.svg"/>`;

  //Добавление элемента товара в элемент Списка
  document.getElementById('SpisokTovarov').appendChild(tovar);
}

//Функция получения рандомного числа (мин -> макс)
function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1) + min); // Максимум и минимум включаются
}