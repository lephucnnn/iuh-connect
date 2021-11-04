<section id="main-content">
    <section class='wrapper'>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card chat-app">
                        <div id="plist" class="people-list">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                            <ul class="list-unstyled chat-list mt-2 mb-0" id="listUserToChat" style="height:500px; overflow-y: scroll">
                                <!-- show danh sach user -->
                            </ul>
                        </div>
                        <div class="chat" style="min-height: 500px">
                            <div class="chat-header clearfix">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="chat-about" id="infoUserToChat">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-history" id="frameChat" onscroll="stopScroll()" style="display:none">
                                <ul class="m-b-0" id="showMessage">
                                    <!-- show tin nhắn -->
                                    
                                    <!-- // -->
                                </ul>
                            </div>
                            <div class="chat-message clearfix" id="divSend" style="display:none">
                                <div class="input-group mb-0">
                                    <div class="input-group-prepend">
                                        <!-- nút gửi -->
                                        <button type="button" id='sendMessage' class="input-group-text"><i class="fa fa-send"></i></button>
                                    </div>
                                    <!-- nhập message -->
                                    <input type="text" id='message' class="form-control"  placeholder="Enter text here...">                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <div class="footer">
	        <div class="wthree-copyright">
		    <p>© 2021 Hệ thống liên lạc trực tuyến IUH | Design by <a href="">IUH-Connect</a></p>
	        </div>
        </div>
</section>