<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="woo-ml-admin">
    <header class="woo-ml-header">
        <h1>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="woo-ml-icon">
                <path fill="none" d="M0 0h24v24H0z"/>
                <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-8h4v2h-6V7h2v5z" fill="currentColor"/>
            </svg>
            WooCommerce MercadoLibre Sync
        </h1>
    </header>
    
    <nav class="woo-ml-tabs" role="tablist">
        <a href="#settings" class="woo-ml-tab active" data-tab="settings" role="tab" aria-selected="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
                <path fill="none" d="M0 0h24v24H0z"/>
                <path d="M12 1l9.5 5.5v11L12 23l-9.5-5.5v-11L12 1zm0 2.311L4.5 7.653v8.694l7.5 4.342 7.5-4.342V7.653L12 3.311zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" fill="currentColor"/>
            </svg>
            Configuración
        </a>
        <a href="#products" class="woo-ml-tab" data-tab="products" role="tab" aria-selected="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
                <path fill="none" d="M0 0h24v24H0z"/>
                <path d="M3 10h18v10h-18v-10zm0-2v-5h18v5h-18zm2-1h14v-2h-14v2zm10 10h2v-6h-2v6zm-4 0h2v-6h-2v6zm-4 0h2v-6h-2v6zm-4 0h2v-6h-2v6z" fill="currentColor"/>
            </svg>
            Productos
        </a>
    </nav>

    <div class="woo-ml-messages" aria-live="polite">
        <?php
        $error_messages = get_settings_errors('woo_ml_messages');
        foreach ($error_messages as $message) {
            $class = ($message['type'] === 'error') ? 'woo-ml-error' : 'woo-ml-success';
            echo "<div class='$class'><p>{$message['message']}</p></div>";
        }
        ?>
    </div>

    <div class="woo-ml-tab-content" id="settings-tab" role="tabpanel">
        <div class="woo-ml-admin-container">
            <div class="woo-ml-card">
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="woo-ml-icon">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M12 1l8.217 1.826a1 1 0 0 1 .783.976v9.987a6 6 0 0 1-2.672 4.992L12 23l-6.328-4.219A6 6 0 0 1 3 13.79V3.802a1 1 0 0 1 .783-.976L12 1zm0 2.049L5 4.604v9.185a4 4 0 0 0 1.781 3.328L12 20.597l5.219-3.48A4 4 0 0 0 19 13.79V4.604L12 3.05zM12 7a2 2 0 0 1 1.001 3.732L13 15h-2v-4.268A2 2 0 0 1 12 7z" fill="currentColor"/>
                    </svg>
                    Configuración de API
                </h2>
                <p class="woo-ml-description">Ingrese sus credenciales de MercadoLibre para comenzar la sincronización.</p>
                <form method="post" action="" class="woo-ml-form">
                    <?php
                    wp_nonce_field('woo_ml_save_credentials', 'woo_ml_credentials_nonce');
                    $client_id = get_option('woo_ml_client_id');
                    $client_secret = get_option('woo_ml_client_secret');
                    ?>
                    <div class="woo-ml-form-group">
                        <label for="woo_ml_client_id">Client ID</label>
                        <input type="text" id="woo_ml_client_id" name="woo_ml_client_id" value="<?php echo esc_attr($client_id); ?>" class="woo-ml-input" required />
                    </div>
                    <div class="woo-ml-form-group">
                        <label for="woo_ml_client_secret">Client Secret</label>
                        <input type="password" id="woo_ml_client_secret" name="woo_ml_client_secret" value="<?php echo esc_attr($client_secret); ?>" class="woo-ml-input" required />
                    </div>
                    <div class="woo-ml-form-actions">
                        <button type="submit" name="woo_ml_save_credentials" class="woo-ml-btn woo-ml-btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
                                <path fill="none" d="M0 0h24v24H0z"/>
                                <path d="M7 19v-6h10v6h2V7.828L16.172 5H5v14h2zM4 3h13l4 4v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm5 12v4h6v-4H9z" fill="currentColor"/>
                            </svg>
                            Guardar Credenciales
                        </button>
                        <button type="submit" name="woo_ml_verify_credentials" class="woo-ml-btn woo-ml-btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
                                <path fill="none" d="M0 0h24v24H0z"/>
                                <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z" fill="currentColor"/>
                            </svg>
                            Verificar Credenciales
                        </button>
                    </div>
                </form>
            </div>

            <?php if ($client_id && $client_secret): ?>
            <div class="woo-ml-card">
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="woo-ml-icon">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M13.06 8.11l1.415 1.415a7 7 0 0 1 0 9.9l-.354.353a7 7 0 0 1-9.9-9.9l1.415 1.415a5 5 0 1 0 7.071 7.071l.354-.354a5 5 0 0 0 0-7.07l-1.415-1.415 1.415-1.414zm6.718 6.011l-1.414-1.414a5 5 0 1 0-7.071-7.071l-.354.354a5 5 0 0 0 0 7.07l1.415 1.415-1.415 1.414-1.414-1.414a7 7 0 0 1 0-9.9l.354-.353a7 7 0 0 1 9.9 9.9z" fill="currentColor"/>
                    </svg>
                    Conectar con MercadoLibre
                </h2>
                <?php
                $auth_url = $this->get_auth_url();
                if ($auth_url):
                ?>
                    <p class="woo-ml-description">Para sincronizar sus productos, necesita conectar su cuenta de MercadoLibre:</p>
                    <a href="<?php echo esc_url($auth_url); ?>" class="woo-ml-btn woo-ml-btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path d="M20 12a8 8 0 1 0-3.562 6.657l1.11 1.664A9.953 9.953 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10v1.5a3.5 3.5 0 0 1-6.396 1.966A5 5 0 1 1 15 8H17v5.5a1.5 1.5 0 0 0 3 0V12zm-8-3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z" fill="currentColor"/>
                        </svg>
                        Conectar con MercadoLibre
                    </a>
                <?php else: ?>
                    <p class="woo-ml-error">Error: No se pudo generar la URL de autorización. Por favor, verifique sus credenciales.</p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ($this->access_token): ?>
            <div class="woo-ml-card">
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="woo-ml-icon">
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z" fill="currentColor"/>
                    </svg>
                    Estado de la Conexión
                </h2>
                <p class="woo-ml-success"><strong>Conectado a MercadoLibre</strong></p>
                <div class="woo-ml-btn-group">
                    <form method="post" action="" class="inline-form">
                        <?php wp_nonce_field('ml_logout', 'ml_logout_nonce'); ?>
                        <button type="submit" name="ml_logout" class="woo-ml-btn woo-ml-btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
                                <path fill="none" d="M0 0h24v24H0z"/>
                                <path d="M5 11h8v2H5v3l-5-4 5-4v3zm-1 7h2.708a8 8 0 1 0 0-12H4A9.985 9.985 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10a9.985 9.985 0 0 1-8-4z" fill="currentColor"/>
                            </svg>
                            Cerrar Sesión
                        </button>
                    </form>
                    <form method="post" action="" class="inline-form">
                        <button type="submit" name="test_ml_connection" class="woo-ml-btn woo-ml-btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
                                <path fill="none" d="M0 0h24v24H0z"/>
                                <path d="M12 3a9 9 0 0 1 9 9h-2a7 7 0 0 0-7-7V3z" fill="currentColor"/>
                            </svg>
                            Probar Conexión
                        </button>
                    </form>
                </div>
            </div>

            <div class="woo-ml-card">
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="woo-ml-icon">
        <path fill="none" d="M0 0h24v24H0z"/>
        <path d="M13 21v2h-2v-2H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-8zm-9-2h16V5H4v14zm9-1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0-6a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" fill="currentColor"/>
    </svg>
    Sincronización de Productos
