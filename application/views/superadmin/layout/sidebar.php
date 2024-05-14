<div class="side-menu">
	<div class='side-menu-body'>
		<ul>
			<li class="side-menu-divider m-t-0"></li>
			<li class="<?php echo ($active == 1 ? 'open':'')?>">
				<a href="<?php echo base_url() ?>superadmin/administrator">
					<i class="icon fa fa-tachometer"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="side-menu-divider m-t-10">Pages</li>
			<li class="<?php echo ($act == 2.2 ? 'open':'')?>">
				<a href="<?php echo base_url() ?>superadmin/administrator/homebanner">
					<i class="icon fa fa-file-image-o"></i>
					<span>Home Banner</span>
				</a>
			</li>
			<li class="<?php echo ($act == 2.1 ? 'open':'')?>">
				<a href="<?php echo base_url() ?>superadmin/administrator/banner">
					<i class="icon fa fa-image"></i>
					<span>Banner</span>
				</a>
			</li>
			<li class="<?php echo ($active == 3 ? 'open':'')?>">
				<a href="<?php echo base_url() ?>superadmin/administrator/clientele">
					<i class="icon fa fa-user-circle-o"></i>
					<span>Clientele</span>
				</a>
			</li>
<!--			<li class="--><?php //echo ($active == 4 ? 'open':'')?><!--">-->
<!--				<a href="--><?php //echo base_url() ?><!--superadmin/administrator/counter">-->
<!--					<i class="icon ti-layout-grid2-thumb"></i>-->
<!--					<span>Counter</span>-->
<!--				</a>-->
<!--			</li>-->
			<li class="<?php echo ($active == 6 ? 'open':'')?>">
				<a href="#">
					<i class="icon ti-list-ol"></i><span>Blogs Master</span>
				</a>
				<ul>
					<li><a class="<?php echo ($act == 6.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/BlogsCategory">Blogs Category</a></li>
					<li><a class="<?php echo ($act == 6.2 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/Blogs">Blogs Lists</a></li>
				</ul>
			</li>
            <li class="<?php echo ($active == 7 ? 'open':'')?>">
                <a href="#">
                    <i class="icon ti-agenda"></i><span>Case Studies Master</span>
                </a>
                <ul>
                    <li><a class="<?php echo ($act == 7.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/CasestudiesCategory">Case Studies Category</a></li>
                    <li><a class="<?php echo ($act == 7.2 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/Case_studies">Case Studies Lists</a></li>
                </ul>
            </li>
            <li><a class="<?php echo ($act == 8.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/newsroom"> <i class="icon ti-notepad"></i> Manage Newsroom</a></li>
			<li class="<?php echo ($active == 9 ? 'open':'')?>">
				<a href="#">
					<i class="icon ti-blackboard"></i><span>Webinar Master</span>
				</a>
				<ul>
					<li><a class="<?php echo ($act == 9.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/speakers">Speakers</a></li>
					<li><a class="<?php echo ($act == 9.2 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/webinars">Webinars</a></li>
				</ul>
			</li>
			<li><a class="<?php echo ($act == 10.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/gst_notification"> <i class="icon ti-volume"></i> Manage GST Notification</a></li>
			<li class="<?php echo ($active == 11 ? 'open':'')?>">
				<a href="#">
					<i class="icon ti-archive"></i><span>Investors Master</span>
				</a>
				<ul>
					<li><a class="<?php echo ($act == 11.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/investors_category">Investors Category</a></li>
					<li><a class="<?php echo ($act == 11.2 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/investors">Investors List</a></li>
				</ul>
			</li>
			<li class="<?php echo ($active == 12 ? 'open':'')?>">
				<a href="#">
					<i class="icon ti-briefcase"></i><span>Careers Master</span>
				</a>
				<ul>
					<li><a class="<?php echo ($act == 12.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/careers_department">Careers Department</a></li>
					<li><a class="<?php echo ($act == 12.2 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/careers">Careers</a></li>
				</ul>
			</li>
			<li class="<?php echo ($active == 13 ? 'open':'')?>">
				<a href="#">
					<i class="icon ti-layout-accordion-list"></i><span>FAQ Master</span>
				</a>
				<ul>
					<li><a class="<?php echo ($act == 13.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/faqs_category">FAQ Category</a></li>
					<li><a class="<?php echo ($act == 13.2 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/faqs">FAQ List</a></li>
				</ul>
			</li>
			<li class="<?php echo ($active == 14 ? 'open':'')?>">
				<a href="#">
					<i class="icon ti-gallery"></i><span>Ricoh</span>
				</a>
				<ul>
					<li><a class="<?php echo ($act == 14.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/ricoh_master">Form (help you) Master</a></li>
					<li><a class="<?php echo ($act == 14.2 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/ricoh_slider">Ricoh Slider</a></li>
				</ul>
			</li>
			<li class="<?php echo ($active == 15 ? 'open':'')?>">
				<a href="#">
					<i class="icon ti-layout-grid2"></i><span>Offers</span>
				</a>
				<ul>
					<li><a class="<?php echo ($act == 15.1 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/offers_categories">Offers Categories</a></li>
					<li><a class="<?php echo ($act == 15.2 ? 'active':'')?>" href="<?php echo base_url() ?>superadmin/administrator/offers">Offers</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- end::side menu -->
