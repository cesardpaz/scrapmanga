<?php
class SCRAPMANGA_Admin {
    private $theme_name;
    private $version;
    private $build_menupage;
    
    public function __construct( $theme_name, $version ) {
        $this->theme_name     = $theme_name;
        $this->version        = $version;
        $this->build_menupage = new SCRAPMANGA_Build_Menupage();
    }
    
    public function enqueue_styles( $hook ) {
        if( isset($_GET['page']) ){
            if( $_GET['page'] == 'scrapmanga' ){
                wp_enqueue_style( 'scrapp_admin_css', SCRAPMANGA_DIR_URI . 'admin/css/scrapmanga_admin.css', array(), filemtime(SCRAPMANGA_DIR_PATH . 'admin/css/scrapmanga_admin.css'), 'all' );
            }
        }
    }
    
    public function enqueue_scripts( $hook ) {
        if( isset($_GET['page']) ){
            if( $_GET['page'] == 'scrapmanga' ){
                wp_enqueue_script( 'scrapmanga_functions_js', SCRAPMANGA_DIR_URI . 'admin/js/scrapmanga_functions.js', [], filemtime(SCRAPMANGA_DIR_PATH . 'admin/js/scrapmanga_functions.js'), true );
            }
        }
    }

    public function add_menu() {
        $this->build_menupage->add_menu_page(
            __( 'Scrap Manga', 'scrapmanga' ),
            __( 'Scrap Manga', 'scrapmanga' ),
            'manage_options',
            'scrapmanga',
            [ $this, 'scrapmanga' ]
        );
        $this->build_menupage->run();
    }
    
    public function scrapmanga(){
        require_once SCRAPMANGA_DIR_PATH . 'admin/partials/scrapmanga.php';
    }
}