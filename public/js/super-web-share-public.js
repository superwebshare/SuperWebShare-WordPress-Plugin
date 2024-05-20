"use strict";
var DOMReady = function (callback) {
  if (document.readyState === "interactive" || document.readyState === "complete") {
    callback();
  } else if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded", callback());
  } else if (document.attachEvent) {
    document.attachEvent("onreadystatechange", function () {
      if (document.readyState === "complete") {
        callback();
      }
    });
  }
};

const showFallbackOnDesktop = () => {
  // This settings not applicable for MS Edge browser.
  if (window.superWebShareFallback.superwebshare_fallback_show_fallback_on_desktop === "enable") {
    let isIEedge = window.navigator.userAgent.indexOf("Edg") > -1;
    let regexp = /android|iphone|kindle|ipad|webos|ipod/i;
    let isDesktop = !regexp.test(window.navigator.userAgent);
    return isDesktop && !isIEedge;
  } else {
    return false;
  }
};

DOMReady(function () {
  setTimeout(hasPermission, 200);
  if (window.location.protocol != "https:") {
    if (document.querySelector(".sws-copy")) document.querySelector(".sws-copy").style.display = "none";
  }
  if (showFallbackOnDesktop()) {
    let buttons = document.querySelectorAll(".superwebshare_prompt");
    if (buttons.length > 0) {
      buttons.forEach((m) => (m.style.display = "none"));
    }
  }
});

function hasPermission() {
  if (
    (typeof navigator.share === "undefined" || !navigator.share) &&
    window.superWebShareFallback.superwebshare_fallback_enable != "enable"
  ) {
    var x =
      document.getElementsByClassName("superwebshare_prompt") ||
      document.getElementsByClassName(".superwebshare_prompt .span");
    var i;
    for (i = 0; i < x.length; i++) {
      if (x[i].classList.contains("shortcode-button")) continue;
      x[i].style.display = "none";
    }
    let f = document.querySelectorAll(".sws-fallback-off");
    if (f.length > 0) {
      f.forEach((m) => (m.style.display = "none"));
    }
    console.log("SuperWebShare: Your browser does not seems to support SuperWebShare, as the browser is incompatible");
  }

  if (typeof navigator.share === "undefined" || !navigator.share) {
    let f = document.querySelectorAll(".sws-hide-if-no-share");
    if (f.length > 0) {
      f.forEach((m) => (m.style.display = "none"));
    }
  }
}

async function SuperWebSharefn(title, url, description, fallback = "yes") {
  fallback = fallback || "yes";
  window.superWebShareData = { title, url, description };
  if (typeof navigator.share === "undefined" || !navigator.share) {
    fallback == "yes" && swsModal();
  } else if (window.location.protocol != "https:") {
    console.log(
      "SuperWebShare: Seems like the website is not served fully via https://. As for supporting SuperWebShare the website should be served fully via https://"
    );
    fallback == "yes" && swsModal();
  } else {
    try {
      await navigator.share({ title, text: description, url });
    } catch (error) {
      console.log("Error occurred while sharing: " + error);
      return;
    }
  }
}

const getPageMeta = () => {
  var mData = {};
  if (document.querySelector('meta[property="og:description"]') != null) {
    mData.meta_desc = document.querySelector('meta[property="og:description"]').content;
  } else if (document.querySelector('meta[property="description"]') != null) {
    mData.meta_desc = document.querySelector('meta[property="description"]').content;
  } else {
    mData.meta_desc = document.title;
  }

  if (document.querySelector('meta[property="og:title"]') != null) {
    mData.meta_title = document.querySelector('meta[property="og:title"]').content;
  } else if (document.querySelector('meta[property="twitter:title"]') != null) {
    mData.meta_title = document.querySelector('meta[property="twitter:title"]').content;
  } else {
    mData.meta_title = document.title;
  }

  if (document.querySelector('meta[property="og:url"]') != null) {
    mData.meta_url = document.querySelector('meta[property="og:url"]').content;
  } else {
    mData.meta_url = window.location.href;
  }

  return mData;
};

document.addEventListener("click", function (SuperWebShare) {
  var target = SuperWebShare.target;
  const button = target.closest(".superwebshare_prompt") || target.closest(".superwebshare_trigger");

  if (button) {
    let { meta_desc, meta_title, meta_url } = getPageMeta();
    let { shareTitle, shareLink, shareDescription, fallback } = button.dataset;

    SuperWebSharefn(shareTitle || meta_title, shareLink || meta_url, shareDescription || meta_desc, fallback);
  } else if (target.classList.contains("sws-modal-bg")) {
    swsModal("hide");
  }
});

DOMReady(function () {
  let copyButton = document.querySelector(".sws-copy a");
  if (copyButton) {
    const child = copyButton.querySelector("span");
    const initialText = child.innerText;
    copyButton.addEventListener("click", function (e) {
      e.preventDefault();
      let { meta_url } = getPageMeta();
      const shareUrl = window.superWebShareData.url || meta_url;
      navigator.clipboard.writeText(shareUrl);

      child.innerText = child.dataset.copiedText;
      setTimeout(function () {
        child.innerText = initialText.trim();
      }, 4000);
      return false;
    });
  }

  let btnModalClose = document.querySelector(".sws-modal-close");
  if (btnModalClose) {
    btnModalClose.addEventListener("click", function (e) {
      e.preventDefault();
      swsModal("hide");
      return false;
    });
  }

  document.querySelectorAll(".sws-open-in-tab").forEach(function (item) {
    item.addEventListener("click", function (ev) {
      ev.preventDefault();
      let moreD = this.getAttribute("data-params") || "";
      let type = this.getAttribute("data-type") || "";
      const link = swsGenerateUrl(window.superWebShareData, this.dataset.link) + encodeURI(moreD);

      if ("whatsapp" == type) {
        window.open(link);
      } else {
        window.open(link, null, "height=500,width=500");
      }
      return false;
    });
  });
});
const swsModal = (action = "show") => {
  let modal = document.querySelector(".sws-modal-bg");
  if (!modal) return;
  if (action == "hide") {
    modal.style.display = "none";
  } else {
    modal.style.display = "flex";
  }
};
function swsGenerateUrl(params, string) {
  params.nl = "\n\r";
  for (let i in params) {
    string = string.replaceAll(`{${i}}`, encodeURI(params[i]));
  }
  return string;
}