</h2>
<p class="woo-ml-description">Haga clic en el botón para sincronizar todos sus productos de WooCommerce con MercadoLibre:</p>
<button id="sync-all-products" class="woo-ml-btn woo-ml-btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
        <path fill="none" d="M0 0h24v24H0z"/>
        <path d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" fill="currentColor"/>
    </svg>
    Sincronizar Todos los Productos
</button>
<div id="sync-result" class="woo-ml-result" aria-live="polite"></div>
</div>
<?php endif; ?>

<div class="woo-ml-card">
<h2>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="woo-ml-icon">
        <path fill="none" d="M0 0h24v24H0z"/>
        <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm0-8h2v6h-2V7z" fill="currentColor"/>
    </svg>
    Registro de Depuración
</h2>
<p class="woo-ml-description">Aquí puede ver los registros de depuración para solucionar problemas:</p>
<textarea readonly class="woo-ml-debug-log" aria-label="Registro de depuración">
<?php
foreach ($this->debug_messages as $message) {
    echo esc_html($message) . "\n";
}
?>
</textarea>
</div>
</div>
</div>

<div class="woo-ml-tab-content" id="products-tab" style="display: none;" role="tabpanel">
<div class="woo-ml-admin-container">
<div class="woo-ml-card">
<h2>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="woo-ml-icon">
        <path fill="none" d="M0 0h24v24H0z"/>
        <path d="M3 10h18v10h-18v-10zm0-2v-5h18v5h-18zm2-1h14v-2h-14v2zm10 10h2v-6h-2v6zm-4 0h2v-6h-2v6zm-4 0h2v-6h-2v6zm-4 0h2v-6h-2v6z" fill="currentColor"/>
    </svg>
    Productos Sincronizados
