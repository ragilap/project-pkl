<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title mt-7"><span data-key="t-menu">Menu</span></li>
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="sidebarDashboards">
            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarDashboards">
            <ul class="nav nav-sm flex-column ">
                {{-- <li class="nav-item">
                    <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics">
                        Analytics </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                </li>
                <li class="nav-item">
                    <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('article.home') }}" class="nav-link"
                        data-key="t-projects">
                        Home</a>
                </li>
            </ul>
        </div>
    </li> <!-- end Dashboard Menu -->
    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="sidebarLanding">
            <i class="ri-rocket-line"></i> <span data-key="t-landing">Album</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarLanding">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="landing.html" class="nav-link" data-key="t-one-page">Photo</a>
                </li>
                <li class="nav-item">
                    <a href="nft-landing.html" class="nav-link"
                        data-key="t-nft-landing">Video</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
            <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Tutorial</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{route('article.index')}}" class="nav-link"
                        data-key="t-sweet-alerts">Article</a>
                </li>

            </ul>
        </div>
    </li>
</ul>
