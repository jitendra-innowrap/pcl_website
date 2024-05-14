<?php
$CI =& get_instance();
// Case Studies list -------------------
$CI->db->limit(2);
$CI->db->select('c.slug,c.title,c.image_small,c.image_alt');
$CI->db->where(array('cc.status'=> 1, 'c.status' => 1));
$CI->db->order_by('c.case_date','desc');
$CI->db->join('casestudies_category cc','cc.id = c.case_s_id','left');
$query = $CI->db->get("case_studies c");
$casestudies_menu = $query->result();
// Blogs list -------------------
$CI->db->limit(4);
$CI->db->select('b.slug,b.title,b.image_small');
$CI->db->where(array('bc.status'=> 1, 'b.status' => 1));
$CI->db->order_by('b.blog_date','desc');
$CI->db->join('blog_category bc','bc.id = b.blog_cat_id','left');
$query = $CI->db->get("blogs b");
$blogs = $query->result();
// GST Notification list -------------------
$CI->db->limit(2);
$CI->db->select('g.slug,g.title,g.image_small,g.route_url,g.is_url_route');
$CI->db->where(array('g.status' => 1));
$CI->db->order_by('g.notification_date','desc');
$query = $CI->db->get("gst_notification g");
$gst = $query->result();
// Webinar List------------------------------------
//Upcoming ----------
$CI->db->select('w.slug,w.title,w.image_small');
$CI->db->limit(2);
$CI->db->where(array('w.status' => 1, 'w.date >' => date('Y-m-d')));
$CI->db->order_by('w.date','desc');
$query = $CI->db->get("webinar w");
$webinars_upcoming = $query->result();
//Recent ---------------
$CI->db->select('w.slug,w.title,w.image_small');
$CI->db->limit(2);
$CI->db->where(array('w.status' => 1, 'w.date <' => date('Y-m-d')));
$CI->db->order_by('w.date','desc');
$query = $CI->db->get("webinar w");
$webinars_list = $query->result();
// Faqs ---------------
$CI->db->select('f.name,f.id');
$CI->db->limit(8);
$CI->db->where(array('f.status' => 1));
$CI->db->order_by('f.order_no', 'asc');
$query = $CI->db->get("faq_category f");
$faqlists = $query->result();
?>

