<?php 
use yii\helpers\Url;

?>
<script type="text/javascript">

var input, filter, ul, li, a, i, j, div;
var url = '<?php echo Url::to(["/"], true);?>';
function searchUser() {
    for (input = document.getElementById("serachChatUser"), filter = input.value.toUpperCase(), ul = document.querySelector(".chat-room-list"), li = ul.getElementsByTagName("li"), i = 0; i < li.length; i++) {
        -1 < li[i].querySelector("p").innerText.toUpperCase().indexOf(filter) ? (li[i].style.display = "") : (li[i].style.display = "none");
    }
}
function searchContacts() {
    for (
        input = document.getElementById("searchContact"),
            filter = input.value.toUpperCase(),
            list = document.querySelector(".sort-contact"),
            li = list.querySelectorAll(".mt-3 li"),
            div = list.querySelectorAll(".mt-3 .contact-list-title"),
            j = 0;
        j < div.length;
        j++
    ) {
        var e = div[j];
        (txtValue = e.innerText), -1 < txtValue.toUpperCase().indexOf(filter) ? (div[j].style.display = "") : (div[j].style.display = "none");
    }
    for (i = 0; i < li.length; i++) (contactName = li[i]), (txtValue = contactName.querySelector("h5").innerText), -1 < txtValue.toUpperCase().indexOf(filter) ? (li[i].style.display = "") : (li[i].style.display = "none");
}
function searchContactOnModal() {
    for (
        input = document.getElementById("searchContactModal"),
            filter = input.value.toUpperCase(),
            list = document.querySelector(".contact-modal-list"),
            li = list.querySelectorAll(".mt-3 li"),
            div = list.querySelectorAll(".mt-3 .contact-list-title"),
            j = 0;
        j < div.length;
        j++
    ) {
        var e = div[j];
        (txtValue = e.innerText), -1 < txtValue.toUpperCase().indexOf(filter) ? (div[j].style.display = "") : (div[j].style.display = "none");
    }
    for (i = 0; i < li.length; i++) (contactName = li[i]), (txtValue = contactName.querySelector("h5").innerText), -1 < txtValue.toUpperCase().indexOf(filter) ? (li[i].style.display = "") : (li[i].style.display = "none");
}
!(function () {
    var n = "users-chat",
        l = "chat/images/users/user-dummy-img.jpg",
        o = "users",
        s = url + "chat/js/dir/",
        c = "",
		users = s + "users.json",
		topics = s + "topics.json",
		chats = s + "chats.json",
		//users = "<?php echo Url::to(['/client/consult-data/get-list-experts'], true);?>",
		//topics = "<?php echo Url::to(['/client/consult-data/get-topics'], true);?>",
		//chats = "",
        d = 1;
    function a() {
        var a = document.getElementsByClassName("user-chat");
        document.querySelectorAll(".chat-user-list li a").forEach(function (e) {
            e.addEventListener("click", function (e) {
                a.forEach(function (e) {
                    e.classList.add("user-chat-show");
                });
                var t = document.querySelector(".chat-user-list li.active");
                t && t.classList.remove("active"), this.parentNode.classList.add("active");
            });
        }), 
		
		document.querySelectorAll(".chat-topic-list li").forEach(function (e) {
            e.addEventListener("click", function (e) {
                a.forEach(function (e) {
                    e.classList.add("user-chat-show");
                });
                var t = document.querySelector(".chat-topic-list li.active");
                t && t.classList.remove("active"), this.classList.add("active");
            });
        }), 
		
            document.querySelectorAll(".sort-contact ul li").forEach(function (e) {
                e.addEventListener("click", function (e) {
                    a.forEach(function (e) {
                        e.classList.add("user-chat-show");
                    });
                });
            }),
            document.querySelectorAll(".user-chat-remove").forEach(function (e) {
                e.addEventListener("click", function (e) {
                    a.forEach(function (e) {
                        e.classList.remove("user-chat-show");
                    });
                });
            })
			;
    }
    function e(e, t) {
        var a = new XMLHttpRequest();
        a.open("GET",  e, !0),
            (a.responseType = "json"),
            (a.onload = function () {
                var e = a.status;
                t(200 === e ? null : e, a.response);
            }),
            a.send();
    }
    var t = document.querySelector(".user-profile-sidebar");
    document.querySelectorAll(".user-profile-show").forEach(function (e) {
        e.addEventListener("click", function (e) {
            t.classList.toggle("d-block");
        });
    }),
        window.addEventListener("DOMContentLoaded", function () {
            var e = document.querySelector("#chat-conversation .simplebar-content-wrapper");
            e.scrollTop = e.scrollHeight;
        });
    var r = document.getElementById("chatinputmorecollapse");
    function m(e) {
        var t = document.getElementById(e).querySelector("#chat-conversation .simplebar-content-wrapper"),
            a = document.getElementsByClassName("chat-conversation-list")[0] ? document.getElementById(e).getElementsByClassName("chat-conversation-list")[0].scrollHeight - window.innerHeight + 250 : 0;
        a && t.scrollTo({ top: a, behavior: "smooth" });
    }
    document.body.addEventListener("click", function () {
        new bootstrap.Collapse(r, { toggle: !1 }).hide();
    }),
        r &&
            r.addEventListener("shown.bs.collapse", function () {
                new Swiper(".chatinput-links", { slidesPerView: 3, spaceBetween: 30, breakpoints: { 768: { slidesPerView: 4 }, 1024: { slidesPerView: 6 } } });
            }),
        document.querySelectorAll(".contact-modal-list .contact-list li").forEach(function (e) {
            e.addEventListener("click", function () {
                e.classList.toggle("selected");
            });
        }),
        document.querySelectorAll(".theme-img , .theme-color").forEach(function (e) {
            e.addEventListener("click", function (e) {
                var t,
                    a,
                    s = document.querySelector("input[name=bgcolor-radio]:checked");
                s &&
                    ((s = s.id),
                    (t = document.getElementsByClassName(s)) &&
                        ((a = window.getComputedStyle(t[0], null).getPropertyValue("background-color")),
                        (document.querySelector(".user-chat-overlay").style.background = a),
                        (rgbColor = a.substring(a.indexOf("(") + 1, a.indexOf(")"))),
                        document.documentElement.style.setProperty("--bs-primary-rgb", rgbColor)));
                var r,
                    i,
                    n = document.querySelector("input[name=bgimg-radio]:checked");
                n && ((n = n.id), (r = document.getElementsByClassName(n)), t && ((i = window.getComputedStyle(r[0], null).getPropertyValue("background-image")), (document.querySelector(".user-chat").style.backgroundImage = i)));
            });
        });
    var i = document.querySelector("#chatinput-form"),
        f = document.querySelector("#chat-input"),
        v = document.querySelector(".chat-conversation-list"),
        g = document.querySelector(".chat-input-feedback");
    function p() {
        var e = 12 <= new Date().getHours() ? "pm" : "am",
            t = 12 < new Date().getHours() ? new Date().getHours() % 12 : new Date().getHours(),
            a = new Date().getMinutes() < 10 ? "0" + new Date().getMinutes() : new Date().getMinutes();
        return t < 10 ? "0" + t + ":" + a + " " + e : t + ":" + a + " " + e;
    }
    setInterval(p, 1e3);
    var h = 0;
    i &&
        i.addEventListener("submit", function (e) {
            e.preventDefault();
            var t = n,
                a = f.value;
            0 === a.length
                ? (g.classList.add("show"),
                  setTimeout(function () {
                      g.classList.remove("show");
                  }, 3e3))
                : ((function (e, t) {
                      h++;
                      var a = document.getElementById(e).querySelector(".chat-conversation-list");
                      a.insertAdjacentHTML(
                          "beforeend",
                          '<li class="chat-list right" id="chat-list-' +
                              h +
                              '" >                <div class="conversation-list">                    <div class="user-chat-content">                        <div class="ctext-wrap">                            <div class="ctext-wrap-content">                                <p class="mb-0 ctext-content">                                    ' +
                              t +
                              '                                </p>                            </div>                            <div class="dropdown align-self-start message-box-drop">                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                    <i class="ri-more-2-fill"></i>                                </a>                                <div class="dropdown-menu">                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target=".replyCollapse">Reply <i class="bx bx-share ms-2 text-muted"></i></a>                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#" data-bs-toggle="modal" data-bs-target=".forwardModal">Forward <i class="bx bx-share-alt ms-2 text-muted"></i></a>                                    <a class="dropdown-item d-flex align-items-center justify-content-between copy-message" href="#" id="copy-message-' +
                              h +
                              '">Copy <i class="bx bx-copy text-muted ms-2"></i></a>                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Mark as Unread <i class="bx bx-message-error text-muted ms-2"></i></a>                                    <a class="dropdown-item d-flex align-items-center justify-content-between delete-item" id="delete-item-' +
                              h +
                              '" href="#">Delete <i class="bx bx-trash text-muted ms-2"></i></a>                            </div>                        </div>                    </div>                    <div class="conversation-name">                        <small class="text-muted time">' +
                              p() +
                              '</small>                        <span class="text-success check-message-icon"><i class="bx bx-check"></i></span>                    </div>                </div>            </div>        </li>'
                      );
                      var s = document.getElementById("chat-list-" + h);
                      s.querySelectorAll(".delete-item").forEach(function (e) {
                          e.addEventListener("click", function () {
                              a.removeChild(s);
                          });
                      }),
                          s.querySelectorAll(".copy-message").forEach(function (e) {
                              e.addEventListener("click", function () {
                                  s.childNodes[1].children[1].firstElementChild.firstElementChild.getAttribute("id");
                                  (isText = s.childNodes[1].children[1].firstElementChild.firstElementChild.innerText), navigator.clipboard.writeText(isText);
                              });
                          });
                  })(t, a),
                  m(t)),
                (f.value = "");
        });
    var y = document.querySelector("#channel-conversation");
    for (var b = document.getElementsByClassName("favourite-btn"), x = 0; x < b.length; x++) {
        var w = b[x];
        w.onclick = function () {
            w.classList.toggle("active");
        };
    }
    new FgEmojiPicker({ trigger: [".emoji-btn"], removeOnSelection: !1, closeButton: !0, position: ["top", "right"], preFetch: !0, dir: url + "chat/js/dir/json", insertInto: document.querySelector(".chat-input") });
    function S(e, t, a, s, r) {
        var i = '<div class="ctext-wrap">';
        if (null != t) i += '<div class="ctext-wrap-content" id=' + e + '><p class="mb-0 ctext-content">' + t + "</p></div>";
        else if (a && 0 < a.length) {
            for (i += '<div class="message-img mb-0">', x = 0; x < a.length; x++)
                i +=
                    '<div class="message-img-list">                <div>                    <a class="popup-img d-inline-block" href="' +
                    a[x] +
                    '">                        <img src="' + url +
                    a[x] +
                    '" alt="" class="rounded border">                    </a>                </div>                <div class="message-img-link">                <ul class="list-inline mb-0">                    <li class="list-inline-item dropdown">                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                            <i class="bx bx-dots-horizontal-rounded"></i>                        </a>                        <div class="dropdown-menu">                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Download <i class="bx bx-download ms-2 text-muted"></i></a>                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target=".replyCollapse">Reply <i class="bx bx-share ms-2 text-muted"></i></a>                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#" data-bs-toggle="modal" data-bs-target=".forwardModal">Forward <i class="bx bx-share-alt ms-2 text-muted"></i></a>                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>                            <a class="dropdown-item d-flex align-items-center justify-content-between delete-image" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>                        </div>                    </li>                </ul>                </div>            </div>';
            i += "</div>";
        } else
            0 < s.length &&
                (i +=
                    '<div class="ctext-wrap-content">            <div class="p-3 border-primary border rounded-3">            <div class="d-flex align-items-center attached-file">                <div class="flex-shrink-0 avatar-sm me-3 ms-0 attached-file-avatar">                    <div class="avatar-title bg-soft-primary text-primary rounded-circle font-size-20">                        <i class="ri-attachment-2"></i>                    </div>                </div>                <div class="flex-grow-1 overflow-hidden">                    <div class="text-start">                        <h5 class="font-size-14 mb-1">design-phase-1-approved.pdf</h5>                        <p class="text-muted text-truncate font-size-13 mb-0">12.5 MB</p>                    </div>                </div>                <div class="flex-shrink-0 ms-4">                    <div class="d-flex gap-2 font-size-20 d-flex align-items-start">                        <div>                            <a href="#" class="text-muted">                                <i class="bx bxs-download"></i>                            </a>                        </div>                    </div>                </div>            </div>            </div>        </div>');
        return (
            !0 === r &&
                (i +=
                    '<div class="dropdown align-self-start message-box-drop">                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    <i class="ri-more-2-fill"></i>                </a>                <div class="dropdown-menu">                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#" data-bs-toggle="collapse" data-bs-target=".replyCollapse">Reply <i class="bx bx-share ms-2 text-muted"></i></a>                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#" data-bs-toggle="modal" data-bs-target=".forwardModal">Forward <i class="bx bx-share-alt ms-2 text-muted"></i></a>                    <a class="dropdown-item d-flex align-items-center justify-content-between copy-message" href="#" id="copy-message-' +
                    h +
                    '">Copy <i class="bx bx-copy text-muted ms-2"></i></a>                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Mark as Unread <i class="bx bx-message-error text-muted ms-2"></i></a>                    <a class="dropdown-item d-flex align-items-center justify-content-between delete-item" href="#">Delete <i class="bx bx-trash text-muted ms-2"></i></a>                </div>            </div>'),
            (i += "</div>")
        );
    }
    
    document.getElementById("emoji-btn").addEventListener("click", function () {
        setTimeout(function () {
            var e,
                t = document.getElementsByClassName("fg-emoji-picker")[0];
            !t || ((e = window.getComputedStyle(t) ? window.getComputedStyle(t).getPropertyValue("left") : "") && ((e = (e = e.replace("px", "")) - 40 + "px"), (t.style.left = e)));
        }, 0);
    });
})();


</script>