</h2>
<div class="woo-ml-products-filters">
    <select id="sync-status-filter" class="woo-ml-select" aria-label="Filtrar por estado de sincronización">
        <option value="">Todos los estados</option>
        <option value="synced">Sincronizados</option>
        <option value="not-synced">No sincronizados</option>
        <option value="error">Con errores</option>
    </select>
    <input type="text" id="product-search" placeholder="Buscar productos..." class="woo-ml-input" aria-label="Buscar productos" />
</div>
<div class="woo-ml-table-responsive">
    <table class="woo-ml-table" aria-label="Lista de productos sincronizados">
        <thead>
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">ID</th>
                <th scope="col">Producto</th>
                <th scope="col">SKU</th>
                <th scope="col">Estado ML</th>
                <th scope="col">ID ML</th>
                <th scope="col">Última Sync</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody id="products-list">
            <!-- Products will be loaded here via AJAX -->
        </tbody>
    </table>
</div>
<div class="woo-ml-pagination" role="navigation" aria-label="Paginación de productos">
    <button class="woo-ml-btn woo-ml-btn-secondary" id="load-prev-page" disabled>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z" fill="currentColor"/>
        </svg>
        Anterior
    </button>
    <span id="page-info">Página 1</span>
    <button class="woo-ml-btn woo-ml-btn-secondary" id="load-next-page">
        Siguiente
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z" fill="currentColor"/>
        </svg>
    </button>
</div>
</div>
</div>
</div>
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');

:root {
    --primary-color: #3498db;
    --secondary-color: #2ecc71;
    --success-color: #27ae60;
    --danger-color: #e74c3c;
    --info-color: #34495e;
    --light-gray: #f5f7fa;
    --dark-gray: #2c3e50;
    --border-color: #e0e0e0;
    --text-color: #333333;
    --background-color: #ffffff;
}

.woo-ml-admin {
    font-family: 'Inter', sans-serif;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    color: var(--text-color);
    background-color: var(--background-color);
}

.woo-ml-header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.woo-ml-header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: 600;
    display: flex;
    align-items: center;
}

.woo-ml-icon {
    margin-right: 12px;
    vertical-align: middle;
}

.woo-ml-tabs {
    display: flex;
    background-color: var(--light-gray);
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 30px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.woo-ml-tab {
    padding: 15px 25px;
    color: var(--text-color);
    text-decoration: none;
    font-weight: 500;
    transition: background-color 0.3s, color 0.3s;
    display: flex;
    align-items: center;
}

.woo-ml-tab:hover,
.woo-ml-tab.active {
    background-color: var(--primary-color);
    color: white;
}

.woo-ml-card {
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 25px;
    margin-bottom: 30px;
    transition: box-shadow 0.3s ease;
}

.woo-ml-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.woo-ml-card h2 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 20px;
    color: var(--primary-color);
    display: flex;
    align-items: center;
}

.woo-ml-description {
    color: var(--dark-gray);
    margin-bottom: 20px;
}

.woo-ml-form-group {
    margin-bottom: 25px;
}

.woo-ml-form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: var(--dark-gray);
}

.woo-ml-input,
.woo-ml-select {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 14px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.woo-ml-input:focus,
.woo-ml-select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
}

.woo-ml-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s;
}

.woo-ml-btn:hover {
    transform: translateY(-1px);
}

.woo-ml-btn:active {
    transform: translateY(1px);
}

.woo-ml-btn-primary {
    background-color: var(--primary-color);
    color: white;
}

.woo-ml-btn-primary:hover {
    background-color: darken(var(--primary-color), 10%);
}

.woo-ml-btn-secondary {
    background-color: var(--secondary-color);
    color: white;
}

