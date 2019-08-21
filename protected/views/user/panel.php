
<?php 
	$users = array("edmond Musiitwa", "katula Eric", "Astute patience")
?>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
            <div class="middle-content">
                    <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                                    </ul>
                                </div>
                                <span class="card-title">Option One</span>
                                <small>
                                    Option Card One
                                </small>
                                
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                        <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                                    </ul>
                                </div>
                                <span class="card-title">Option Two</span>
                                <small>
                                    Option Card Two
                                </small>

                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                        <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                                    </ul>
                                </div>
                                <span class="card-title">Option Three</span>
                                <small>
                                    Option Card Three
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l8">
                        <div class="card visitors-card">
                            <div class="card-content">
                                <div class="card-options">
                                    <ul>
                                        <li><a href="javascript:void(0)" class="card-refresh"><i class="material-icons">refresh</i></a></li>
                                    </ul>
                                    </div>
                                        <span class="card-title">Business Panel<span class="secondary-title">Business details</span></span>
                                        
                                    </div>
                                        </div>
                                        </div>
                            <div class="col s12 m12 l4">
                                <div class="card server-card">
                                    <div class="card-content">
                                        <span class="card-title">More Options</span>
                                        This  is the card content

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="inner-sidebar">
                    <span class="inner-sidebar-title">Reserved Space</span>
                    <div class="message-list">
					<?php 
						foreach($users as $user){
							?>
							 <div class="info-item message-item">
								<img class="circle" src="assets/images/profile-image-2.png" alt="">
								<div class="message-info"><div class="message-author"><?php echo $user?></div>
								<small>Invited</small>
								</div>
							</div>
							<?php
						}
					?>
                   
                    <span class="inner-sidebar-title">More</span>
                    <span class="info-item">test<span class="new badge">12</span></span>
                    <div class="inner-sidebar-divider"></div>
                    <span class="info-item">test</span>
                    <div class="inner-sidebar-divider"></div>
                    <span class="info-item disabled">click to schedule events</span>
                    <div class="inner-sidebar-divider"></div>
                    
                   
                </div>        
    </body>


<script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="assets/plugins/materialize/js/materialize.min.js"></script>
<script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="assets/plugins/chart.js/chart.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="assets/plugins/curvedlines/curvedLines.js"></script>
<script src="assets/plugins/peity/jquery.peity.min.js"></script>

<script src="assets/js/pages/dashboard.js"></script>
        