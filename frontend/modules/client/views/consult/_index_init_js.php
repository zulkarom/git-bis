<?php 
use yii\helpers\Url;

?>
<script type="text/javascript">

var input, filter, ul, li, a, i, j, div;
var url = '<?php echo Url::to(["/"]);?>';
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
            });
    }
    function e(e, t) {
        var a = new XMLHttpRequest();
        a.open("GET", s + e, !0),
            (a.responseType = "json"),
            (a.onload = function () {
                var e = a.status;
                t(200 === e ? null : e, a.response);
            }),
            a.send();
    }
    function u() {
	
        "users" == o
            ? ((document.getElementById("channel-chat").style.display = "none"), (document.getElementById("users-chat").style.display = "block"))
            : ((document.getElementById("channel-chat").style.display = "block"), (document.getElementById("users-chat").style.display = "none")),
            q(s + "chats.json");
    }
    e("users.json", function (e, t) {
        null !== e
            ? console.log("Something went wrong: " + e)
            : t[0].favorites.forEach(function (e, t) {
                  var a = e.profile
                          ? '<img src="' + url + e.profile + '" class="rounded-circle avatar-xs" alt=""><span class="user-status"></span>'
                          : '<div class="avatar-xs"><span class="avatar-title rounded-circle bg-primary text-white"><span class="username">JP</span><span class="user-status"></span></span></div>',
                      s = e.messagecount ? '<div class="ms-auto"><span class="badge badge-soft-dark rounded p-1">' + e.messagecount + "</span></div>" : "",
                      r = e.messagecount ? '<a href="javascript: void(0);" class="unread-msg-user">' : '<a href="javascript: void(0);">',
                      i = 1 === e.id ? "active" : "";
                  document.getElementById("favourite-users").innerHTML +=
                      '<li id="contact-id-' +
                      e.id +
                      '" data-name="favorite" class="' +
                      i +
                      '">                  ' +
                      r +
                      '                       <div class="d-flex align-items-center">                          <div class="chat-user-img online align-self-center me-2 ms-0">                              ' +
                      a +
                      '                          </div>                          <div class="overflow-hidden">                              <p class="text-truncate mb-0">' +
                      e.name +
                      "</p>                          </div>                          " +
                      s +
                      "                      </div>                  </a>              </li>";
              }),
            a(),
            document.querySelectorAll("#favourite-users li, #usersList li") &&
                document.querySelectorAll("#favourite-users li, #usersList li").forEach(function (i) {
                    i.addEventListener("click", function (e) {
                        (o = "users"), u(), (n = "users-chat");
                        var t = i.getAttribute("id"),
                            a = i.querySelector(".text-truncate").innerHTML;
                        (document.querySelector(".user-profile-sidebar .user-name").innerHTML = a),
                            (document.getElementById("users-chat").querySelector(".text-truncate .user-profile-show").innerHTML = a),
                            (document.querySelector(".user-profile-desc .text-truncate").innerHTML = a),
                            (document.querySelector(".audiocallModal .text-truncate").innerHTML = a),
                            (document.querySelector(".videocallModal .text-truncate").innerHTML = a);
                        var s = document.getElementById(t).querySelector(".avatar-xs").getAttribute("src");
                        s
                            ? (document.querySelector(".user-own-img .avatar-sm").setAttribute("src", s),
                              document.querySelector(".user-profile-sidebar .profile-img").setAttribute("src", s),
                              document.querySelector(".audiocallModal .img-thumbnail").setAttribute("src", s),
                              document.querySelector(".videocallModal .videocallModal-bg").setAttribute("src", s))
                            : (document.querySelector(".user-own-img .avatar-sm").setAttribute("src", l),
                              document.querySelector(".user-profile-sidebar .profile-img").setAttribute("src", l),
                              document.querySelector(".audiocallModal .img-thumbnail").setAttribute("src", l),
                              document.querySelector(".videocallModal .videocallModal-bg").setAttribute("src", l));
                        var r = i.querySelector(".avatar-xs").getAttribute("src");
                        document
                            .getElementById("users-conversation")
                            .querySelectorAll(".left .chat-avatar")
                            .forEach(function (e) {
                                r ? e.querySelector("img").setAttribute("src", r) : e.querySelector("img").setAttribute("src", l);
                            }),
                            window.stop();
                    });
                }),
            document.querySelectorAll("#channelList li").forEach(function (r) {
                r.addEventListener("click", function (e) {
                    (n = "channel-chat"), (o = "channel"), u();
                    var t = r.getAttribute("id"),
                        a = r.querySelector(".text-truncate").innerHTML;
                    (document.getElementById("channel-chat").querySelector(".text-truncate .user-profile-show").innerHTML = a),
                        (document.querySelector(".user-profile-desc .text-truncate").innerHTML = a),
                        (document.querySelector(".audiocallModal .text-truncate").innerHTML = a),
                        (document.querySelector(".videocallModal .text-truncate").innerHTML = a),
                        (document.querySelector(".user-profile-sidebar .user-name").innerHTML = a);
                    var s = document.getElementById(t).querySelector(".avatar-xs").getAttribute("src");
                    s
                        ? (document.querySelector(".user-own-img .avatar-sm").setAttribute("src", s),
                          document.querySelector(".user-profile-sidebar .profile-img").setAttribute("src", s),
                          document.querySelector(".audiocallModal .img-thumbnail").setAttribute("src", s),
                          document.querySelector(".videocallModal .videocallModal-bg").setAttribute("src", s))
                        : (document.querySelector(".user-own-img .avatar-sm").setAttribute("src", l),
                          document.querySelector(".user-profile-sidebar .profile-img").setAttribute("src", l),
                          document.querySelector(".audiocallModal .img-thumbnail").setAttribute("src", l),
                          document.querySelector(".videocallModal .videocallModal-bg").setAttribute("src", l));
                });
            });
    }),
        
        e("contacts.json", function (e, t) {
            var r, i;
            null !== e
                ? console.log("Something went wrong: " + e)
                : ((c = t).sort(function (e, t) {
                      return e.name.localeCompare(t.name);
                  }),
                  (i = r = ""),
                  c.forEach(function (e, t) {
                      var a = e.profile ? '<img src="' + e.profile + '" class="img-fluid rounded-circle" alt="">' : '<span class="avatar-title rounded-circle bg-primary font-size-10">FP</span>';
                      r =
                          '<li>              <div class="d-flex align-items-center">                  <div class="flex-shrink-0 me-2">                      <div class="avatar-xs">                          ' +
                          a +
                          '                      </div>                  </div>                  <div class="flex-grow-1">                      <h5 class="font-size-14 m-0" >' +
                          e.name +
                          '</h5>                  </div>                  <div class="flex-shrink-0">                      <div class="dropdown">                          <a href="#" class="text-muted dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                              <i class="bx bx-dots-vertical-rounded align-middle"></i>                          </a>                          <div class="dropdown-menu dropdown-menu-end">                              <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>                              <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Block <i class="bx bx-block ms-2 text-muted"></i></a>                              <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Remove <i class="bx bx-trash ms-2 text-muted"></i></a>                          </div>                      </div>                  </div>              </div>          </li>';
                      var s =
                          '<div class="mt-3" >          <div class="contact-list-title">' +
                          e.name.charAt(0).toUpperCase() +
                          '                </div>                <ul id="contact-sort-' +
                          e.name.charAt(0) +
                          '" class="list-unstyled contact-list" >';
                      i != e.name.charAt(0) && (document.getElementsByClassName("sort-contact")[0].innerHTML += s),
                          (document.getElementById("contact-sort-" + e.name.charAt(0)).innerHTML = document.getElementById("contact-sort-" + e.name.charAt(0)).innerHTML + r),
                          (i = e.name.charAt(0));
                  })),
                document.querySelectorAll(".sort-contact ul li").forEach(function (s) {
                    s.addEventListener("click", function (e) {
                        (o = "users"), u();
                        var t = s.querySelector("li .font-size-14").innerHTML;
                        (document.querySelector(".text-truncate .user-profile-show").innerHTML = t),
                            (document.querySelector(".user-profile-desc .text-truncate").innerHTML = t),
                            (document.querySelector(".audiocallModal .text-truncate").innerHTML = t),
                            (document.querySelector(".videocallModal .text-truncate").innerHTML = t),
                            (document.querySelector(".user-profile-sidebar .user-name").innerHTML = t);
                        var a = s.querySelector("li .align-items-center").querySelector(".avatar-xs .rounded-circle").getAttribute("src");
                        a
                            ? (document.querySelector(".user-own-img .avatar-sm").setAttribute("src", a),
                              document.querySelector(".user-profile-sidebar .profile-img").setAttribute("src", a),
                              document.querySelector(".audiocallModal .img-thumbnail").setAttribute("src", a),
                              document.querySelector(".videocallModal .videocallModal-bg").setAttribute("src", a))
                            : (document.querySelector(".user-own-img .avatar-sm").setAttribute("src", l),
                              document.querySelector(".user-profile-sidebar .profile-img").setAttribute("src", l),
                              document.querySelector(".audiocallModal .img-thumbnail").setAttribute("src", l),
                              document.querySelector(".videocallModal .videocallModal-bg").setAttribute("src", l)),
                            document
                                .getElementById("users-conversation")
                                .querySelectorAll(".left .chat-avatar")
                                .forEach(function (e) {
                                    a ? e.querySelector("img").setAttribute("src", a) : e.querySelector("img").setAttribute("src", l);
                                }),
                            window.stop();
                    });
                }),
                a();
        }),
		
		e("topics.json", function (e, t) {
            var r, i;
			var str_topics = "";
            null !== e
                ? console.log("Something went wrong: " + e)
                : (i = r = ""),
                  t.forEach(function (e, t) {
					  console.log(e.consultant);
					  
                     str_topics += '<li><div class="d-flex align-items-center"><div class="flex-shrink-0 avatar-xs ms-1 me-3"><div class="avatar-title bg-soft-primary text-primary rounded-circle"><i class="bx bx-file"></i></div></div><div class="flex-grow-1 overflow-hidden"><h5 class="font-size-14 mb-1"><a href="#" class="text-truncate p-0">';
					 str_topics += e.consultant;
					 str_topics += '</a></h5><p class="text-muted font-size-13 mb-0">';
					 str_topics += e.title;
					 str_topics += '</p></div><span class="badge badge-soft-dark rounded p-1">';
					 str_topics += e.unread;
					 str_topics += '</span><div class="flex-shrink-0 ms-3"><div class="dropdown"><a class="dropdown-toggle font-size-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a><a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a></div></div></div></div></li>';
					 
                  }),
				  document.getElementById("topic-list").innerHTML = str_topics;
        }),
		
        u();
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
    document.querySelector("#profile-foreground-img-file-input").addEventListener("change", function () {
        var e = document.querySelector(".profile-foreground-img"),
            t = document.querySelector(".profile-foreground-img-file-input").files[0],
            a = new FileReader();
        a.addEventListener(function () {
            e.src = a.result;
        }, !1),
            t && a.readAsDataURL(t);
    }),
        document.querySelector("#profile-img-file-input").addEventListener("change", function () {
            var e = document.querySelector(".user-profile-image"),
                t = document.querySelector(".profile-img-file-input").files[0],
                a = new FileReader();
            a.addEventListener(
                "load",
                function () {
                    e.src = a.result;
                },
                !1
            ),
                t && a.readAsDataURL(t);
        });
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
    function q(e) {
		
        var t, a, s;
        (t = e),
            (a = function (e, t) {
                var i, n;
                null !== e
                    ? console.log("Something went wrong: " + e)
                    : ((i = "users" == o ? t[0].chats : t[0].channel_chat), 
                      (document.getElementById(o + "-conversation").innerHTML = ""),
                      (n = 0),
                      i.forEach(function (t, e) {
                          var a, s, r;
                          0 < n
                              ? --n
                              : ((a = t.from_id == d ? " right" : " left"),
                                (s = c.find(function (e) {
                                    return e.id == t.from_id;
                                })),
                                (r = '<li class="chat-list' + a + '" id=' + t.id + '>                        <div class="conversation-list">'),
                                d != t.from_id && (r += '<div class="chat-avatar"><img src="' + url + s.profile + '" alt=""></div>'),
                                (r += '<div class="user-chat-content">'),
                                (r += S(t.id, t.msg, t.has_images, t.has_files, t.has_dropDown)),
                                i[e + 1] &&
                                    t.from_id == i[e + 1].from_id &&
                                    ((n = (function (e, t, a) {
                                        for (var s = 0; e[t] && e[t + 1] && e[t + 1].from_id == a; ) s++, t++;
                                        return s;
                                    })(i, e, t.from_id)),
                                    (r += (function (e, t, a) {
                                        for (var s = 0; e[t] && e[t + 1] && e[t + 1].from_id == a; ) (s = S(e[t + 1].id, e[t + 1].msg, e[t + 1].has_images, e[t + 1].has_files, e[t + 1].has_dropDown)), t++;
                                        return s;
                                    })(i, e, t.from_id))),
                                (r += '<div class="conversation-name"><small class="text-muted time">' + t.datetime + '</small> <span class="text-success check-message-icon"><i class="bx bx-check-double"></i></span></div>'),
                                (r += "</div>                </div>            </li>"),
                                (document.getElementById(o + "-conversation").innerHTML += r));
                      })),
                    v.querySelectorAll(".delete-item").forEach(function (e) {
                        e.addEventListener("click", function () {
                            2 == e.closest(".user-chat-content").childElementCount ? e.closest(".chat-list").remove() : e.closest(".ctext-wrap").remove();
                        });
                    }),
                    y.querySelectorAll(".delete-item").forEach(function (e) {
                        e.addEventListener("click", function () {
                            2 == e.closest(".user-chat-content").childElementCount ? e.closest(".chat-list").remove() : e.closest(".ctext-wrap").remove();
                        });
                    }),
                    v.querySelectorAll(".chat-list").forEach(function (e) {
                        e.querySelectorAll(".delete-image").forEach(function (e) {
                            e.addEventListener("click", function () {
                                1 == e.closest(".message-img").childElementCount ? e.closest(".chat-list").remove() : e.closest(".message-img-list").remove();
                            });
                        });
                    }),
                    v.querySelectorAll(".copy-message").forEach(function (t) {
                        t.addEventListener("click", function () {
                            var e = t.closest(".ctext-wrap").children[0] ? t.closest(".ctext-wrap").children[0].children[0].innerText : "";
                            navigator.clipboard.writeText(e);
                        });
                    }),
                    y.querySelectorAll(".copy-message").forEach(function (t) {
                        t.addEventListener("click", function () {
                            var e = t.closest(".ctext-wrap").children[0] ? t.closest(".ctext-wrap").children[0].children[0].innerText : "";
                            navigator.clipboard.writeText(e);
                        });
                    }),
                    m("users-chat"),
                    GLightbox({ selector: ".popup-img", title: !1 });
            }),
            (s = new XMLHttpRequest()).open("GET", t, !0),
            (s.responseType = "json"),
            (s.onload = function () {
                var e = s.status;
                a(200 === e ? null : e, s.response);
            }),
            s.send();
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