.woo-ml-btn-secondary:hover {
    background-color: darken(var(--secondary-color), 10%);
}

.woo-ml-btn-danger {
    background-color: var(--danger-color);
    color: white;
}

.woo-ml-btn-danger:hover {
    background-color: darken(var(--danger-color), 10%);
}

.woo-ml-btn-info {
    background-color: var(--info-color);
    color: white;
}

.woo-ml-btn-info:hover {
    background-color: darken(var(--info-color), 10%);
}

.woo-ml-btn-group {
    display: flex;
    gap: 12px;
}

.woo-ml-success {
    background-color: #d4edda;
    color: #155724;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.woo-ml-error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.woo-ml-debug-log {
    width: 100%;
    height: 200px;
    font-family: 'Roboto Mono', monospace;
    background-color: var(--light-gray);
    border: 1px solid var(--border-color);
    padding: 12px;
    border-radius: 8px;
    font-size: 12px;
    resize: vertical;
}

.woo-ml-products-filters {
    display: flex;
    gap: 12px;
    margin-bottom: 25px;
}

.woo-ml-table-responsive {
    overflow-x: auto;
}

.woo-ml-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.woo-ml-table th,
.woo-ml-table td {
    padding: 14px;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
}

.woo-ml-table th {
    background-color: var(--light-gray);
    font-weight: 600;
    color: var(--dark-gray);
}

.woo-ml-table tr:hover {
    background-color: var(--light-gray);
}

.product-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 6px;
}

.sync-status {
    padding: 6px 10px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
}

.sync-status.synced {
    background-color: var(--success-color);
    color: white;
}

.sync-status.not-synced {
    background-color: var(--danger-color);
    color: white;
}

.sync-status.error {
    background-color: var(--danger-color);
    color: white;
}

.woo-ml-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    margin-top: 25px;
}

#page-info {
    font-weight: 500;
    color: var(--dark-gray);
}

@media (max-width: 768px) {
    .woo-ml-tabs {
        flex-direction: column;
    }

    .woo-ml-products-filters {
        flex-direction: column;
    }

    .woo-ml-btn-group {
        flex-direction: column;
    }

    .woo-ml-table th,
    .woo-ml-table td {
        padding: 10px;
    }
}
</style>

