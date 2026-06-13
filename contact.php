<?php include 'includes/header.php'; ?>

<section class="contact-section">
    <div class="container">
        <div class="form-card">
            <h2 style="text-align:center; color: var(--primary-blue);">Get a Free Estimate</h2>
            <p style="text-align:center;">Expert HVAC solutions in Nevada.</p>
            
            <form action="procesar_correo.php" method="POST" id="hvacForm">
                
                <div class="form-group hp-field">
                    <label>No llenar este campo si eres humano</label>
                    <input type="text" name="website_url" value="">
                </div>

                <div class="form-group">
                    <input type="text" name="nombre" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="telefono" placeholder="Phone Number" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <select name="servicio" required>
                        <option value="">Select a Service...</option>
                        <option value="AC Maintenance">AC Maintenance</option>
                        <option value="Ductless Services">Ductless Services</option>
                        <option value="Heating Maintenance">Heating Maintenance</option>
                        <option value="Install AC">Install AC</option>
                        <option value="Install Heating System">Install Heating System</option>
                        <option value="Repair AC/Heating">Repair AC / Heating / HVAC</option>
                        <option value="Boiler System Repair">Boiler System Repair</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="mensaje" rows="4" placeholder="How can we help you?"></textarea>
                </div>
                <button type="submit" class="btn-send">SEND REQUEST</button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>