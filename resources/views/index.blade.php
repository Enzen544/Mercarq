<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merqark - Planos Arquitectónicos</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=orbitron:400,700|roboto:400,700" rel="stylesheet" />
    @vite('resources/css/merqark.css')
</head>
<body>
   
    <header>
        <div class="container header-content">
            <div class="logo">MERQARK</div>
            <ul class="nav-links">
                <li><a href="#features">Características</a></li>
                <li><a href="#plans">Planos</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="/login" class="btn btn-outline">Iniciar Sesión</a>
                <a href="/register" class="btn btn-primary">Registrarse</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Diseña tu Futuro con Merqark</h1>
            <p>Explora nuestra colección de planos arquitectónicos innovadores y da vida a tus ideas con diseños futuristas y sostenibles.</p>
            <div class="hero-buttons">
                <a href="#plans" class="btn btn-primary">Explorar Planos</a>
                <a href="/register" class="btn btn-outline">Únete Ahora</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section">
        <div class="container">
            <h2 class="section-title">¿Por qué elegir Merqark?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📐</div>
                    <h3>Diseños Futuristas</h3>
                    <p>Planos que combinan funcionalidad con estética vanguardista, pensados para el mañana.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Compra Segura</h3>
                    <p>Sistema de pagos integrado y certificado para una experiencia de compra 100% segura.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📥</div>
                    <h3>Descarga Inmediata</h3>
                    <p>Obtén tus planos en formato digital (.dwg, .pdf) al instante después de tu compra.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Plans Preview Section -->
    <section id="plans" class="section plans-preview">
        <div class="container">
            <h2 class="section-title">Nuestros Planos Destacados</h2>
            <div class="plans-grid">
                <div class="plan-card">
                    <div class="plan-image-placeholder">🏠</div>
                    <div class="plan-info">
                        <h4>Casa Moderna Minimalista</h4>
                        <p>Diseño eficiente de 120m² con espacios abiertos y conexión con la naturaleza.</p>
                        <div class="plan-footer">
                            <span class="plan-price">$199.99</span>
                            <button class="btn btn-outline">Ver Detalle</button>
                        </div>
                    </div>
                </div>
                <div class="plan-card">
                    <div class="plan-image-placeholder">🏢</div>
                    <div class="plan-info">
                        <h4>Oficina Tech Sustentable</h4>
                        <p>Espacios de trabajo abiertos con iluminación natural y tecnología de punta.</p>
                        <div class="plan-footer">
                            <span class="plan-price">$299.99</span>
                            <button class="btn btn-outline">Ver Detalle</button>
                        </div>
                    </div>
                </div>
                <div class="plan-card">
                    <div class="plan-image-placeholder">🏙️</div>
                    <div class="plan-info">
                        <h4>Edificio Ecológico Urbano</h4>
                        <p>Proyecto de 10 pisos con sistemas de energía renovable y jardines verticales.</p>
                        <div class="plan-footer">
                            <span class="plan-price">$499.99</span>
                            <button class="btn btn-outline">Ver Detalle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container footer-content">
            <p>&copy; 2025 Merqark. Todos los derechos reservados. | Planos Arquitectónicos Premium</p>
        </div>
    </footer>
</body>
</html>
