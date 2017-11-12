<?php
/*
 * Sitio web: MVL
 * @LaCueva.tv
 * Since 1.0
 * FOOTER
 * 
*/
?>


        </div> <!--- //.main-wrapper -->
    </main>

<!--- footer ---------------------->
    <footer class="footer-site">
        
        <nav class="footer-nav" role="navigation">
            
            <div class="footer-wrapper-menus">
                <div class="footer-wrapper-menu">
                    <h4>El Municipio</h4>
                    <ul class="menu-footer-municipio" role="menu">
                        <li role="menuitem">
                            <a href="#" title="Intendente de Vicente López">
                                Intendente de Vicente López
                            </a>
                        </li>
                        <li role="menuitem">
                            <a href="#" title="Organigrama">
                                Organigrama
                            </a>
                        </li>
                        <li role="menuitem">
                            <a href="#" title="Prensa">
                                Prensa
                            </a>
                        </li>
                        <li role="menuitem">
                            <a href="#" title="Transparencia Fiscal">
                                Transparencia Fiscal
                            </a>
                        </li>
                        <li role="menuitem">
                            <a href="#" title="Mail Municipal">
                                Mail Municipal
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="footer-wrapper-menu">
                    <h4>Foros Vecinales</h4>
                    <ul class="menu-footer-municipio" role="menu">
                        <li role="menuitem">
                            <a href="#" title="Presupuestos">
                                Presupuestos
                            </a>
                        </li>
                        <li role="menuitem">
                            <a href="#" title="Propuestas">
                                Propuestas
                            </a>
                        </li>
                        <li role="menuitem">
                            <a href="#" title="Proyectos">
                                Proyectos
                            </a>
                        </li>
                        <li role="menuitem">
                            <a href="#" title="Proyectos Terminados">
                                Proyectos Terminados
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="footer-wrapper-menu">
                    <h4>Empleado Municipal</h4>
                    <ul class="menu-footer-municipio" role="menu">
                        <li role="menuitem">
                            <a href="#" title="Intendente de Vicente López">
                                Iniciar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="social-menu-footer" role="menu">
                <?php getTemplate( 'social-menu' ) ?>
            </ul>
           
        </nav>        
        <div class="copyright-wrapper">
            <aside class="jorge-macri">
            
                <?php if ( dispositivo() != 'pc') : ?>
                    <img src="<?php echo MAINSURL; ?>/assets/images/jmacri-movil.png" alt="Propuesta Jorge Macri" class="image-responsive">
                <?php else : ?>
                    <img src="<?php echo MAINSURL; ?>/assets/images/jmacri-pc.png" alt="Propuesta Jorge Macri">
                <?php endif; ?>
            
            </aside>
            
            <div class="copyright">
                <img src="<?php echo MAINSURL; ?>/assets/images/logo-bn.png" alt="Logo Municipio Vicente Lopez">
                <p>&#169; 2017 vicentelopez.gov.ar</p>
            </div>
        </div>
    </footer>

</div><!--- //.wrapper-site -->
<!--- scripts -->    
<!------- jquery 3.1.1 ------>
    <script src="<?php echo MAINSURL; ?>/assets/js/jquery-3.2.1.min.js"></script>
    <!------- owl ------>
    <script src="<?php echo MAINSURL; ?>/inc/lib/owl/owl.carousel.min.js"></script>
    <script src="<?php echo MAINSURL; ?>/assets/js/script.js"></script>
</body>
</html>