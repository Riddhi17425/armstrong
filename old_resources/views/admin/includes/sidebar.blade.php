<!-- sidebar -->
        <div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="{{ route('dashboard') }}" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </span>
                    <span class="logo-text">ArmStrong</span>
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('product','product.addProduct','product.edit') ? 'active' : '' }} {{ request()->routeIs('product.addProduct') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Products</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-product">
                                <li><a class="ms-link {{ request()->routeIs('product') ? 'active' : '' }}" href="{{ route('product') }}">Product List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('product.addProduct') ? 'active' : '' }}" href="{{ route('product.addProduct') }}">Product Add</a></li>
                  
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('product-description.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-product-description" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Product Description</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-product-description">
                                <li><a class="ms-link {{ request()->routeIs('product-description.index') ? 'active' : '' }}" href="{{ route('product-description.index') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('product-description.create') ? 'active' : '' }}" href="{{ route('product-description.create') }}">Add</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('product-faqs.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-product-faqs" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Product Faqs</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-product-faqs">
                                <li><a class="ms-link {{ request()->routeIs('product-faqs.index') ? 'active' : '' }}" href="{{ route('product-faqs.index') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('product-faqs.create') ? 'active' : '' }}" href="{{ route('product-faqs.create') }}">Add</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('application') ? 'active' : '' }}" href="{{ route('application') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Applications</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('admin.apk.product.inquiry') ? 'active' : '' }}" href="{{ route('admin.apk.product.inquiry') }}">
                            <i class="icofont-chart-flow fs-5"></i><span>Inquiry</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('milestone','milestone.addMilestone','milestone.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-milestone" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Milestone</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-milestone">
                                <li><a class="ms-link {{ request()->routeIs('milestone') ? 'active' : '' }}" href="{{ route('milestone') }}">Milestone List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('milestone.addMilestone') ? 'active' : '' }}" href="{{ route('milestone.addMilestone') }}">Milestone Add</a></li>
                  
                            </ul>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('admin.video' , 'admin.createVideo' , 'admin.video.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-video" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Video</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-video">
                                <li><a class="ms-link {{ request()->routeIs('admin.video') ? 'active' : '' }}" href="{{ route('admin.video') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('admin.createVideo') ? 'active' : '' }}" href="{{ route('admin.createVideo') }}">Add Video</a></li>
                 
                            </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('howitwork','howitwork.edit','howitwork.addHowitwork') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-howitwork" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>How It Work</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-howitwork">
                                <li><a class="ms-link {{ request()->routeIs('howitwork') ? 'active' : '' }}" href="{{ route('howitwork') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('howitwork.addHowitwork') ? 'active' : '' }}" href="{{ route('howitwork.addHowitwork') }}">Add</a></li>
                  
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('lifearmstrong','lifearmstrong.addLifearmstrong','lifearmstrong.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-lifearmstrong" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Life Armstrong</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-lifearmstrong">
                                <li><a class="ms-link {{ request()->routeIs('lifearmstrong') ? 'active' : '' }}" href="{{ route('lifearmstrong') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('lifearmstrong.addLifearmstrong') ? 'active' : '' }}" href="{{ route('lifearmstrong.addLifearmstrong') }}">Add</a></li>
                  
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('jobscategory','jobscategory.addJobscategory','jobscategory.edit','jobs.addJobs','jobs.edit','jobs') ? 'active' : '' }} {{ request()->routeIs('jobscategory.addJobscategory') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-career" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Career</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-career">
                                <li><a class="ms-link {{ request()->routeIs('jobscategory','jobscategory.addJobscategory','jobscategory.edit') ? 'active' : '' }}" href="{{ route('jobscategory') }}">jobs Category</a></li>
                                <li><a class="ms-link {{ request()->routeIs('jobs','jobs.addJobs','jobs.edit') ? 'active' : '' }}" href="{{ route('jobs') }}">Jobs</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('whychooseus','whychooseus.addWhychooseus','whychooseus.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-whychooseus" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Why Choose Us</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-whychooseus">
                                <li><a class="ms-link {{ request()->routeIs('whychooseus') ? 'active' : '' }}" href="{{ route('whychooseus') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('whychooseus.addWhychooseus') ? 'active' : '' }}" href="{{ route('whychooseus.addWhychooseus') }}">Add</a></li>
                  
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('event','event.addEvent','event.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-event" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Events</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-event">
                                <li><a class="ms-link {{ request()->routeIs('event') ? 'active' : '' }}" href="{{ route('event') }}">Event List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('event.addEvent') ? 'active' : '' }}" href="{{ route('event.addEvent') }}">Event Add</a></li>
                  
                            </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('ourfacility','ourfacility.addOurfacility','ourfacility.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-ourfacility" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Our Facility</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-ourfacility">
                                <li><a class="ms-link {{ request()->routeIs('ourfacility') ? 'active' : '' }}" href="{{ route('ourfacility') }}">List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('ourfacility.addOurfacility') ? 'active' : '' }}" href="{{ route('ourfacility.addOurfacility') }}">Add</a></li>
                  
                            </ul>
                    </li>
                    <!--<li class="collapsed">-->
                    <!--    <a class="m-link {{ request()->routeIs('news') ? 'active' : '' }} {{ request()->routeIs('news.addNews') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-news" href="#">-->
                    <!--        <i class="icofont-truck-loaded fs-5"></i> <span>News</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>-->
                            <!-- Menu: Sub menu ul -->
                    <!--        <ul class="sub-menu collapse" id="menu-news">-->
                    <!--            <li><a class="ms-link {{ request()->routeIs('news') ? 'active' : '' }}" href="{{ route('news') }}">News List</a></li>-->
                    <!--            <li><a class="ms-link {{ request()->routeIs('news.addNews') ? 'active' : '' }}" href="{{ route('news.addNews') }}">News Add</a></li>-->
                  
                    <!--        </ul>-->
                    <!--</li>-->
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('blogs','blogs.addBlogs','blogs.edit') ? 'active' : '' }} {{ request()->routeIs('blogs.addBlogs') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-blogs" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Blogs</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-blogs">
                                <li><a class="ms-link {{ request()->routeIs('blogs') ? 'active' : '' }}" href="{{ route('blogs') }}">Blogs List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('blogs.addBlogs') ? 'active' : '' }}" href="{{ route('blogs.addBlogs') }}">Blogs Add</a></li>
                  
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('client','client.addClient','client.edit') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-client" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>What Client Says</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-client">
                                <li><a class="ms-link {{ request()->routeIs('client') ? 'active' : '' }}" href="{{ route('client') }}">Client List</a></li>
                                <li><a class="ms-link {{ request()->routeIs('client.addClient') ? 'active' : '' }}" href="{{ route('client.addClient') }}">client Add</a></li>
                 
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('category') ? 'active' : '' }}" href="{{ route('category') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span> Product Categories</span></a>
                    </li>
                    
                   <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('homeslider') ? 'active' : '' }}" href="{{ route('homeslider') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>HomeSlider</span></a>
                    </li>

                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('aboutslider') ? 'active' : '' }}" href="{{ route('aboutslider') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>AboutUs Slider</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('researchdevelopmentslider') ? 'active' : '' }}" href="{{ route('researchdevelopmentslider') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>R&D Slider</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('infrastructureslider') ? 'active' : '' }}" href="{{ route('infrastructureslider') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Infrastructure Slider</span></a>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('gallerytypes') ? 'active' : '' }}" href="{{ route('gallerytypes') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Gallery Types</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Gallery</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('certificate') ? 'active' : '' }}" href="{{ route('certificate') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Certificate</span></a>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ request()->routeIs('productfeature') ? 'active' : '' }}" href="{{ route('productfeature') }}">
                            <i class="icofont-chart-flow fs-5"></i> <span>Product Fetaure</span></a>
                    </li>
                    
                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>                