<script>
jQuery(document).ready(function($) {
    // Tab switching
    $('.woo-ml-tab').on('click', function(e) {
        e.preventDefault();
        const tabId = $(this).data('tab');
        
        $('.woo-ml-tab').removeClass('active').attr('aria-selected', 'false');
        $(this).addClass('active').attr('aria-selected', 'true');
        
        $('.woo-ml-tab-content').hide().attr('aria-hidden', 'true');
        $(`#${tabId}-tab`).show().attr('aria-hidden', 'false');

        if (tabId === 'products') {
            loadProducts(1);
        }
    });

    // Products pagination and filtering
    let currentPage = 1;
    let totalPages = 1;

    function loadProducts(page) {
        const statusFilter = $('#sync-status-filter').val();
        const searchQuery = $('#product-search').val();
        const tableBody = $('#products-list');
        
        tableBody.html('<tr><td colspan="8" class="text-center">Cargando...</td></tr>');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'get_synced_products',
                nonce: '<?php echo wp_create_nonce("get_synced_products_nonce"); ?>',
                page: page,
                status: statusFilter,
                search: searchQuery
            },
            success: function(response) {
                if (response.success) {
                    const products = response.data.products;
                    totalPages = response.data.total_pages;
                    currentPage = page;

                    $('#load-prev-page').prop('disabled', page <= 1);
                    $('#load-next-page').prop('disabled', page >= totalPages);
                    $('#page-info').text(`Página ${page} de ${totalPages}`);

                    tableBody.empty();

                    if (products.length === 0) {
                        tableBody.html('<tr><td colspan="8" class="text-center">No se encontraron productos</td></tr>');
                        return;
                    }

                    products.forEach(function(product) {
                        const row = `
                            <tr>
                                <td><img src="${product.image}" alt="${product.name}" class="product-image" /></td>
                                <td>${product.id}</td>
                                <td>${product.name}</td>
                                <td>${product.sku}</td>
                                <td>
                                    <span class="sync-status ${product.ml_status}">
                                        ${getStatusLabel(product.ml_status)}
                                    </span>
                                </td>
                                <td>${product.ml_id || '-'}</td>
                                <td>${product.last_sync || 'Nunca'}</td>
                                <td>
                                    <button class="woo-ml-btn woo-ml-btn-primary sync-single" data-id="${product.id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon">
                                            <path fill="none" d="M0 0h24v24H0z"/>
                                            <path d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" fill="currentColor"/>
                                        </svg>
                                        Sincronizar
                                    </button>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                }
            },
            error: function() {
                tableBody.html('<tr><td colspan="8" class="text-center">Error al cargar los productos</td></tr>');
            }
        });
    }

    function getStatusLabel(status) {
        const labels = {
            'synced': 'Sincronizado',
            'not-synced': 'No sincronizado',
            'error': 'Error'
        };
        return labels[status] || status;
    }

    // Pagination handlers
    $('#load-prev-page').on('click', function() {
        if (currentPage > 1) {
            loadProducts(currentPage - 1);
        }
    });

    $('#load-next-page').on('click', function() {
        if (currentPage < totalPages) {
            loadProducts(currentPage + 1);
        }
    });

    // Filter handlers
    $('#sync-status-filter').on('change', function() {
        loadProducts(1);
    });

    let searchTimeout;
    $('#product-search').on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            loadProducts(1);
        }, 500);
    });

    // Sync all products handler
    $('#sync-all-products').on('click', function() {
        var button = $(this);
        var resultDiv = $('#sync-result');
        button.prop('disabled', true);
        button.html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.364 5.636L16.95 7.05A7 7 0 1 0 19 12h2a9 9 0 1 1-2.636-6.364z" fill="currentColor"><animateTransform attributeName="transform" type="rotate" from="0 12 12" to="360 12 12" dur="1s" repeatCount="indefinite"/></path></svg> Sincronizando...');
        resultDiv.text('Sincronización en progreso...');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'sync_all_products',
                nonce: '<?php echo wp_create_nonce("sync_all_products_nonce"); ?>'
            },
            success: function(response) {
                if (response.success) {
                    resultDiv.html('<p class="woo-ml-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-.997-6l7.07-7.071-1.414-1.414-5.656 5.657-2.829-2.829-1.414 1.414L11.003 16z" fill="currentColor"/></svg> ' + response.data + '</p>');
                } else {
                    resultDiv.html('<p class="woo-ml-error"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-7v2h2v-2h-2zm0-8v6h2V7h-2z" fill="currentColor"/></svg> ' + response.data + '</p>');
                }
            },
            error: function() {
                resultDiv.html('<p class="woo-ml-error"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-7v2h2v-2h-2zm0-8v6h2V7h-2z" fill="currentColor"/></svg> Error en la sincronización. Por favor, intente nuevamente.</p>');
            },
            complete: function() {
                button.prop('disabled', false);
                button.html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" fill="currentColor"/></svg> Sincronizar Todos los Productos');
            }
        });
    });

    // Single product sync handler
    $(document).on('click', '.sync-single', function() {
        const button = $(this);
        const productId = button.data('id');
        
        button.prop('disabled', true);
        button.html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.364 5.636L16.95 7.05A7 7 0 1 0 19 12h2a9 9 0 1 1-2.636-6.364z" fill="currentColor"><animateTransform attributeName="transform" type="rotate" from="0 12 12" to="360 12 12" dur="1s" repeatCount="indefinite"/></path></svg> Sincronizando...');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'sync_single_product',
                nonce: '<?php echo wp_create_nonce("sync_single_product_nonce"); ?>',
                product_id: productId
            },
            success: function(response) {
                if (response.success) {
                    loadProducts(currentPage);
                } else {
                    alert('Error al sincronizar: ' + response.data);
                }
            },
            error: function() {
                alert('Error de conexión al sincronizar el producto');
            },
            complete: function() {
                button.prop('disabled', false);
                button.html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="woo-ml-icon"><path fill="none" d="M0 0h24v24H0z"/><path d="M5.463 4.433A9.961 9.961 0 0 1 12 2c5.523 0 10 4.477 10 10 0 2.136-.67 4.116-1.81 5.74L17 12h3A8 8 0 0 0 6.46 6.228l-.997-1.795zm13.074 15.134A9.961 9.961 0 0 1 12 22C6.477 22 2 17.523 2 12c0-2.136.67-4.116 1.81-5.74L7 12H4a8 8 0 0 0 13.54 5.772l.997 1.795z" fill="currentColor"/></svg> Sincronizar');
            }
        });
    });
});
</script>
