<template>
    <div>
        <ul class="navbar-nav h-100 bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
            <router-link class="sidebar-brand d-flex align-items-center justify-content-center" to="/dashboard">
                <img src="/img/tinda-logo.png" width="30">
                <div class="sidebar-brand-text mx-3">tinda PAPALIT</div>
            </router-link>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <router-link class="nav-link" to="/dashboard" exact>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></router-link>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <router-link class="nav-link" to="/banner">
                    <i class="fas fa-fw fa-flag"></i>
                    <span>Banner</span>
                </router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/store">
                    <i class="fas fa-fw fa-store"></i>
                    <span>Stores</span></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/testimonial">
                    <i class="fas fa-fw fa-comment-dots"></i>
                    <span>Testimonials</span></router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/faqs">
                    <i class="fas fa-fw fa-question"></i>
                    <span>FAQs</span></router-link>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
    </div>
</template>
