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

  //リサイズ時
  window.addEventListener('resize', function () {
    if (watcherCommon.isResizeWidth()) {
    }
  });
})();
