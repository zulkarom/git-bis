<div class="tab-pane show active" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
                        <!-- Start chats content -->
                        <div>
                            <div class="px-4 pt-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-4">Consultants</h4>
                                    </div>
                                    
                                </div>
                                <form>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control bg-light border-0 pe-0" id="serachChatUser" onkeyup="searchUser()" placeholder="Search here.." 
                                        aria-label="Example text with button addon" aria-describedby="searchbtn-addon" autocomplete="off">
                                        <button class="btn btn-light" type="button" id="searchbtn-addon"><i class='bx bx-search align-middle'></i></button>
                                    </div>
                                </form>

                            </div> <!-- .p-4 -->

                            <div class="chat-room-list" data-simplebar>
                                <!-- Start chat-message-list -->
                                <h5 class="mb-3 px-4 mt-4 font-size-11 text-muted text-uppercase">My Consultants</h5>

                                <div class="chat-message-list">
            
                                    <ul class="list-unstyled chat-list chat-user-list" id="favourite-users">
                                    </ul>
                                </div>

                

                           

                                <!-- End chat-message-list -->
                            </div>

                        </div>
                        <!-- Start chats content -->

                    </div>