<div class="atomic-common-style">
    <div class="">
        <div class="js-contact-nav-bar T(0) Pos(a) Z(9) W(100%) H(34px) D(b)--md D(n) Bgc($color-white)">
			<div class="Maw(1200px) Mx(a) Px(20px) D(f)--md Jc(fe) Bxz(cb)">
				<ul class="Px(0) M(0) List(n) D(n) D(f)--md Jc(fe) Pt(16px) Fz($font-size-12)">
                    <!--					<li class="Px(10px)">-->
                    <!--						<a href="javascript:;"-->
                    <!--						   class="Td(n) Td(u):h Tt(u) Fw($font-weight-medium) pricing-page_Fw($font-weight-regular) pricing-page_C($color-blue) pricing-page_Fz($font-size-22)--lg pricing-page_Fz($font-size-18)  header-top-theme-dark_C($color-white) C($color-new-font-dark) hide-purchase-btn_C($color-blue) hide-purchase-btn_Fz($font-size-22)  vwo-phone-number phone-ROW">About Us</a>-->
                    <!--					</li>-->
					<li class="Px(10px)">
						<a href="<?php echo base_url('offers'); ?>"
						   class="js-contact-us-btn Td(n) Td(u):h Tt(u) Fw($font-weight-medium) header-top-theme-dark_C($color-white) C($color-new-font-dark) blink">Offers</a>
					</li>
                    <li class="Px(10px) BdStart Bdstartc($color-dark-grey)">
                        <a data-modal="modal-contact-us" href="<?php echo base_url('careers'); ?>"
                           class="js-contact-us-btn Td(n) Td(u):h Tt(u) Fw($font-weight-medium) header-top-theme-dark_C($color-white) C($color-new-font-dark)">Careers</a>
                    </li>
                    <li class="Px(10px) BdStart Bdstartc($color-dark-grey)">
                        <a href="<?php echo base_url('investors'); ?>"
                           class="js-contact-us-btn Td(n) Td(u):h Tt(u) Fw($font-weight-medium) header-top-theme-dark_C($color-white) C($color-new-font-dark)">Investors</a>
                    </li>
                    <li class="Px(10px) BdStart Bdstartc($color-dark-grey)">
                        <a href="<?php echo base_url('newsroom'); ?>"
                           class="js-contact-us-btn Td(n) Td(u):h Tt(u) Fw($font-weight-medium) header-top-theme-dark_C($color-white) C($color-new-font-dark)">Newsroom</a>
                    </li>
                    <li class="Px(10px) BdStart Bdstartc($color-dark-grey)">
                        <a href="<?php echo base_url('contact-us'); ?>"
                           class="js-contact-us-btn Td(n) Td(u):h Tt(u) Fw($font-weight-medium) header-top-theme-dark_C($color-white) C($color-new-font-dark)">Contact
                            Us</a>
                    </li>
					<li class="Px(10px) BdStart Bdstartc($color-dark-grey)">
						<a target="_blank" href="https://services.wepworld.com:8443/mpspayment/index1.jsp"
						   class="js-contact-us-btn Td(n) Td(u):h Tt(u) Fw($font-weight-medium) header-top-theme-dark_C($color-white) C($color-new-font-dark)">Make Payment</a>
					</li>
                </ul>

            </div>
        </div>

		<div class="js-main-nav-bar Pos(a) Z(9) W(100%) Py(10px) T(34px)--md T(0) Cnt(noq)::a Z(-1)::a Bxsh($box-shadow-navigation-bottom)::a D(b)::a Pos(a)::a W(100%)::a T(0)::a B(0)::a Start(0)::a End(0)::a Op(0)::a TranslateY(-100px)::a main-nav-bar--home Bgc($color-white)">
			<header class="Maw(1200px) Mx(a) Px(20px) D(f) Fxd(c) Jc(sb) Bxz(cb)">
				<!-- Wep Digital Main Navigation -->
				<div
						class="js-header-menu-overlay Pos(f) Start(0) End(0) B(0) Z(1) T(65px) T(110px)--md Op(0.4) W(100%) Bgc($color-black)  D(n)">
				</div>

				<!-- Breadcrumb Overlay -->
				<div
						class="js-breadcrumb-menu-overlay Pos(f) Start(0) End(0) B(0) Z(1) T(65px) T(70px)--md Op(0.4) W(100%) Bgc($color-black)  D(n)">
				</div>
				<!-- End Breadcrumb Overlay -->
				<div class="D(f) Ai(c) Jc(sb) Jc(fs)--md Py(10px) Py(0)--md">
                    <a class="Mend(30px) Td(n) mt-lg--14" href="<?php echo base_url(); ?>">
                        <img loading="eager" src="<?php echo base_url('assets/images/wep-logo-64.png'); ?>"
                             class="header-top-theme-dark_D(n) Top-fixed-logo" alt="Wep Logo">
                        <img loading="eager" src="<?php echo base_url('assets/images/wep-logo-75.png'); ?>"
                             class="header-top-theme-dark_D(n) N-Top-Fixed-logo" alt="Wep Logo">
                    </a>
                    <div class="Flxg(1)--md D(f) Ai(c)">
                        <div class="D(f) Jc(sb) Ai(c) Flxg(1)">
                            <nav
                                    class="js-header-menu-content Pos(s)--md Pos(f) Z($mobile-nav-zindex) Bxsh($box-shadow-navigation-top) Bxsh(n)--md Trs($easeTransition) TranslateX(100%) Trf($none)--md Mstart(a)--xs Mstart(0)--md BdStart--xs Bdstartc($color-grey-border)--xs Bd(n)--md W(a)--xs W(100%) Bgc($color-white) Bgc(t)--md End(0) B(0) Ovy(a) Ovy(v)--md T(100%)--md T(65px)">
                                <ul class="js-main-navigation P(0) M(0) List(n) D(f) Fld(c) Fld(r)--md Ai(c)--md">
                                    <li class="js-header-dropdown-trigger Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md SaaS-product-dropdown">
                                        <button type="button" class="js-header-dropdown open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                            <span class="Mend(4px)">SaaS</span>
                                            <svg width="8px" height="5px" class="D(n)  Fxs(0) D(i)--md">
                                                <use xlink:href="#icon-chevron-down"></use>
                                            </svg>
                                            <svg width="9" height="9" class="C($color-red) D(n)--md D(i) Fxs(0)">
                                                <use xlink:href="#icon-arrow-right"></use>
                                            </svg>
                                        </button>

                                        <!-- Product Dropdown -->
                                        <div class="js-header-dropdown-content js-dropdown-content open-dropdown+D(b)--md Mt(-10px)--md D(n)--md open-dropdown+TranslateX(0) Trs($easeTransition) TranslateX(100%) Trf($none)--md  Pos(a)--md Pos(f) Z(2) Start(0) B(0) B(a)--md End(0) Ovy(a) T(100%)--md T(65px) Maw(800px)  Mstart(a)--xs Mstart(0)--md W(a)--xs W(100%) Bgc($color-white) Bxz(bb) Py(40px)--md P(0) Bxsh($box-shadow-navigation-bottom) saas-product">
                                            <button type="button"
                                                    class="js-mobile-product-button-inside D(n)--md D(b) Mx(0) Mt(0) Mb(20px) Pos(st) T(0) Z(1) Bgc($color-white) W(100%) C(#8d97a5) Py(16px) Px(16px) Ta(start) Fw($font-weight-bold) BdB Bdbc(#d9dde1) Fz(12px) Tt(u) Cur(p) W(100%) Bxz(bb)">
                                                <svg width="9px" height="9px" class="Rotate(180deg) Mend(10px)">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
												SaaS
                                            </button>
                                            <div class="Maw(1200px) Mx(a) Px(20px) Bxz(cb)">
                                                <ul
                                                        class="P(0) M(0) List(n) D(f) Ai(fs) Wow(bw) Fld(r)--md Fld(c) js-product-dropdown-menus">
                                                    <li
                                                            class="W(2/12)--lg Mb(40px) Mb(0)--md Px(10px) Bxz(bb) Fxg(1)">
                                                        <a href="javascript:"
                                                           class="product-item-hover D(f) Ai(c) Td(n) Fw($font-weight-medium) C($color-new-font-dark)  C($color-black):h Fz($font-size-14) Pb(10px)">
                                                            <img width="20" height="20"
                                                                 src="<?php echo base_url(); ?>assets/images/icon/Softwares For Enterprises.svg"
                                                                 alt="Softwares For Enterprises" loading="lazy"
                                                                 class="Mend(10px)">
                                                            <span class="Mend(10px)">Enterprise Solutions</span>
                                                        </a>
                                                        <ul class="List(n) P(0) Mt(4px) Mb(0) Pend(0)--md">
															<li>
																<a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)"
																   href="<?php echo base_url('document-management-services'); ?>">
																	<img width="20" height="20"
																		 src="<?php echo base_url(); ?>assets/images/header-icon/dms-grey.svg"
																		 loading="lazy"
																		 class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
																		 alt="Document Management System">
																	<img width="20" height="20"
																		 src="<?php echo base_url(); ?>assets/images/header-icon/dms.svg"
																		 loading="lazy"
																		 class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
																		 alt="Document Management System">
																	Document Management
																</a>
															</li>
															<li>
																<a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)"
																   href="<?php echo base_url('workflow-automation-software'); ?>">
																	<img width="20" height="20"
																		 src="<?php echo base_url(); ?>assets/images/header-icon/workflow-grey.svg"
																		 loading="lazy"
																		 class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
																		 alt="Workflow Automation">
																	<img width="20" height="20"
																		 src="<?php echo base_url(); ?>assets/images/header-icon/workflow.svg"
																		 loading="lazy"
																		 class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
																		 alt="Workflow Automation">
																	Workflow Automation
																</a>
															</li>
                                                            <li>
                                                                <a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)" href="<?php echo base_url('employee-records-management-system'); ?>">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/icon/erm-gray.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
                                                                         alt="Employee records management">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/icon/erm-color.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
                                                                         alt="Employee records management">
                                                                    Employee records management
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)"
                                                                   href="<?php echo base_url('management-of-change-process'); ?>">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/header-icon/moc-gray.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
                                                                         alt="Management of Change">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/header-icon/moc.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
                                                                         alt="Management of Change">
                                                                    Management of Change
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)"
                                                                   href="<?php echo base_url('procurement-to-pay'); ?>">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/header-icon/pay-automation-gray.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
                                                                         alt="Procurement to pay">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/header-icon/pay-automation.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
                                                                         alt="Procure to pay">
                                                                    Procure to pay
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li
                                                            class="W(2/12)--lg Mb(40px) Mb(0)--md Px(10px) Bxz(bb) Fxg(1)">
                                                        <a href="javascript:"
                                                           class="product-item-hover D(f) Ai(c) Td(n) Fw($font-weight-medium) C($color-new-font-dark) C($color-black):h Fz($font-size-14) Pb(10px)">
                                                            <img width="20" height="20"
                                                                 src="<?php echo base_url(); ?>assets/images/header-icon/Goods & Service Tax Software.svg"
                                                                 alt="Goods and Service Tax software" loading="lazy"
                                                                 class="Mend(10px)">
                                                            <span class="Mend(10px)">Goods and Services Tax Solutions</span>
                                                        </a>
                                                        <ul class="List(n) P(0) Mt(4px) Mb(0) Pend(0)--md">
                                                            <li>
                                                                <a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)"
                                                                   href="<?php echo base_url('best-gst-platform-for-return-filing');?>">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/header-icon/gst-grey.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
                                                                         alt="WeP GST">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/header-icon/gst.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
                                                                         alt="WeP GST">
                                                                    WeP GST Solution
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)" href="<?php echo base_url('einvoice-software'); ?>">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/header-icon/EWB-Einvoice1.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
                                                                         alt="EWB/Einvoice">
                                                                    <img width="20" height="20"
                                                                         src="<?php echo base_url(); ?>assets/images/header-icon/EWB-Einvoice.svg"
                                                                         loading="lazy"
                                                                         class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
                                                                         alt="eWay Bill/eInvoice">
                                                                    e-Way Bill/e-Invoice
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Product Dropdown -->
                                    </li>
                                    <li class="js-header-dropdown-trigger Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md">

                                        <button type="button"
                                                class="js-header-dropdown open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                            <span class="Mend(4px)">Services</span>
                                            <svg width="8px" height="5px" class="D(n)  Fxs(0) D(i)--md">
                                                <use xlink:href="#icon-chevron-down"></use>
                                            </svg>
                                            <svg width="9" height="9" class="C($color-red) D(n)--md D(i) Fxs(0)">
                                                <use xlink:href="#icon-arrow-right"></use>
                                            </svg>
                                        </button>

                                        <!-- Product Dropdown -->
                                        <div class="js-header-dropdown-content js-dropdown-content open-dropdown+D(b)--md Mt(-10px)--md D(n)--md open-dropdown+TranslateX(0) Trs($easeTransition) TranslateX(100%) Trf($none)--md  Pos(a)--md Pos(f) Z(2) Start(0) B(0) B(a)--md End(0) Ovy(a) T(100%)--md T(65px)  Maw(480px)--xs Maw(n)--md Mstart(a)--xs Mstart(0)--md W(a)--xs W(100%) Bgc($color-white) Bxz(bb) Py(20px)--md P(0) Bxsh($box-shadow-navigation-bottom) Maw(800px)">
                                            <button type="button"
                                                    class="js-mobile-product-button-inside D(n)--md D(b) Mx(0) Mt(0) Mb(20px) Pos(st) T(0) Z(1) Bgc($color-white) W(100%) C(#8d97a5) Py(16px) Px(20px) Ta(start) Fw($font-weight-bold) BdB Bdbc(#d9dde1) Fz(12px) Tt(u) Cur(p) W(100%) Bxz(bb)">
                                                <svg width="9px" height="9px" class="Rotate(180deg) Mend(10px)">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
												Services
                                            </button>
                                            <div class="Maw(1200px) Mx(a) Px(20px) Bxz(cb)">
                                                <ul class="P(0) M(0) List(n) D(f) Ai(fs) Wow(bw) Fld(r)--md Fld(c) js-product-dropdown-menus">
                                                    <li class="W(2/12)--lg Mb(0) Mb(0)--md Px(10px) Bxz(bb) Fxg(1)">
                                                        <a href="<?php echo base_url('managed-print-services'); ?>"
                                                           class="product-item-hover D(f) Ai(c) Td(n) Fw($font-weight-medium) C($color-new-font-dark) C($color-purple):h Fz($font-size-14) Pb(10px)">
                                                            <img width="20" height="20"
                                                                 src="<?php echo base_url(); ?>assets/images/icon/Managed Print Services.svg"
                                                                 alt="Managed Print Services" loading="lazy"
                                                                 class="Mend(10px)">
                                                            <span class="Mend(10px)">Managed Print Services</span>
                                                            <svg class="W(9px) H(9px) Trsp(a) Trsdu(0.1s) Trstf(l) product-item-hover:h_TranslateX(5px) breadcrumb-hide-arrow_D(n)">
                                                                <use xlink:href="#icon-arrow-right"></use>
                                                            </svg>
                                                        </a>
                                                        <ul class="List(n) P(0) Mt(4px) Mb(0) Pend(0)--md">
