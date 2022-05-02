<template>
    <div>
        <ul class="navbar-nav h-100 bg-gray-300 sidebar sidebar-dark accordion" id="accordionSidebar">
            <router-link class="sidebar-brand d-flex align-items-center justify-content-center" to="/dashboard">
                <img src="/img/tinda-logo.png" width="30">
            </router-link>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <router-link class="nav-link text-black font-weight-bold" to="/dashboard" exact>
                    <i class="fas text-black fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></router-link>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-black">
                Interface
            </div>
            <li class="nav-item">
                <router-link class="nav-link text-black font-weight-bold" to="/banner">
                    <i class="fas text-black fa-fw fa-flag"></i>
                    <span>Banner</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link text-black font-weight-bold" to="/store">
                    <i class="fas text-black fa-fw fa-store"></i>
                    <span>Stores</span></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link text-black font-weight-bold" to="/testimonial">
                    <i class="fas text-black fa-fw fa-comment-dots"></i>
                    <span>Testimonials</span></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link text-black font-weight-bold" to="/faqs">
                    <i class="fas text-black fa-fw fa-question"></i>
                    <span>FAQs</span></router-link>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
    </div>
</template>
