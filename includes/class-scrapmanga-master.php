<?php 
class SCRAPMANGA_Master {
    protected $charger;
    protected $theme_name;
    protected $version;
    public function __construct() {
        $this->theme_name = 'SCRAPMANGA_Theme';
        $this->version = SCRAPMANGA_VERSION;
        $this->load_dependencies();
        $this->load_instances();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }
    private function load_dependencies() {
        require_once SCRAPMANGA_DIR_PATH . 'includes/class-scrapmanga-charger.php';        
        require_once SCRAPMANGA_DIR_PATH . 'includes/class-scrapmanga-build-menupage.php';
        require_once SCRAPMANGA_DIR_PATH . 'admin/class-scrapmanga-admin.php';
        require_once SCRAPMANGA_DIR_PATH . 'public/class-scrapmanga-public.php';
        require_once SCRAPMANGA_DIR_PATH . 'includes/class-scrapmanga-ajax-admin.php';
    }
    private function load_instances() {
        $this->charger                = new SCRAPMANGA_Charger;
        $this->scrapmanga_admin       = new SCRAPMANGA_Admin( $this->get_theme_name(), $this->get_version() );
        $this->scrapmanga_public      = new SCRAPMANGA_Public( $this->get_theme_name(), $this->get_version() );
        $this->scrapmanga_ajax_admin = new SCRAPMANGA_Ajax_Admin;

    }
    private function define_admin_hooks() {
        $this->charger->add_action( 'admin_enqueue_scripts', $this->scrapmanga_admin, 'enqueue_styles' );
        $this->charger->add_action( 'admin_enqueue_scripts', $this->scrapmanga_admin, 'enqueue_scripts' );
        $this->charger->add_action( 'admin_menu', $this->scrapmanga_admin, 'add_menu' );
        $this->charger->add_action( 'wp_ajax_action_view_chapters', $this->scrapmanga_ajax_admin, 'view_chapters');			  
    }
    private function define_public_hooks() {
        $this->charger->add_action( 'wp_enqueue_scripts', $this->scrapmanga_public, 'enqueue_styles' );
        $this->charger->add_action( 'wp_footer', $this->scrapmanga_public, 'enqueue_scripts' );
    }
    public function run() {
        $this->charger->run();
    }
    public function get_theme_name() {
        return $this->theme_name;
    }
    public function get_charger() {
        return $this->charger;
    }
    public function get_version() {
        return $this->version;
    }
}