<?php 
use yii\helpers\Url;

?>
<script type="text/javascript">

  $(document).ready(function(){
	  (document.getElementById("channel-chat").style.display = "none");
	  (document.getElementById("users-chat").style.display = "none");
	  $(".chat-input-section").hide();
    getUserList();
	getTopicList();
  });

function getTopicList(){
    $.ajax({
        url: "<?php echo Url::to(['/client/consult-data/get-topics'], true);?>",
        type: 'GET',
        success: function (result) {
          if(result){
            insertTopic(result)
          }
        }
    });
}

function insertTopic(result){
	
var r, i;
var str_topics = "";
i = r = "";
t = result;
  t.forEach(function (e, t) {
	 str_topics += '<li id="contact-id-' + e.cid + '" data-user="' + e.cid + '" data-topic="' + e.id + '"><div class="d-flex align-items-center"><div class="chat-user-img online align-self-center me-2 ms-0">                              <img src="'  + e.profile + '" class="rounded-circle avatar-xs" alt=""><span class="user-status"></span>                          </div><div class="flex-grow-1 overflow-hidden"><h5 class="font-size-14 mb-1"><a href="#" class="text-truncate p-0">';
	 str_topics += e.consultant;
	 str_topics += '</a></h5><p class="topic-text font-size-13 mb-0">';
	 str_topics += e.title;
	 str_topics += '</p></div><span class="badge badge-soft-dark rounded p-1">';
	 str_topics += e.unread;
	 str_topics += '</span><div class="flex-shrink-0 ms-3"><div class="dropdown"><a class="dropdown-toggle font-size-16 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></a><div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a><a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a></div></div></div></div></li>';
	 
  });
  
  document.getElementById("topic-list").innerHTML = str_topics;

  showChatPage();
  clickTopic();
}

function clickTopic(){
	
	showChatPage();
	$("#topic-list li").each(function(x,i){
		$(this).click(function(){
			$(".chat-input-section").show();
			var name =  $(this).find(".text-truncate").text();
			var user = $(this).attr('data-user');
			var topic = $(this).attr('data-topic');
			var topic_text = $(this).find(".topic-text").text();
			var t = $(this).attr('id');
			getChat(user, topic);
			$(document).find(".user-profile-sidebar .user-name").text(name);
			$(document).find(".user-profile-desc .text-truncate").text(name);
			$("#users-chat").find(".text-truncate .user-profile-show").text(name);
			$(document).find(".user-topic-text").text(topic_text);
			
			(document.querySelector(".audiocallModal .text-truncate").innerHTML = a),
				(document.querySelector(".videocallModal .text-truncate").innerHTML = a);
				
			var s = document.getElementById(t).querySelector(".avatar-xs").getAttribute("src");
			document.querySelector(".user-own-img .avatar-sm").setAttribute("src", s);
			document.querySelector(".user-profile-sidebar .profile-img").setAttribute("src", s);
		});
	});
	
}

function getUserList(){

  var userUrl = "<?php echo Url::to(['/client/consult-data/get-list-experts'], true);?>";


    $.ajax({
        url: userUrl,
        type: 'GET',
        success: function (result) {

          //console.log(result);

          if(result){
            insertUsers(result);
          }
        }
    });

}

function insertUsers(result){
	result.forEach(function (e, t) {
		 var a = e.profile
			  ? '<img src="'  + e.profile + '" class="rounded-circle avatar-xs" alt=""><span class="user-status"></span>'
			  : '<div class="avatar-xs"><span class="avatar-title rounded-circle bg-primary text-white"><span class="username">JP</span><span class="user-status"></span></span></div>',
		  s = e.messagecount ? '<div class="ms-auto"><span class="badge badge-soft-dark rounded p-1">' + e.messagecount + "</span></div>" : "",
		  r = e.messagecount ? '<a href="javascript: void(0);" class="unread-msg-user">' : '<a href="javascript: void(0);">',
		  i = 1 === e.id ? "active" : "";
	  document.getElementById("favourite-users").innerHTML +=
		  '<li id="contact-id-' +
		  e.id +
		  '" data-name="favorite" data-user="' + e.id + '" class="' +
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
	 });
	 
	 clickUser();
}

function showChatPage() {
	
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
        })
		
		;
}

function clickUser(){
	
	showChatPage();
	$("#favourite-users li").each(function(x,i){
		$(this).click(function(){
			$(".chat-input-section").show();
			var name =  $(this).find(".text-truncate").text();
			var user = $(this).attr('data-user');
			var t = $(this).attr('id');
			getChat(user);
			$(document).find(".user-profile-sidebar .user-name").text(name);
			$(document).find(".user-profile-desc .text-truncate").text(name);
			$("#users-chat").find(".text-truncate .user-profile-show").text(name);
			$(document).find(".user-topic-text").text('Online');
			
			(document.querySelector(".audiocallModal .text-truncate").innerHTML = a),
				(document.querySelector(".videocallModal .text-truncate").innerHTML = a);
				
			var s = document.getElementById(t).querySelector(".avatar-xs").getAttribute("src");
			document.querySelector(".user-own-img .avatar-sm").setAttribute("src", s);
			document.querySelector(".user-profile-sidebar .profile-img").setAttribute("src", s);
		});
	});
	
}


function getChat(user, topic) {
	document.getElementById("channel-chat").style.display = "none";
	document.getElementById("users-chat").style.display = "block";
		
	if(topic){
		$.ajax({
			url: "<?php echo Url::to(['/client/consult-data/init-chat'], true);?>" + "?user="+user + "&topic=" + topic,
			type: 'GET',
			success: function (data) {
			  insertChat(data);
			}
		});
	}else{
		$.ajax({
			url: "<?php echo Url::to(['/client/consult-data/init-chat'], true);?>" + "?user="+user,
			type: 'GET',
			success: function (data) {
			  insertChat(data)
			}
		});
	}
	
}

function insertChat(t){
	
	var d = 1;
	c=t;
	var i = document.querySelector("#chatinput-form"),
        f = document.querySelector("#chat-input"),
        v = document.querySelector(".chat-conversation-list"),
        g = document.querySelector(".chat-input-feedback");
		
	var o = "users";
	var i, n;
	i = t[0].chats;
	document.getElementById(o + "-conversation").innerHTML = "";
		  n = 0;
		  i.forEach(function (t, e) {
			  var a, s, r;
			  0 < n
				  ? --n
				  : ((a = t.from_id == d ? " right" : " left"),
					(s = c.find(function (e) {
						return e.id == t.from_id;
					})),
					(r = '<li class="chat-list' + a + '" id=' + t.id + '>                        <div class="conversation-list">'),
					d != t.from_id && (r += '<div class="chat-avatar"><img src="'  + s.profile + '" alt=""></div>'),
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
		  });
            
}

function S(e, t, a, s, r) {
	h = 0;
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

</script>