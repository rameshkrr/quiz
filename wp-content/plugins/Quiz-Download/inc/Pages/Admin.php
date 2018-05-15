<?php     

namespace Inc\Pages;

use \Inc\Base\BaseController;
    

class Admin extends Basecontroller
{

    public function register()
    {
        
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }
    
    public function add_admin_pages()
    {
        add_menu_page('Quiz-Download', 'Quizes', 'manage_options', 'ramesh_pugin', array($this,'admin_index'),
         '', 110);
    }
    
    public function admin_index()
    {
        // require template
        require_once $this->plugin_path . 'templates/admin.php';
    }
} 