(function () {
  //# 幅変更検知 #//
  class ResizeWatcher {
    constructor() {
      this.prevWidth = window.innerWidth;
    }

    isResizeWidth() {
      const currentWidth = window.innerWidth;
      if (currentWidth !== this.prevWidth) {
        this.prevWidth = currentWidth;
        return true;
      }
      return false;
    }
  }
  const watcherCommon = new ResizeWatcher();

  //読み込み時
  window.addEventListener('DOMContentLoaded', function () {
    init_sp_site_header();
    init_pc_site_header();
  });

  let isPC = 1250 < window.innerWidth;

  window.addEventListener('resize', function () {
    isPC = 1250 < window.innerWidth;
  });

  function init_pc_site_header() {
    const sh = document.getElementById('site-header');
    if (!sh) return;

    const shItem = sh.querySelectorAll('[data-sh-item]');
    if (!shItem.length) return;

    const ACTIVE_CLASS = 'is-active';
    const shHover = sh.querySelector('.sh-pc-hover');
    if (!shHover) return;

    const openHover = () => {
      shHover.style.transitionDelay = '0s';
      shHover.style.height = shHover.scrollHeight + 'px';
      shHover.classList.add(ACTIVE_CLASS);
    };

    const closeHover = () => {
      shHover.style.transitionDelay = '0.3s';
      shHover.style.height = '0';
      shHover.classList.remove(ACTIVE_CLASS);
    };

    shItem.forEach(function (item) {
      const dataName = item.dataset.shItem;
      const dataTarget = sh.querySelector('[data-sh-target="' + dataName + '"]');
      if (!dataTarget) return; //continue

      item.addEventListener('mouseenter', () => {
        if (!isPC) return;
        openHover();
        dataTarget.classList.add(ACTIVE_CLASS);
      });

      item.addEventListener('mouseleave', () => {
        if (!isPC) return;
        closeHover();
        dataTarget.classList.remove(ACTIVE_CLASS);
      });
    });
  }

  function init_sp_site_header() {
    const shBtn = document.getElementById('sh-bar-btn');
    if (!shBtn) return;

    const shMain = document.getElementById('sh-sp-main');
    if (!shMain) return;

    const shBar = document.querySelector('.site-header .sh-bar');
    if (!shBar) return;

    const ACTIVE_CLASS = 'is-active';
    const NO_SCROLL = 'no-scroll';

    let minus = shBar.offsetHeight;

    const init = () => {
      minus = shBar.offsetHeight;
      shMain.style.top = minus + 'px';
    };

    const clickShBtn = () => {
      if (shBtn.classList.contains(ACTIVE_CLASS)) {
        closeNav();
      } else {
        openNav();
      }
    };

    const openNav = () => {
      document.body.classList.add(NO_SCROLL);
      shMain.style.height = window.innerHeight - minus + 'px';
      shMain.classList.add(ACTIVE_CLASS);
      shBtn.classList.add(ACTIVE_CLASS);
    };

    const closeNav = () => {
      document.body.classList.remove(NO_SCROLL);
      shMain.style.height = '0px';
      shMain.classList.remove(ACTIVE_CLASS);
      shBtn.classList.remove(ACTIVE_CLASS);
    };

    init();

    if (!shBtn.dataset.spInitialized) {
      //イベント登録の重複を防ぐ
      shBtn.dataset.spInitialized = 'true';
      shBtn.addEventListener('click', clickShBtn);

      window.addEventListener('resize', function () {
        if (watcherCommon.isResizeWidth()) {
          init();
          closeNav();
        }
      });
    }
  }
})();
