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
                    <?php 
                    $menu1 = getMenuFooter('columnaA');
                    $menu1 = unserialize($menu1['options_note']);
                    if ( isset($menu1['links']) ) : ?>

                        <h4>
                        <?php echo isset($menu1['titulo']) ? $menu1['titulo'] : ''; ?>
                        </h4>
                        <ul class="menu-footer-municipio" role="menu">
                    <?php for ($i=0; $i < count($menu1['links']); $i++) { ?>
                            <li role="menuitem">
                                <a href="<?php echo $menu1['links'][$i]['url']; ?>" title="<?php echo $menu1['links'][$i]['texto']; ?>">
                                    <?php echo $menu1['links'][$i]['texto']; ?>
                                </a>
                            </li>
                    <?php } ?>
                        </ul>

                    <?php endif; ?>
                </div>

                <div class="footer-wrapper-menu">
                    <?php 
                    $menu1 = getMenuFooter('columnaB');
                    $menu1 = unserialize($menu1['options_note']);
                    
                    if ( isset($menu1['links']) ) : ?>
                        <h4>
                        <?php echo isset($menu1['titulo']) ? $menu1['titulo'] : ''; ?>
                        </h4>
                        <ul class="menu-footer-municipio" role="menu">
                    <?php for ($i=0; $i < count($menu1['links']); $i++) { ?>
                            <li role="menuitem">
                                <a href="<?php echo $menu1['links'][$i]['url']; ?>" title="<?php echo $menu1['links'][$i]['texto']; ?>">
                                    <?php echo $menu1['links'][$i]['texto']; ?>
                                </a>
                            </li>
                    <?php } ?>
                    </ul>
                    
                    <?php endif; ?>
                </div>

                <div class="footer-wrapper-menu">
                    <?php 
                    $menu1 = getMenuFooter('columnaC');
                    $menu1 = unserialize($menu1['options_note']);
                    if ( isset($menu1['links']) ) : ?>

                        <h4>
                        <?php echo isset($menu1['titulo']) ? $menu1['titulo'] : ''; ?>
                        </h4>
                        <ul class="menu-footer-municipio" role="menu">
                    <?php for ($i=0; $i < count($menu1['links']); $i++) { ?>
                            <li role="menuitem">
                                <a href="<?php echo $menu1['links'][$i]['url']; ?>" title="<?php echo $menu1['links'][$i]['texto']; ?>">
                                    <?php echo $menu1['links'][$i]['texto']; ?>
                                </a>
                            </li>
                    <?php } ?>
                    </ul>
                    
                    <?php endif; ?>
                </div>

                <div class="footer-wrapper-menu">
                    <?php 
                    $menu1 = getMenuFooter('columnaD');
                    $menu1 = unserialize($menu1['options_note']);
                    
                    if ( isset($menu1['links']) ) : ?>
                        <h4>
                        <?php echo isset($menu1['titulo']) ? $menu1['titulo'] : ''; ?>
                        </h4>
                        <ul class="menu-footer-municipio" role="menu">
                    <?php for ($i=0; $i < count($menu1['links']); $i++) { ?>
                            <li role="menuitem">
                                <a href="<?php echo $menu1['links'][$i]['url']; ?>" title="<?php echo $menu1['links'][$i]['texto']; ?>">
                                    <?php echo $menu1['links'][$i]['texto']; ?>
                                </a>
                            </li>
                    <?php } ?>
                    </ul>
                    
                    <?php endif; ?>

                </div>
            </div>

            <ul class="social-menu-footer" role="menu">
                <?php getTemplate( 'social-menu' ); ?>
            </ul>
           
        </nav>        
        <div class="copyright-wrapper">
            
            <div class="copyright">
                <img src="<?php echo MAINSURL; ?>/assets/images/logo-footer.png" alt="Logo Municipio Vicente Lopez">
                <p>&#169; 2018 vicentelopez.gov.ar</p>
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