<!--                                                            <li>-->
<!--                                                                <a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)"-->
<!--                                                                   href="javascript:;">-->
<!--                                                                    <img width="20" height="20"-->
<!--                                                                         src="--><?php //echo base_url(); ?><!--assets/images/header-icon/APSS.svg"-->
<!--                                                                         loading="lazy"-->
<!--                                                                         class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"-->
<!--                                                                         alt="APSS">-->
<!--                                                                    <img width="20" height="20"-->
<!--                                                                         src="--><?php //echo base_url(); ?><!--assets/images/header-icon/APSS-1.svg"-->
<!--                                                                         loading="lazy"-->
<!--                                                                         class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"-->
<!--                                                                         alt="APSS">-->
<!--                                                                    APSS-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)"-->
<!--                                                                   href="javascript:;">-->
<!--                                                                    <img width="20" height="20"-->
<!--                                                                         src="--><?php //echo base_url(); ?><!--assets/images/header-icon/FSS1.svg"-->
<!--                                                                         loading="lazy"-->
<!--                                                                         class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"-->
<!--                                                                         alt="FSS">-->
<!--                                                                    <img width="20" height="20"-->
<!--                                                                         src="--><?php //echo base_url(); ?><!--assets/images/header-icon/FSS.svg"-->
<!--                                                                         loading="lazy"-->
<!--                                                                         class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"-->
<!--                                                                         alt="FSS">-->
<!--                                                                    FSS-->
<!--                                                                </a>-->
<!--                                                            </li>-->
<!--                                                            <li>-->
<!--                                                                <a class="feature-item Td(n) D(f) Ai(fs) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)"-->
<!--                                                                   href="--><?php //echo base_url('managed-print-services'); ?><!--">-->
<!--                                                                    <img width="20" height="20"-->
<!--                                                                         src="--><?php //echo base_url(); ?><!--assets/images/header-icon/Secure Printing1.svg"-->
<!--                                                                         loading="lazy"-->
<!--                                                                         class="Mend(10px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"-->
<!--                                                                         alt="Split URL Test Icon">-->
<!--                                                                    <img width="20" height="20"-->
<!--                                                                         src="--><?php //echo base_url(); ?><!--assets/images/header-icon/Secure Printing-1.svg"-->
<!--                                                                         loading="lazy"-->
<!--                                                                         class="Mend(10px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"-->
<!--                                                                         alt="Split URL Test Icon">-->
<!--                                                                    Secure Printing-->
<!--                                                                </a>-->
<!--                                                            </li>-->
                                                        </ul>
                                                    </li>
                                                    <li class="W(2/12)--lg Mb(0) Mb(0)--md Px(10px) Bxz(bb) Fxg(1)">
                                                        <a href="<?php echo base_url('monthly-gst-returns-gst-reports');?>"
                                                           class="product-item-hover D(f) Ai(c) Td(n) Fw($font-weight-medium) C($color-new-font-dark) C($color-purple):h Fz($font-size-14) Pb(10px)">
                                                            <img width="20" height="20"
                                                                 src="<?php echo base_url(); ?>assets/images/icon/Managed GST Filling.svg"
                                                                 alt="Managed GST Filing Services" loading="lazy"
                                                                 class="Mend(10px)">
                                                            <span class="Mend(10px)">Managed GST Filing Services </span>
                                                            <svg
                                                                    class="W(9px) H(9px) Trsp(a) Trsdu(0.1s) Trstf(l) product-item-hover:h_TranslateX(5px) breadcrumb-hide-arrow_D(n)">
                                                                <use xlink:href="#icon-arrow-right"></use>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Product Dropdown -->
                                    </li>
                                    <li class="Pos(r) js-header-dropdown-trigger Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md">
                                        <button type="button"
                                                class="js-header-dropdown open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(20px)--lg Px(10px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                            <span class="Mend(4px)">PaaS</span>
                                            <svg width="8px" height="5px" class="D(n)  Fxs(0) D(i)--md">
                                                <use xlink:href="#icon-chevron-down"></use>
                                            </svg>
                                            <svg width="9" height="9" class="C($color-red) D(n)--md D(i) Fxs(0)">
                                                <use xlink:href="#icon-arrow-right"></use>
                                            </svg>
                                        </button>
                                        <div class="js-header-dropdown-content js-dropdown-content open-dropdown+D(b)--md D(n)--md open-dropdown+TranslateX(0) Trs($easeTransition) TranslateX(100%) Trf($none)--md  Pos(a)--md Pos(f) Z(2) Start(0) End(0) End(a)--md B(0) B(a)--md Ovy(a) Ovy(v)--md T(100%)--md T(65px) Miw(302px)--md  Maw(480px)--xs Maw(n)--md Mstart(a)--xs Mstart(0)--md W(a)--xs W(100%) Bgc($color-white) Bxz(bb) Bxsh($box-shadow-navigation-bottom) Bdrs(3px) Bgc($color-white) Bxz(bb) Bxsh($box-shadow-black) Cnt(noq)::b D(ib)::b Bdw(10px)::b Bdc(t)::b Bds(s)::b Bdbc(#fff)::b Pos(a)::b T(-20px)::b Start(40px)::b Z(2)::b Cnt(noq)::a D(ib)::a Bdw(12px)::a Bdc(t)::a Bds(s)::a Bdbc(#000)::a Pos(a)::a Op(0.03)::a T(-24px)::a Start(38px)::a Z(1)::a">
                                            <button type="button" class="js-mobile-product-button-inside D(n)--md D(b) Mx(0) Mt(0) Mb(10px) Pos(st) T(0) Z(1) Bgc($color-white) W(100%) C(#8d97a5) Py(16px) Px(20px) Ta(start) Fw($font-weight-bold) BdB Bdbc(#d9dde1) Fz(12px) Tt(u) Cur(p) W(100%) Bxz(bb)">
                                                <svg width="9px" height="9px" class="Rotate(180deg) Mend(10px)">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
                                                PaaS
                                            </button>
                                            <ul class="P(10px) List(n)">
                                                <li>
                                                    <a class="D(f) Ai(c) Bxz(bb) Td(n) P(10px) W(100%) Bdrs(4px) Bgc($color-light-grey-1):h C($color-purple):h C($color-new-font-dark) C($color-purple):h Fz($font-size-14) Fw($font-weight-medium)"
                                                       href="<?php echo base_url('low-code-development');?>">
                                                        <svg id="Low_code_dev" data-name="Low code dev"
                                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" class="Fxs(0) Mend(16px)">
                                                            <rect id="Rectangle_248" data-name="Rectangle 248"
                                                                  width="24" height="24" fill="none"/>
                                                            <circle id="Ellipse_15" data-name="Ellipse 15" cx="0.75"
                                                                    cy="0.75" r="0.75" transform="translate(11.25 2.75)"
                                                                    fill="none"/>
                                                            <circle id="Ellipse_16" data-name="Ellipse 16" cx="0.75"
                                                                    cy="0.75" r="0.75" transform="translate(11.25 2.75)"
                                                                    fill="none"/>
                                                            <circle id="Ellipse_17" data-name="Ellipse 17" cx="0.75"
                                                                    cy="0.75" r="0.75" transform="translate(11.25 2.75)"
                                                                    fill="none"/>
                                                            <path id="Path_364" data-name="Path 364"
                                                                  d="M17.8,2.85H13.933a2.764,2.764,0,0,0-5.217,0H4.85a1.62,1.62,0,0,0-.37.037,1.869,1.869,0,0,0-1.332,1.1A1.782,1.782,0,0,0,3,4.7V17.65a1.9,1.9,0,0,0,.148.721,1.96,1.96,0,0,0,.4.592,1.857,1.857,0,0,0,.934.509,2.4,2.4,0,0,0,.37.028H17.8a1.855,1.855,0,0,0,1.85-1.85V4.7A1.855,1.855,0,0,0,17.8,2.85ZM10.4,13.182,9.1,14.5,5.775,11.175,9.1,7.854l1.3,1.314L8.393,11.175Zm.925-9.176a.694.694,0,1,1,.694-.694A.7.7,0,0,1,11.325,4.006ZM13.554,14.5l-1.3-1.314,2.007-2.007L12.25,9.168l1.3-1.314,3.321,3.321Z"
                                                                  transform="translate(0.675 1.75)" fill="#d9261c"/>
                                                        </svg>

                                                        <span>Low Code Development</span><br>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md">
                                        <a class="open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)"
                                           href="<?php echo base_url('ricoh'); ?>">Ricoh Products</a>
                                    </li>
									<li class="Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md">
										<a target="_blank" class="open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)"
										   href="https://wepmyshop.com/">Billing Solutions</a>
									</li>
                                    <li class="js-header-dropdown-trigger Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md">
                                        <button type="button"
                                                class="js-header-dropdown open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                            <span class="Mend(4px)">Resources</span>
                                            <svg width="8px" height="5px" class="D(n)  Fxs(0) D(i)--md">
                                                <use xlink:href="#icon-chevron-down"></use>
                                            </svg>
                                            <svg width="9" height="9" class="C($color-red) D(n)--md D(i) Fxs(0)">
                                                <use xlink:href="#icon-arrow-right"></use>
                                            </svg>
                                        </button>

                                        <!-- Resources Dropdown -->
                                        <div
                                                class="js-header-dropdown-content js-dropdown-content open-dropdown+D(b)--md Mt(-10px)--md D(n)--md open-dropdown+TranslateX(0) Trs($easeTransition) TranslateX(100%) Trf($none)--md  Pos(a)--md Pos(f) Z(2) Start(0) B(0) B(a)--md End(0) Ovy(a) T(100%)--md T(65px)  Maw(480px)--xs Maw(n)--md Mstart(a)--xs Mstart(0)--md W(a)--xs W(100%) Bgi($gradient-learn-menu)--md Bgc($color-white) Bxsh($box-shadow-navigation-bottom) Bxz(bb)">
                                            <button type="button"
                                                    class="js-mobile-product-button-inside D(n)--md D(b) Mx(0) My(0) Pos(st) T(0) Z(1) Bgc($color-white) W(100%) C(#8d97a5) Py(16px) Px(20px) Ta(start) Fw($font-weight-bold) BdB Bdbc(#d9dde1) Fz(12px) Tt(u) Cur(p) W(100%) Bxz(bb)">
                                                <svg width="9px" height="9px" class="Rotate(180deg) Mend(10px)"
                                                     version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
                                                Resources
                                            </button>
                                            <div class="Maw(1200px) Mx(a) Px(20px)--md Px(0) Bxz(cb)">
                                                <div class="D(f)--md js-tabs">
                                                    <div class="W(3/12) Py(30px) Bxz(bb) Bgc(#f8f9fd) Bdendw(1px) Bdends(s) Bdendc($color-grey-border-1) D(n) D(b)--md">
                                                        <ul data-active-class="active-tab"
                                                            class="List(n) P(0) M(0) js-tabs-nav">
                                                            <li>
                                                                <button type="button" data-tab="js-resource-library"
                                                                        class="active-tab C($color-new-font-dark) C($color-purple):h Fz(14px) Fw($font-weight-medium) Tt(c) Ta(start) Td(n) Py(14px) Px(20px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bdrststart(6px) Bdrsbstart(6px) Bdendw(0) Bdstartw(1px) Bdtw(1px) Bdbw(1px) Bds(s) Bdc(t) W(100%) Cur(p) M(0) Lh(inh) Pos(r) Start(1px)">
                                                                    Library
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" data-tab="js-mastering-cro"
                                                                        class="C($color-new-font-dark) C($color-purple):h Fz(14px) Fw($font-weight-medium) Tt(c) Ta(start) Td(n) Py(14px) Px(20px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bdrststart(6px) Bdrsbstart(6px) Bdendw(0) Bdstartw(1px) Bdtw(1px) Bdbw(1px) Bds(s) Bdc(t) W(100%) Cur(p) M(0) Lh(inh) Pos(r) Start(1px)">
                                                                    Webinar
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button"
                                                                        data-tab="js-blog"
                                                                        class="C($color-new-font-dark) C($color-purple):h Fz(14px) Fw($font-weight-medium) Tt(c) Ta(start) Td(n) Py(14px) Px(20px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bdrststart(6px) Bdrsbstart(6px) Bdendw(0) Bdstartw(1px) Bdtw(1px) Bdbw(1px) Bds(s) Bdc(t) W(100%) Cur(p) M(0) Lh(inh) Pos(r) Start(1px)">
                                                                    Blogs
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" data-tab="js-faq"
                                                                        class="C($color-new-font-dark) C($color-purple):h Fz(14px) Fw($font-weight-medium) Tt(c) Ta(start) Td(n) Py(14px) Px(20px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bdrststart(6px) Bdrsbstart(6px) Bdendw(0) Bdstartw(1px) Bdtw(1px) Bdbw(1px) Bds(s) Bdc(t) W(100%) Cur(p) M(0) Lh(inh) Pos(r) Start(1px)">
                                                                    FAQ
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                            class="W(9/12)--md Py(40px)--md Px(50px)--md Bgc($color-white) Bxz(bb)">
                                                        <div class="Bd(n)--md BdB Bdbc(#d9dde1)">
                                                            <button type="button"
                                                                    class="D(n)--md  js-accordion open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-bold) Td(n) Py(16px) Px(20px)--lg Px(10px)--sm Px(20px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                                                <span>Library</span>
                                                                <svg width="13px" height="8px"
                                                                     class="C(#4285f4) Rotate(270deg)">
                                                                    <use xlink:href="#icon-chevron-down"></use>
                                                                </svg>
                                                            </button>
                                                            <div id="js-resource-library"
                                                                 class="D(b)--md D(n) js-tabs-content js-open-accordion+D(b)">
                                                                <div
                                                                        class="D(f)--md Px(0)--md Px(20px) Ai(fs) Mb(25px)">

                                                                    <div
                                                                            class="W(5/12)--md Mend(40px)--md D(f) Fld(c) Jc(sb) Fxs(0) Bxz(bb) Mb(40px) Mb(0)--md">
                                                                        <h4 class="Mt(0) Mb(20px) Tt(u) Fz(14px)">
                                                                            Case studies</h4>
                                                                        <div>
																			<?php foreach ($casestudies_menu as $casestudy){?>
                                                                            <div class=" Mb(20px)">
                                                                                <a href="<?php echo base_url('case-studies/'.$casestudy->slug); ?>"
                                                                                   class="Td(n) D(f) Ai(fs) C($color-new-font-dark) C($color-purple):h Fz(14px)--md">
                                                                                    <div class="W(60px) H(60px) Ov(h) D(f) Ai(c) Jc(c) Mend(16px) Flxs(0) Bgc(#f8f8fd)">
                                                                                        <img class="D(b) Maw(100%) H(a)"
                                                                                             src="<?php echo base_url($casestudy->image_small);?>"
                                                                                             alt="<?php echo $casestudy->image_alt;?>">
                                                                                    </div>
                                                                                    <p class="M(0)"><?php echo $casestudy->title;?></p>
                                                                                </a>
                                                                            </div>
																			<?php }?>
                                                                            <a href="<?php echo base_url('case-studies'); ?>"
                                                                               class="C($color-purple) Fz(12px) Tt(u) Td(n) Fw($font-weight-medium)">
                                                                                <span>View all Case studies</span>
                                                                                <svg width="9px" height="9px">
                                                                                    <use
                                                                                            xlink:href="#icon-arrow-right">
                                                                                    </use>
                                                                                </svg>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="W(5/12)--md Mend(40px)--md D(f) Fld(c) Jc(sb) Fxs(0) Bxz(bb) Mb(40px) Mb(0)--md">
                                                                        <h4 class="Mt(0) Mb(20px) Tt(u) Fz(14px)">
                                                                            GST Notification</h4>
                                                                        <div>
																			<?php foreach ($gst as $items){?>
                                                                            <div class=" Mb(20px)">
                                                                                <a href="<?php echo ($items->is_url_route == 1 ? $items->route_url : base_url('gst-notification/'.$items->slug));?>"  class="Td(n) D(f) Ai(fs) C($color-new-font-dark) C($color-purple):h Fz(14px)--md">
                                                                                    <div class="W(60px) H(60px) Ov(h) D(f) Ai(c) Jc(c) Mend(16px) Flxs(0) Bgc(#f8f8fd)">
                                                                                        <img class="D(b) Maw(100%) H(a)"
                                                                                             src="<?php echo base_url($items->image_small);?>"
                                                                                             alt="Cart Abandonment Guide">
                                                                                    </div>
                                                                                    <p class="M(0)"><?php echo $items->title;?></p>
                                                                                </a>
                                                                            </div>
																			<?php }?>
                                                                            <a href="<?php echo base_url('gst-notification'); ?>"
                                                                               class="C($color-purple) Fz(12px) Tt(u) Td(n) Fw($font-weight-medium)">
                                                                                <span>View all GST Notification</span>
                                                                                <svg width="9px" height="9px">
                                                                                    <use
                                                                                            xlink:href="#icon-arrow-right">
                                                                                    </use>
                                                                                </svg>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="Bd(n)--md BdB Bdbc(#d9dde1)">
                                                            <button type="button"
                                                                    class="D(n)--md js-accordion   open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-bold) Td(n) Py(16px) Px(20px)--lg Px(10px)--sm Px(20px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                                                <span>Blogs</span>
                                                                <svg width="13px" height="8px"
                                                                     class="C(#4285f4) Rotate(270deg)">
                                                                    <use xlink:href="#icon-chevron-down"></use>
                                                                </svg>
                                                            </button>
                                                            <div id="js-blog"
                                                                 class="D(n) js-tabs-content js-open-accordion+D(b)">
                                                                <h4 class="Mb(20px) Mt(0)--md Mt(20px) Tt(u) Fz(14px) Px(0)--md Px(20px)">
                                                                    Latest Blogs</h4>
                                                                <div class="D(f)--md Fxf(w) Px(0)--md Px(20px) My(20px) My(0)--md">
																	<?php foreach ($blogs as $blog){?>
																	<div class="W(5/12)--md Mend(40px)--md Fxs(0) Bxz(bb) Mb(40px) Mb(0)--md">
																		<div class="Mb(20px)">
																			<a href="<?php echo base_url('blogs/'.$blog->slug); ?>"
																			   class="Td(n) D(f) Ai(fs) C($color-new-font-dark) C($color-purple):h Fz(14px)--md">
																				<div class="W(60px) H(60px) Ov(h) D(f) Ai(c) Jc(c) Mend(16px) Flxs(0) Bgc(#f8f8fd)"> <img class="D(b)" src="<?php echo base_url($blog->image_small);?>" alt="<?php echo $blog->title;?>">
																				</div>
																				<p class="M(0)"><?php echo $blog->title;?></p>
																			</a>
																		</div>
																	</div>
																	<?php }?>
                                                                </div>
                                                                <a href="<?php echo base_url('blogs'); ?>"
                                                                   class="C($color-purple) Fz(12px) Tt(u) Td(n) Fw($font-weight-medium) Px(20px) Px(0)--md Mb(20px) Mb(0)--md D(ib)">
                                                                    <span>View all blogs</span>
                                                                    <svg width="9px" height="9px">
                                                                        <use xlink:href="#icon-arrow-right"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="Bd(n)--md BdB Bdbc(#d9dde1)">
                                                            <button type="button"
                                                                    class="D(n)--md js-accordion open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-bold) Td(n) Py(16px) Px(20px)--lg Px(10px)--sm Px(20px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                                                <span>Webinars</span>
                                                                <svg width="13px" height="8px"
                                                                     class="C(#4285f4) Rotate(270deg)">
                                                                    <use xlink:href="#icon-chevron-down"></use>
                                                                </svg>
                                                            </button>
                                                            <div id="js-mastering-cro" class="D(n) js-tabs-content js-open-accordion+D(b)">
																<div class="D(f)--md Px(0)--md Px(20px) Ai(fs) Mb(25px)">
																<?php if ($webinars_upcoming){?>
																	<div class="W(5/12)--md Mend(40px)--md D(f) Fld(c) Jc(sb) Fxs(0) Bxz(bb) Mb(40px) Mb(0)--md">
																		<h4 class="Mt(0) Mb(20px) Tt(u) Fz(14px)">
																			Upcoming webinars</h4>
																		<div>
																			<?php foreach ($webinars_upcoming as $webinars){?>
																				<div class="Mb(20px)">
																					<a href="<?php echo base_url('webinars/'.$webinars->slug); ?>"
																					   class="feature-item Td(n) D(f) Ai(c) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)">
																						<img loading="lazy"
																							 class="D(ib) W(60px) Flxs(0) Mend(16px)"
																							 src="<?php echo $webinars->image_small != ''? base_url($webinars->image_small) : 'https://via.placeholder.com/90/000000/FFFFFF/?text=Webinar';?>"
																							 alt="<?php echo $webinars->title;?>"/>
																						<?php echo $webinars->title;?>
																					</a>
																				</div>
																			<?php }?>
																		</div>
																	</div>
																	<?php }?>
																	<div class="W(5/12)--md Mend(40px)--md D(f) Fld(c) Jc(sb) Fxs(0) Bxz(bb) Mb(40px) Mb(0)--md">
																		<h4 class="Mt(0) Mb(20px) Tt(u) Fz(14px)">
																			Recent webinars</h4>
																		<div>
																			<?php foreach ($webinars_list as $webinar){?>
																				<div class="Mb(20px)">
																					<a href="<?php echo base_url('webinars/'.$webinar->slug); ?>"
																					   class="feature-item Td(n) D(f) Ai(c) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)">
																						<img loading="lazy"
																							 class="D(ib) W(60px) Flxs(0) Mend(16px)"
																							 src="<?php echo $webinar->image_small != ''? base_url($webinar->image_small) : 'https://via.placeholder.com/90/000000/FFFFFF/?text=WB';?>"
																							 alt="<?php echo $webinar->title;?>"/>
																						<?php echo $webinar->title;?>
																					</a>
																				</div>
																			<?php }?>
																		</div>
																	</div>
																</div>
                                                                <a href="<?php echo base_url('webinars'); ?>"
                                                                   class="C($color-purple) Fz(12px) Tt(u) Td(n) Fw($font-weight-medium) Px(20px) Px(0)--md Mb(20px) Mb(0)--md D(ib)">
                                                                    <span>View all webinars</span>
                                                                    <svg width="9px" height="9px">
                                                                        <use xlink:href="#icon-arrow-right"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="Bd(n)--md BdB Bdbc(#d9dde1)">
                                                            <button type="button"
                                                                    class="D(n)--md js-accordion open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-bold) Td(n) Py(16px) Px(20px)--lg Px(10px)--sm Px(20px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                                                <span>FAQ</span>
                                                                <svg width="13px" height="8px"
                                                                     class="C(#4285f4) Rotate(270deg)">
                                                                    <use xlink:href="#icon-chevron-down"></use>
                                                                </svg>
                                                            </button>
                                                            <div id="js-faq"
                                                                 class="D(n) js-tabs-content js-open-accordion+D(b)">
                                                                <div class="row Px(0)--md Px(20px) My(20px) My(0)--md">
																	<?php foreach ($faqlists as $faq){?>
                                                                    <div class="col-md-5 Mend(40px)--md Bxz(bb) Mb(40px)--md Mb(10px)">
                                                                        <div class="Mb(20px)--md Mb(0)">
                                                                            <a href="<?php echo base_url('faq#'.url_title(strtolower($faq->name),'-')); ?>"
                                                                               class="feature-item Td(n) D(f) Ai(c) Py(4px) C($color-new-font-dark) C($color-purple):h Fz($font-size-14)">
																				<?php echo $faq->name;?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
																	<?php }?>
                                                                </div>
                                                                <a href="<?php echo base_url('faq'); ?>"
                                                                   class="C($color-purple) Fz(12px) Tt(u) Td(n) Fw($font-weight-medium) Px(20px) Px(0)--md Mb(20px) Mb(0)--md D(ib)">
                                                                    <span>View all faq</span>
                                                                    <svg width="9px" height="9px">
                                                                        <use xlink:href="#icon-arrow-right"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Resources Dropdown -->
                                    </li>
                                    <li class="Pos(r) js-header-dropdown-trigger Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md">
                                        <button type="button"
                                                class="js-header-dropdown open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)">
                                            <span class="Mend(4px)">About Us</span>
                                            <svg width="8px" height="5px" class="D(n)  Fxs(0) D(i)--md">
                                                <use xlink:href="#icon-chevron-down"></use>
                                            </svg>
                                            <svg width="9" height="9" class="C($color-red) D(n)--md D(i) Fxs(0)">
                                                <use xlink:href="#icon-arrow-right"></use>
                                            </svg>
                                        </button>
                                        <div class="js-header-dropdown-content js-dropdown-content open-dropdown+D(b)--md D(n)--md open-dropdown+TranslateX(0) Trs($easeTransition) TranslateX(100%) Trf($none)--md  Pos(a)--md Pos(f) Z(2) Start(0) End(0) End(a)--md B(0) B(a)--md Ovy(a) Ovy(v)--md T(100%)--md T(65px) Miw(250px)--md Maw(n)--md Mstart(a)--xs Mstart(0)--md W(a)--xs W(100%) Bgc($color-white) Bxz(bb) Bxsh($box-shadow-navigation-bottom) Bdrs(3px) Bgc($color-white) Bxz(bb) Bxsh($box-shadow-black) Cnt(noq)::b D(ib)::b Bdw(10px)::b Bdc(t)::b Bds(s)::b Bdbc(#fff)::b Pos(a)::b T(-20px)::b Start(40px)::b Z(2)::b Cnt(noq)::a D(ib)::a Bdw(12px)::a Bdc(t)::a Bds(s)::a Bdbc(#000)::a Pos(a)::a Op(0.03)::a T(-24px)::a Start(38px)::a Z(1)::a">
                                            <button type="button"
                                                    class="js-mobile-product-button-inside D(n)--md D(b) Mx(0) Mt(0) Mb(10px) Pos(st) T(0) Z(1) Bgc($color-white) W(100%) C(#8d97a5) Py(16px) Px(20px) Ta(start) Fw($font-weight-bold) BdB Bdbc(#d9dde1) Fz(12px) Tt(u) Cur(p) W(100%) Bxz(bb)">
                                                <svg width="9px" height="9px" class="Rotate(180deg) Mend(10px)">
                                                    <use xlink:href="#icon-arrow-right"></use>
                                                </svg>
                                                About Us
                                            </button>
                                            <ul class="P(10px) List(n)">
                                                <li>
                                                    <a class="D(f) Ai(c) Bxz(bb) Td(n) P(10px) W(100%) Bdrs(4px) Bgc($color-light-grey-1):h C($color-purple):h C($color-new-font-dark) C($color-purple):h Fz($font-size-14) Fw($font-weight-medium)"
                                                       href="<?php echo base_url('leadership'); ?>">
                                                        <svg id="wep_Leadership" data-name="wep Leadership"
                                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" class="Fxs(0) Mend(16px)">
                                                            <rect id="Rectangle_249" data-name="Rectangle 249"
                                                                  width="24" height="24" fill="none"/>
                                                            <g id="Group_562" data-name="Group 562"
                                                               transform="translate(0.857 0.772)">
                                                                <path id="Path_365" data-name="Path 365"
                                                                      d="M7.028,19.457H2V8.486H7.028ZM13.657,3H8.628V19.457h5.028Zm6.628,7.314H15.257v9.143h5.028Z"
                                                                      fill="#d9261c"/>
                                                            </g>
                                                        </svg>
                                                        <span>WeP Leadership</span><br>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="feature-item D(f) Ai(c) Bxz(bb) Td(n) P(10px) W(100%) Bdrs(4px) Bgc($color-light-grey-1):h C($color-purple):h C($color-new-font-dark) C($color-purple):h Fz($font-size-14) Fw($font-weight-medium)"
                                                       href="<?php echo base_url('our-story'); ?>">
                                                        <img width="20" height="20"
                                                             src="<?php echo base_url(); ?>assets/images/header-icon/Our Stories1.svg"
                                                             loading="lazy"
                                                             class="Mend(16px) Fxs(0) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
                                                             alt="Our Story">
                                                        <img width="20" height="20"
                                                             src="<?php echo base_url(); ?>assets/images/header-icon/Our Stories.svg"
                                                             loading="lazy"
                                                             class="Mend(16px) Fxs(0) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
                                                             alt="Our Story">

                                                        <span>Our Story</span><br>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="feature-item D(f) Ai(c) Bxz(bb) Td(n) P(10px) W(100%) Bdrs(4px) Bgc($color-light-grey-1):h C($color-purple):h C($color-new-font-dark) C($color-purple):h Fz($font-size-14) Fw($font-weight-medium)"
                                                       href="<?php echo base_url('green-initiatives'); ?>">
                                                        <img width="20" height="20"
                                                             src="<?php echo base_url(); ?>assets/images/header-icon/Green Initiatives1.svg"
                                                             loading="lazy"
                                                             class="Mend(16px) D(ib) feature-item:h_D(n) breadcrumb-active_D(n)"
                                                             alt="Green Initiatives">
                                                        <img width="20" height="20"
                                                             src="<?php echo base_url(); ?>assets/images/header-icon/Green Initiatives.svg"
                                                             loading="lazy"
                                                             class="Mend(16px) feature-item:h_D(ib) breadcrumb-active_D(ib) D(n)"
                                                             alt="Green Initiatives">
                                                        <span>Green Initiatives</span><br>
                                                    </a>
                                                </li>
                                                <!--												<li>-->
                                                <!--													<a class="D(f) Ai(c) Bxz(bb) Td(n) P(10px) W(100%) Bdrs(4px) Bgc($color-light-grey-1):h C($color-purple):h C($color-new-font-dark) C($color-purple):h Fz($font-size-14) Fw($font-weight-medium)"-->
                                                <!--													   href="-->
                                                <?php //echo base_url('faq');?><!--">-->
                                                <!--														<svg id="FAQ" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="Fxs(0) Mend(16px)">-->
                                                <!--															<path id="Path_368" data-name="Path 368" d="M0,0H24V24H0Z" fill="none"/>-->
                                                <!--															<path id="Path_369" data-name="Path 369" d="M18.339,5.44h-1.72v7.74H5.44V14.9a.862.862,0,0,0,.86.86h9.46L19.2,19.2V6.3A.862.862,0,0,0,18.339,5.44ZM14.9,10.6V2.86a.862.862,0,0,0-.86-.86H2.86A.862.862,0,0,0,2,2.86V14.9l3.44-3.44h8.6A.862.862,0,0,0,14.9,10.6Z" transform="translate(1.4 1.4)" fill="#d9261c"/>-->
                                                <!--														</svg>-->
                                                <!---->
                                                <!--														<span>FAQs</span><br>-->
                                                <!--													</a>-->
                                                <!--												</li>-->
                                            </ul>
                                        </div>
                                    </li>
									<li class="Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md D(n)--md D(b)">
										<a class="open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)"
										   href="<?php echo base_url('careers'); ?>">Careers</a>
									</li>
									<li class="Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md D(n)--md D(b)">
										<a class="open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)"
										   href="<?php echo base_url('investors'); ?>">Investors</a>
									</li>
									<li class="Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md D(n)--md D(b)">
										<a class="open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)"
										   href="<?php echo base_url('newsroom'); ?>">Newsroom</a>
									</li>
									<li class="Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md D(n)--md D(b)">
										<a class="open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)"
										   href="<?php echo base_url('contact-us'); ?>">Contact Us</a>
									</li>
									<li class="Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md D(n)--md D(b)">
										<a class="open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)"
										   href="<?php echo base_url('offers'); ?>">Offers</a>
									</li>
									<li class="Pend(0px)--md BdB Bdbc($color-grey-border) Bd(n)--md D(n)--md D(b)">
										<a class="open:h_Bgc($color-white) open:h_C($color-purple) C($color-new-font-dark) C($color-purple):h Bdrststart(3px) Bdrstend(3px) Fz(14px) Fw($font-weight-medium) Td(n) Py(16px) Px(15px)--lg Px(15px)--sm Px(15px) D(f) Ai(c) Jc(sb) Jc(fs)--md Bxz(bb) M(0) Bgc(t) Bd(n) W(100%) Cur(p) M(0) Lh(inh) header-top-theme-dark_C($color-white)" target="_blank" href="https://services.wepworld.com:8443/mpspayment/index1.jsp">Make Payment</a>
									</li>
									<li class="Px(20px) Py(20px) D(n)--md D(b)">
										<a target="_blank" class="Mb(10px) W(100%) button" href="https://services.wepworld.com:8443/mpspaymentportal/">Customer Portal</a>
									</li>
                                </ul>
                            </nav>
                            <div class="D(f) Ai(c)">
								<div class="D(b)">
									<a target="_blank" href="https://services.wepsol.in/LogCall/" class="header-top-theme-dark_Bdc($color-white) header-top-theme-dark_C($color-white) button button--line Py(8px) Px(20px) Fz(12px) D(if)--md Mend(10px) Mstart(0)">Login
									</a>
								</div>
                                <div class="D(b)">
                                    <a target="_blank" href="https://services.wepworld.com:8443/mpspaymentportal/" class="button button--small C($color-white):h D(n) D(ib)--md My(0)">Customer Portal
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Toggle Menu for Mobile and Tablet -->
                        <button
                                class="js-toggle-mobile-menu M(0) D(n)--md D(f) Fld(c) Bgc(t) Bd(n) Cur(p) O(n):f header-top-theme-dark_C($color-white)"
                                title="Toggle menu">
                            <svg width="32px" height="32px" class="Mstart(10px)">
                                <use xlink:href="#icon-menu"></use>
                            </svg>
                        </button>
                        <!-- End Toggle Menu -->
                    </div>
                </div>
                <!-- End VWO Main Navigation -->
            </header>
        </div>
    </div>
</div>
