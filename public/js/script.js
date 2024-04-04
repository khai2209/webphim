// scroll
window.onscroll = function() {
    var header = document.getElementById("header");
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollPosition > 50) {
        header.style.backgroundColor = "#111319";
    }else {
        header.style.backgroundColor = "rgba(0,0,0,0.08)";
    }
}

// Show login
    var closeModal1 = document.querySelector('.close-login');
    var closeModal2 = document.querySelector('.modal-2__close');
    var closeModal3 = document.querySelector('.modal-3__close');
    var closeModal4 = document.querySelector('.modal-4__close');
   
    var modal = document.querySelector('#modal');
    var modal2 = document.querySelector('#modal-2__login');
    var modal3 = document.querySelector('#modal-3__signup');
    var modal4 = document.querySelector('#modal-4__forgotpass');

    var open = document.querySelector('.click-login');
    var openModalEditAcc = document.querySelector('#editBtn');
    const closeModal = (a,b) => {
        a.onclick = function() {
            b.classList.remove('show');
            b.classList.add('hide');
        }
    };
    const backCurrentModal = (a,b) => {
        b.classList.toggle('show');
        b.classList.toggle('hide');
        a.classList.toggle('hide');
        a.classList.toggle('show');
    };
    const switchModal = (a,b) => {
        b.classList.toggle('show');
        b.classList.toggle('hide');
        a.classList.toggle('hide');
        a.classList.toggle('show');
    }
    open.onclick = function() {
        modal.classList.remove('hide');
        modal.classList.add('show');
    }
    
    closeModal(closeModal1,modal);
    closeModal(closeModal2,modal2);
    closeModal(closeModal3,modal3);
    closeModal(closeModal4,modal4);
    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.classList.remove('show');
            modal.classList.add('hide');
        }
    }

    // switch model
    var btnSwitch = document.querySelector('.switch-model__2');
    var backBtn = document.querySelector('.back-btn__2');
    var backBtn3 = document.querySelector('.back-btn__3');
    var backBtn4 = document.querySelector('.back-btn__4');
    var btnAnotherLogin2 = document.querySelector('.btn-another__md2');
    var btnAnotherLogin3 = document.querySelector('.btn-another__md3');
    var btnAnotherLogin4 = document.querySelector('.btn-another__md4');
    var btnSwitchSignup = document.querySelector('.btn-signup__md1');
    var btnSwitchSignup2 = document.querySelector('.btn-signup__md2');
    var btnSwitchLogin3 = document.querySelector('.btn-login__md3');
    var btnFogotPasswd = document.querySelector('.button-forgotpass');

    btnSwitch.onclick = function() {
        switchModal(modal,modal2)
    }
    btnSwitchSignup2.onclick = function() {
        switchModal(modal2,modal3);
    }
    btnSwitchLogin3.onclick = function() {
        switchModal(modal3,modal2)
    }
    btnFogotPasswd.onclick = function() {
        switchModal(modal2,modal4);
    }
    backBtn.onclick = function() {
        backCurrentModal(modal,modal2);
    }
    backBtn3.onclick = function() {
        backCurrentModal(modal,modal3);
    }
    backBtn4.onclick = function() {
        backCurrentModal(modal2,modal4);
    }
    btnAnotherLogin2.onclick = function() {
        backCurrentModal(modal,modal2);
    }
    btnAnotherLogin3.onclick = function() {
        backCurrentModal(modal,modal3);
    }
    btnAnotherLogin4.onclick = function() {
        backCurrentModal(modal,modal4);
    }
    btnSwitchSignup.onclick = function() {
        switchModal(modal,modal3)
    }



