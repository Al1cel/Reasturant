<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunger - Restaurant</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="/app/public/assets/css/style.css">
</head>
<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <div class="d-flex justify-content-between w-100 align-items-center">
                
                    <div class="d-none d-lg-flex">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"><a class="nav-link" href="#home">HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#team">TEAM</a></li>
                            <li class="nav-item"><a class="nav-link" href="#booking">BOOKING</a></li>
                        </ul>
                    </div>
                    
                 
                    <div class="navbar-brand mx-0">
                        <img src="/app/public/assets/images/Vector.png" alt="Hunger Logo" id="logo">
                    </div>
                    
                  
                    <div class="d-none d-lg-flex">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#events">EVENTS</a></li>
                            <li class="nav-item"><a class="nav-link" href="#contact">CONTACT</a></li>
                            <li class="nav-item">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <a class="nav-link auth-link" href="/auth/logout">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                <?php else: ?>
                                    <a class="nav-link auth-link" href="#" data-bs-toggle="modal" data-bs-target="#authModal">
                                        <i class="fas fa-user"></i>
                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                    
                  
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>


    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="authModalLabel">Login / Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="authTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Register</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="authTabsContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                            <form id="loginForm" class="mt-3">
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="loginEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="loginPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel">
                            <form id="registerForm" class="mt-3">
                                <div class="mb-3">
                                    <label for="registerEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="registerEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="registerPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="registerPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>