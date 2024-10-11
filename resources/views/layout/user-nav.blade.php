<nav class="navbar">
    <!-- Logo & Title -->
    <div class="navbar-logo">
        <img src="../assets/img/logo-landing.png" alt="Logo" class="logo-image">
        <a href="{{'/'}}" class="navbar-title-link">
            <span class="navbar-title">PT SUMBER INDAHPERKASA</span>
        </a>
    </div>

    <!-- Desktop Menu -->
    <div class="navbar-menu">
        <a href="{{route('user-location.index')}}" class="nav-link" id="location-link">LOCATION</a>
        <div class="dropdown">
            <span class="dropdown-btn" id="equipment-link">EQUIPMENT</span>
            <div class="dropdown-content">
                <a href="{{route('user-motor.index')}}" id="motor-link">MOTOR</a>
                <a href="{{route('user-pump.index')}}" id="pump-link">PUMP</a>
                <a href="{{route('user-gear.index')}}" id="gear-link">GEAR-BOX</a>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Icon -->
    <div class="mobile-menu" id="mobile-menu-toggle">
        <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </div>
</nav>


<!-- Script for Menu Active State -->
<script>
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const navbarMenu = document.querySelector('.navbar-menu');

    menuToggle.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
        menuToggle.classList.toggle('close-icon');
    });

    // Menandai Menu yang Aktif
    const currentUrl = window.location.href; // Ambil URL saat ini
    const mainMenuItems = document.querySelectorAll('.navbar-menu > a'); // Semua tautan utama
    const dropdownMenus = document.querySelectorAll('.dropdown'); // Semua dropdown

    // Loop untuk menambahkan class 'active' pada menu utama
    mainMenuItems.forEach(item => {
        if (item.href === currentUrl) {
            item.classList.add('active');
        }
    });

    // Loop untuk menambahkan class 'active' pada dropdown menu
    dropdownMenus.forEach(dropdown => {
        const dropdownLinks = dropdown.querySelectorAll('.dropdown-content a'); // Semua sub-menu di dalam dropdown
        dropdownLinks.forEach(link => {
            if (link.href === currentUrl) {
                link.classList.add('active'); // Menambahkan class active pada sub-menu
                dropdown.querySelector('.dropdown-btn').classList.add('active'); // Menambahkan class active pada tombol dropdown
            }
        });
    });
</script>

<style>
/* Navbar Container */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 30px; /* Sesuaikan padding untuk ruang yang lebih */
    background-color: #3B4A6B; /* Dark blue base */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    color: white;
}

/* Logo & Title Styling */
.navbar-logo {
    display: flex;
    align-items: center;
}

.logo-image {
    height: 40px; /* Ukuran logo */
    margin-right: 12px; /* Jarak antara logo dan teks */
    transition: transform 0.3s ease-in-out;
}

.logo-image:hover {
    transform: scale(1.1);
}

/* Link dan Text pada Title */
.navbar-title-link {
    text-decoration: none; /* Hilangkan underline */
    color: white;
}

.navbar-title {
    font-size: 20px;
    font-weight: bold;
    color: #FFC857; /* Warna sesuai tema */
    letter-spacing: 1px;
    transition: color 0.3s ease-in-out; /* Efek transisi */
}

.navbar-title-link:hover .navbar-title {
    color: #FFD580; /* Warna hover */
}

/* Navbar Menu */
.navbar-menu {
    display: flex;
    align-items: center;
}

/* Style untuk menu navbar */
.navbar-menu a, .dropdown-btn {
    margin: 0 15px;
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: 500;
    position: relative;
    transition: color 0.3s ease-in-out, transform 0.2s ease-in-out, background-color 0.3s ease-in-out;
    cursor: pointer;
}

/* Style untuk elemen menu yang aktif */
.navbar-menu .nav-link.active, .dropdown-btn.active {
    color: #FFC857; /* Warna teks untuk menu aktif */
    background-color: #4C5B79; /* Warna latar belakang untuk menu aktif */
    padding: 8px 15px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Tambahkan shadow untuk elemen aktif */
}

/* Hover pada menu yang tidak aktif */
.navbar-menu a:hover, .dropdown-btn:hover {
    color: #FFC857; /* Warna teks saat hover */
    transform: translateY(-2px);
    background-color: rgba(255, 200, 87, 0.15); /* Latar belakang saat hover */
    border-radius: 5px;
}

/* Hover pada elemen yang aktif */
.navbar-menu .nav-link.active:hover, .dropdown-btn.active:hover {
    color: #FFC857; /* Warna teks tetap sama */
    background-color: #4C5B79; /* Warna latar belakang tetap sama saat di-hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Perbarui shadow saat di-hover */
    transform: translateY(-2px); /* Efek hover naik */
}

.navbar-menu a:hover {
    background-color: rgba(255, 200, 87, 0.15);
    border-radius: 5px;
}

/* Dropdown Menu */
.dropdown {
    position: relative;
}

.dropdown-btn {
    cursor: pointer;
    display: inline-block;
    padding: 8px 15px;
    border-radius: 5px;
}

.dropdown:hover .dropdown-btn {
    background-color: rgba(255, 200, 87, 0.15);
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 40px;
    background-color: #4C5B79;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    z-index: 1;
    min-width: 160px;
    transition: transform 0.2s ease-in-out, opacity 0.2s ease-in-out;
    opacity: 0;
    transform: translateY(20px);
}

.dropdown:hover .dropdown-content {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.dropdown-content a {
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
}

.dropdown-content a.active {
    background-color: #1ABC9C; /* Warna aktif pada dropdown */
    color: white;
}


/* Hover pada elemen dropdown */
.dropdown-content a:hover {
    background-color: #1ABC9C;
    color: white;
}

/* Mobile Menu */
.mobile-menu {
    display: none;
    cursor: pointer;
}

.menu-icon {
    width: 28px;
    height: 28px;
    transition: transform 0.3s ease-in-out;
}

.close-icon .menu-icon {
    transform: rotate(90deg);
}

/* Responsive Design */
@media (max-width: 768px) {
    .navbar-menu {
        display: none;
    }

    .mobile-menu {
        display: block;
    }

    .navbar-menu.active {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        position: absolute;
        top: 60px;
        right: 0;
        background-color: #34495E;
        width: 100%;
        padding: 20px;
        z-index: 999;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .navbar-menu a, .dropdown-btn {
        margin: 10px 0;
        text-align: left;
        width: 100%;
        padding-left: 20px;
    }

    .dropdown-content {
        position: static;
        background-color: #3B4A6B;
    }

    .dropdown-content a {
        color: white;
    }

    .dropdown-content a:hover {
        background-color: #1ABC9C;
    }
}
</style>
