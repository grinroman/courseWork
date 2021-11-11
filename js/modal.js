//Открытие модального окна для изменения товара

function closeModal(modalSelector) {
    const modal = document.querySelector(modalSelector);

    modal.classList.add('hide');
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
}

function openModal(modalSelector, currentBtn) {
    const modal = document.querySelector(modalSelector);
    modal.classList.remove('hide');
    modal.classList.add('show');
    document.body.style.overflowY = 'hidden';

    const textFieldsInModal = document.querySelectorAll(".modal__content input"); // получим все  поля модалки
        const pictureWrapper = document.querySelector(".modal__picture__wrapper");//обертка для текущей картинки
        const infoFromTable = currentBtn.parentElement.parentElement.querySelectorAll('[inf-text]'); //получаем информацию из строки нажатой кнопки
        infoFromTable.forEach((textField, i) => { // выгрузим текстовые поля в форму изменения, отобразим текущую картинку
            if (textField.firstElementChild) {
                textFieldsInModal[i].value = textField.firstElementChild.src.slice(7);
                pictureWrapper.innerHTML = `<img src="${textField.firstElementChild.src}" alt="#" width="100px" class="card-img"> `;
                pictureWrapper.style.width = "400px";
               
            } else {
                textFieldsInModal[i].value = textField.textContent;
            }
        })
       
                                   
}

const modalTrigger = document.querySelectorAll('.update__modal__open'),
        modal = document.querySelector('.modal');

    modalTrigger.forEach(btn => {
        btn.addEventListener('click', () => openModal('.modal', btn));
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal || e.target.hasAttribute('data-close')) {
            closeModal('.modal');
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.code === "Escape" && modal.classList.contains('show')) { 
            closeModal('.modal');
        }
    });
